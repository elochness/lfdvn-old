<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $categories = $this->getDoctrine()->getRepository(Category::class)->findActiveCategory();
        
        return $this->render('purchase/index.html.twig', ['categories' => $categories]);
    }
}
