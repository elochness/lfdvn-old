<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller used to manage product contents in the public part of the site.
 *
 * @Route("/produits")
 *
 * @author Pierre François
 */
class ProductController extends Controller
{
    /**
    *  @Route("/", defaults={"page": 1}, name="product_index")
    *  @Method("GET")
    * @Cache(smaxage="10")
    */
    public function indexAction($page)
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findLatest($page);
        $categories = $this->getDoctrine()->getRepository(Category::class)->findActiveCategory();
        return $this->render('product/index.html.twig', ['products' => $products, 'categories' => $categories]);
    }

    /**
    *  @Route("/{id}", name="product_show")
    */
    public function showAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findById($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render('product/show.html.twig', ['product' => $product]);
    }

}
