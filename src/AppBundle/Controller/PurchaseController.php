<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Purchase;
use AppBundle\Form\PurchaseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use AppBundle\Entity\Product;
use AppBundle\Entity\PurchaseItem;
use AppBundle\Entity\Schedule;


/**
 * Controller used to manage product contents in the public part of the site.
 *
 * @Route("/commander")
 *
 * @author Pierre François
 */
class PurchaseController extends Controller
{
	/**
	 * 
	 * @var integer
	 */
	const NB_OPENED_DAYS = 20;
    /**
     *  @Route("/", name="purchase_index")    
     *  @Method("GET")
     */
    public function indexAction(SessionInterface $session)
    {
//     	$pretty = function($v='',$c="&nbsp;&nbsp;&nbsp;&nbsp;",$in=-1,$k=null)use(&$pretty){$r='';if(in_array(gettype($v),array('object','array'))){$r.=($in!=-1?str_repeat($c,$in):'').(is_null($k)?'':"$k: ").'<br>';foreach($v as $sk=>$vl){$r.=$pretty($vl,$c,$in+1,$sk).'<br>';}}else{$r.=($in!=-1?str_repeat($c,$in):'').(is_null($k)?'':"$k: ").(is_null($v)?'&lt;NULL&gt;':"<strong>$v</strong>");}return$r;};
//     	echo $pretty($session->get('purchase'));
//         return $this->render('purchase/index.html.twig');
        
//         $products = $this->getDoctrine()
//         ->getRepository(Product::class)
//         ->findLatest($page, $params);
        $categories = $this->getDoctrine()
        ->getRepository(Category::class)
        ->findActiveCategory();
        
        $schedule = $this->getDoctrine()
        ->getRepository(Schedule::class)
        ->findOneById(1);
        
        $filters = $session->get('purchase', array());
                
        return $this->render('purchase/index.html.twig', [
        		'categories' => $categories,
        		'filters'    => $filters,
        		'datesForDelivrery' => $this->getDatesForDelivrery($schedule)
        ]);
    }
    
    /**
     *  @Route("/step2", name="purchase_step2")
     *  @Method({"GET", "POST"})
     */
    public function step2Action(Request $request, SessionInterface $session, UserInterface $user = null)
    {
        $session->set('purchase', $this->cleanPurchaseParams($request->request));
    
    	// Check if user is connected
    	if ($user != null) {
    		// redirect in step 3 is connected
//     		return $this->render('purchase/step3.html.twig');
    		return  $this->forward('AppBundle:Purchase:step3');
    	} else {
    		// else show step 2 (sign up or sign in)
    		$helper = $this->get('security.authentication_utils');
    		
    		return $this->render('purchase/step2.html.twig', [
    				// last username entered by the user (if any)
    				'last_username' => $helper->getLastUsername(),
    				// last authentication error (if any)
    				'error' => $helper->getLastAuthenticationError(),
    		]);
    	}
    } 
    
