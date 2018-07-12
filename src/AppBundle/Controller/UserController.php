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
use AppBundle\Form\UserType;


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
     * @Route("/user", name="user_new")
     */
    public function newAction(Request $request)
    {
    	
    	$user = new User();
    	$form = $this->createForm(UserType::class, $user);
    	
    	$form->handleRequest($request);
    
    	if ($form->isSubmitted() && $form->isValid()) {
    		// $form->getData() holds the submitted values
    		// but, the original `$task` variable has also been updated
    		$user = $form->getData();
    		$passwordEncoder = $this->container->get('security.password_encoder');
    		$encodedPassword = $passwordEncoder->encodePassword($user, $user->getPassword());
    		$user->setPassword($encodedPassword);
    		$user->setRoles(array(User::ROLE_USER));
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($user);
    		$em->flush();
    	
    		// ... perform some action, such as saving the task to the database
    		// for example, if Task is a Doctrine entity, save it!
    		// $em = $this->getDoctrine()->getManager();
    		// $em->persist($task);
    		// $em->flush();
    	
    		return $this->redirectToRoute('homepage');
    	}
    	
    	return $this->render('user/new.html.twig', array(
    			'form' => $form->createView(),
    	));
    	
    }

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
