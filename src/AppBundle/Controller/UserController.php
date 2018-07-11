<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use AppBundle\Entity\Purchase;
use AppBundle\Entity\User;


/**
 * Controller used to manage product contents in the public part of the site.
 *
 * @Route("/account")
 *
 * @author Pierre François
 */
class UserController extends Controller
{

    /**
     *  @Route("/", name="user_account")    
     *  @Method("GET")
     */
	public function indexAction(SessionInterface $session, UserInterface $user = null)
    {
    	// Check if user is connected
    	if ($user === null) {
    		// redirect in step 2 isn't connected
    		return  $this->forward('AppBundle:Article:index');
    	} else {
    		
    		return $this->render('user/index.html.twig', array(
    			    			'user' => $user
    			    		));
    	}
    }
    
    /**
     *  @Route("/purchase", name="user_purchase")
     *  @Method("GET")
     */
    public function purchaseIndexAction(SessionInterface $session, UserInterface $user = null)
    {
    	// Check if user is connected
    	if ($user === null) {
    		// redirect in step 2 isn't connected
    		return  $this->forward('AppBundle:Article:index');
    	} else {
    		// Recuperate all purchases according to the buyer
    		$em = $this->getDoctrine()->getManager();
    		$purchases = $this->getDoctrine()
	    		->getRepository(Purchase::class)
	    		->test($user->getId());

    		return $this->render('user/purchase_index.html.twig', array(
    				'purchases' => $purchases
    		));
    	}
    }
 
    
}