    /**
     *  @Route("/step3", name="purchase_step3")
     *  @Method("GET")
     */
    public function step3Action(SessionInterface $session, UserInterface $user = null)
    {
    	// Check if user is connected
    	if ($user === null) {
    		// redirect in step 2 isn't connected
    		return  $this->forward('AppBundle:Purchase:step2');
    	} elseif ($session->get('purchase') === null) {
    		// redirect in step 1 isn't purchase object
    		return  $this->forward('AppBundle:Purchase:index');
    	} else {
	    	// On créé un objet Purchase
	        $purchase = new Purchase();
	        $purchase = $this->constructPurchase($session->get('purchase'));
	        $total = 0;
	        
	        foreach ($purchase->getItems() as $item) {
	        	$total += $item->getPrice();
	        }
	    	
	    	return $this->render('purchase/step3.html.twig', array(
	    			'purchase' => $purchase,
	    			'total' => $total
	    	));
    	}
    }
    
    
    /**
     *  @Route("/step4", name="purchase_step4")
     *  @Method({"GET", "POST"})
     */
    public function step4Action(Request $request, SessionInterface $session, UserInterface $user = null)
    {
    	// Check if user is connected
    	if ($user === null) {
    		// redirect in step 2 isn't connected
    		return  $this->forward('AppBundle:Purchase:step2');
    	} elseif ($session->get('purchase') === null) {
    		// redirect in step 1 isn't purchase object
    		return  $this->forward('AppBundle:Purchase:index');
    	} else {
    		
    		if ($request->isMethod('post')) {
    			$total = 0;
    			$purchase = new Purchase();
		    	$purchase = $this->constructPurchase($session->get('purchase'));
		    	$purchase->setBuyer($user);
		    	$purchase->setComment($request->request->get('comment'));
		    	
		    	$em = $this->getDoctrine()->getManager();
		    	$em->persist($purchase);
		    	$em->flush($purchase);
		    	
		    	foreach ($purchase->getItems() as $item) {
		    		$total += $item->getPrice();
		    	}
		    	
		    	// delete data session
		    	$session->clear();
		    	
		    	//$this->sendCustomerMail($purchase, $total);
		    	//$this->sendEnterpriseMail($purchase, $total);
		    	
 		    	return $this->render('purchase/step4.html.twig');
// 		    	return $this->render('email/enterprise_purchase.html.twig', array(
// 	    			'purchase' => $purchase,
// 	    			'total' => $total
// 	    		));
    		} else {
    			return  $this->forward('AppBundle:Purchase:step3');
    		}
    	}
    }
        
    private function cleanPurchaseParams($params) {
    	$cleanedParams = array();
    	
    	foreach ($params as $key => $value) {
    		if (!empty($value)) {
    			$cleanedParams[$key] = $value; 
    		}
    	}
    	
    	return $cleanedParams;
    }
    
    private function constructPurchase($params) {
    	
    	// Initialization
    	$purchase = new Purchase();
    	$purchaseItems = array();
    	$listIdProducts = array();
    	$currentlyKey = "";
    	$em = $this->getDoctrine()->getManager();
    	
    	// Recuperate all products
    	$products = $this->getDoctrine()
    	        ->getRepository(Product::class)
    	        ->findAll();
    	
    	// Recuperate all id products
    	foreach ($products as $product) {
    		$listIdProducts[$product->getId()] = $product;
    	}
    	foreach ($params as $key => $value) {
    		$currentlyKey = str_replace("qte_", "", $key);
//     		echo $currentlyKey . PHP_EOL;
//     		echo $value . PHP_EOL;
//     		echo $listIdProducts[$currentlyKey] . PHP_EOL;
	    	if (!empty($value) && is_numeric($currentlyKey) && isset($listIdProducts[$currentlyKey])) {
	    		/* @var $product \AppBundle\Entity\Product */
	    		$product = $em->find('\AppBundle\Entity\Product', $currentlyKey);
	    		$purchaseItem = new PurchaseItem();
	    		$purchaseItem->setQuantity($value);
	    		$purchaseItem->setProduct($product);
	    		$purchaseItem->setPrice($value * $product->getPrice());
	    		$purchaseItem->setTaxRate($product->getTaxRate()->getRate());
	    		// Add item to list
	    		$purchase->addItem($purchaseItem);
	    	}
	    	else if ($key === 'delivery_date') {
// 	    		$purchase->setDeliveryDate($value);
				// create Date object according to the value
	    		$purchase->setDeliveryDateFormated($this->getDateFormated($value));
	    		$purchase->setDeliveryDate(date_create($value));
	    	}
    	}
    	
    	return $purchase;
    }
    
