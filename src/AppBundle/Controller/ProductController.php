<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Component\HttpFoundation\Request;

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
	 *  @Route("/", name="product_index")
	 *  @Method("GET")
	 *  @Cache(smaxage="10")
	 */
    public function indexAction(Request $request)
    {
    	$page =  $request->query->get('page');
    	if (!isset($page)) {
    		$page = 1;
    	}
    	
     	$selectedCategory =  $request->query->get('categorie');
//     	$selectedCategoryName = null;
    	
        $products = $this->getDoctrine()->getRepository(Product::class)->findLatest($page, $selectedCategory);
//         $categories = $this->getDoctrine()->getRepository(Category::class)->findActiveCategory();
        
//         if(!empty($selectedCategory))
//         {
//           foreach($categories as $category) {
//             if($category->getId() == $selectedCategory){
//                $selectedCategoryName = $category->getName();
//                break;
//             }
//           }
//         }
        
//         return $this->render('product/index.html.twig', ['products' => $products, 'categories' => $categories, 'selectedCategory' => $selectedCategoryName]);
        return $this->render('product/index.html.twig', ['products' => $products]);
    }

    /**
     *  @Route("/show/{id}", name="product_show")
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
