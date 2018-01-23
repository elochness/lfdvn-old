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
use AppBundle\Entity\Product;
use AppBundle\Entity\PurchaseItem;

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
     *  @Route("/", name="purchase_index")    
     *  @Method("GET")
     */
    public function indexAction()
    {
//         return $this->render('purchase/index.html.twig');
        
//         $products = $this->getDoctrine()
//         ->getRepository(Product::class)
//         ->findLatest($page, $params);
        $categories = $this->getDoctrine()
        ->getRepository(Category::class)
        ->findActiveCategory();
        
       
        return $this->render('purchase/index.html.twig', [
        		'categories' => $categories
        ]);
    } 
    
    /**
     *  @Route("/", name="purchase_add")    
     *  @Method("POST")
     */
    public function addAction(Request $request)
    {
        // On crée un objet Purchase
        $purchase = new Purchase();
        $purchase = $this->constructPurchase($request->request, $purchase);
        $form = $this->createForm(PurchaseType::class, $purchase);
                
//         // Si la requête est en POST
//         // À partir de maintenant, la variable $purchase contient les valeurs entrées dans le formulaire par le visiteur
//         if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

//             // On enregistre notre objet $purchase dans la base de données, par exemple
//             $em = $this->getDoctrine()->getManager();
//             $em->persist($purchase);
//             $em->flush();
    
//             $request->getSession()->getFlashBag()->add('notice', 'Achat bien enregistrée.');
    
//             // On redirige vers la page de visualisation de l'annonce nouvellement créée
//             return $this->redirectToRoute('purchase_index', array('id' => $purchase->getId()));

//         }
        
//         $products = $this->getDoctrine()
//         ->getRepository(Product::class)
//         ->queryLatest();
        
        
        
//         foreach ($request->request as $params) {
//         	if (!empty($params) && $params > 0){
//         		$purchaseItem = new PurchaseItem();
//         	}
//         }
        	
        	
        
//         $pretty = function($v='',$c="&nbsp;&nbsp;&nbsp;&nbsp;",$in=-1,$k=null)use(&$pretty){$r='';if(in_array(gettype($v),array('object','array'))){$r.=($in!=-1?str_repeat($c,$in):'').(is_null($k)?'':"$k: ").'<br>';foreach($v as $sk=>$vl){$r.=$pretty($vl,$c,$in+1,$sk).'<br>';}}else{$r.=($in!=-1?str_repeat($c,$in):'').(is_null($k)?'':"$k: ").(is_null($v)?'&lt;NULL&gt;':"<strong>$v</strong>");}return$r;};
        
//         echo $pretty($request->request);
        
        
//         var_dump($request->request->get('qte_30'));
        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('purchase/add.html.twig', array(
        	'form' => $form->createView(),
        	'purchaseItems' => $purchase->getItems(),
        ));
    }
    
    private function constructPurchase($params, Purchase $purchase) {
    	
    	// Initialization
    	$purchaseItems = array();
    	$listIdProducts = array();
    	$currentlyKey = "";
    	
    	// Recuperate all products
    	$products = $this->getDoctrine()
    	        ->getRepository(Product::class)
    	        ->findAll();
    	
    	// Recuperate all id products
//     	var_dump($products[0]);
    	foreach ($products as $product) {
    		$listIdProducts[$product->getId()] = $product;
    	}
//     	foreach ($products as $key => $value) {
//     		echo $key . "-" . $value . PHP_EOL;
//     		$listIdProducts[$key] = $value->getId();
//     	}
    	
    	foreach ($params as $key => $value) {
    		$currentlyKey = str_replace("qte_", "", $key);
    		echo $currentlyKey . PHP_EOL;
    		echo $value . PHP_EOL;
    		echo $listIdProducts[$currentlyKey] . PHP_EOL;
	    	if (!empty($value) && is_numeric($currentlyKey) && isset($listIdProducts[$currentlyKey])) {
	    		/* @var $product \AppBundle\Entity\Product */
	    		$product = $listIdProducts[$currentlyKey];
	    		$purchaseItem = new PurchaseItem();
	    		$purchaseItem->setQuantity($value);
	    		$purchaseItem->setProduct($product);
	    		$purchaseItem->setPrice($value * $product->getPrice());
	    		$purchaseItem->setTaxRate($product->getTaxRate()->getRate());
	    		// Add item to list
	    		$purchase->addItem($purchaseItem);
	    	}
    	}
    	return $purchase;
    }
}