    private function getDatesForDelivrery(Schedule $schedule) {
    	
    	$countDay = 0;
    	$collectDays = array();
    	$openDays  = array();
    	
    	if ($schedule->getMonday() !== Schedule::CLOSED_DAY) {
    		$openDays[] = 1;
    	}
    	if ($schedule->getTuesday() !== Schedule::CLOSED_DAY) {
    		$openDays[] = 2;
    	}
    	if ($schedule->getWednesday() !== Schedule::CLOSED_DAY) {
    		$openDays[] = 3;
    	}
    	if ($schedule->getThursday() !== Schedule::CLOSED_DAY) {
    		$openDays[] = 4;
    	}
    	if ($schedule->getFriday() !== Schedule::CLOSED_DAY) {
    		$openDays[] = 5;
    	}
    	if ($schedule->getSaturday() !== Schedule::CLOSED_DAY) {
    		$openDays[] = 6;
    	}
    	if ($schedule->getSunday() !== Schedule::CLOSED_DAY) {
    		$openDays[] = 7;
    	}   

    	$date = date("Y-m-d"); // Format AAAA-MM-DD
    	// On récupère le numero du jour pour savoir si on est un samedi ou un dimanche
    	$collectDay = date("N",strtotime($date));
    	
    	// We take 20 opened days
    	while ($countDay <= self::NB_OPENED_DAYS) {
    		
    		if (in_array( $collectDay , $openDays )) {
//     			$collectDays[] = date('d/m/Y', strtotime($date)) ;
				$key = date('Y-m-d', strtotime($date));
				$value = $this->getDateFormated($key);
    			$collectDays[$key] = $value ;
    			$countDay++;
    		}
    	
    		// Next Day
    		$date = date("Y-m-d", strtotime($date." +1 days"));
    		$collectDay = date("N",strtotime($date));
    	}
    	
    	return $collectDays;
    }
    
    private function getDateFormated($date) {
    	$translator = $this->get('translator');
    	$stringDay = Schedule::getDayFormated($date, $translator);
    	$day = date("d",strtotime($date));
    	$stringMonth = Schedule::getMonthFormated($date, $translator);
    	$year = date("Y",strtotime($date));
    	
    	return $stringDay . " " . $day . " " . $stringMonth . " " . $year;
    }
    
    /**
     * 
     * @param Purchase $purchase
     * @param unknown $total
     */
    private function sendCustomerMail($purchase, $total) {
    	$message = (new \Swift_Message('Récapitulatif de la commande à la Fromagerie du Vignoble Nantais'))
        ->setFrom('test@lafromagerieduvignoblenantais.com')
        ->setTo($purchase->getBuyer()->getUsername())
        ->setBody(
        	$this->renderView('email/customer_purchase.html.twig', array(
        			'purchase' => $purchase,
        			'total' => $total
        	)),
            'text/html'
        )
        /*
         * If you also want to include a plaintext version of the message
        ->addPart(
            $this->renderView(
                'Emails/registration.txt.twig',
                array('name' => $name)
            ),
            'text/plain'
        )
        */
	    ;
	
	    $this->get('mailer')->send($message);
    }
    
    /**
     *
     * @param Purchase $purchase
     * @param unknown $total
     */
    private function sendEnterpriseMail($purchase, $total) {
    	$message = (new \Swift_Message('Nouvelle commande n° ' + $purchase->getId() + 'à la Fromagerie du Vignoble Nantais'))
    	->setFrom('test@lafromagerieduvignoblenantais.com')
    	->setTo($purchase->getBuyer()->getUsername())
    	->setBody(
    			$this->renderView('email/enterprise_purchase.html.twig', array(
    					'purchase' => $purchase,
    					'total' => $total
    			)),
    			'text/html'
    	)
    	/*
    	 * If you also want to include a plaintext version of the message
    	->addPart(
    			$this->renderView(
    					'Emails/registration.txt.twig',
    					array('name' => $name)
    			),
    			'text/plain'
    	)
    	*/
    	;
    
    	$this->get('mailer')->send($message);
    }
    
}
