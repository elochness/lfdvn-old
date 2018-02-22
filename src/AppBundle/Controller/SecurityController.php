<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;

/**
 * Controller used to manage the application security.
 * See http://symfony.com/doc/current/cookbook/security/form_login_setup.html.
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction(UserInterface $user = null)
    {
//        var_dump($user->getRoles());
        // Check if user has admin role
        if (in_array(User::ROLE_ADMIN, $user->getRoles())) {
            return $this->redirectToRoute('admin');
        }
        // Check if user has user role
        else if (in_array(User::ROLE_USER, $user->getRoles())) {
            return $this->redirectToRoute('account');
        }
        else {
            $helper = $this->get('security.authentication_utils');
            
            return $this->render('security/login.html.twig', [
                // last username entered by the user (if any)
                'last_username' => $helper->getLastUsername(),
                // last authentication error (if any)
                'error' => $helper->getLastAuthenticationError(),
            ]);
        }
    }
    
    
    /**
     * @Route("/user", name="security_user")
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
    	
    	return $this->render('security/new.html.twig', array(
    			'form' => $form->createView(),
    	));
    	
    }

    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in app/config/security.yml
     *
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
        throw new \Exception('This should never be reached!');
    }
}
