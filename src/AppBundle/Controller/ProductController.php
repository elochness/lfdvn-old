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
     * @Route("/", name="product_index")
     * @Method("GET")
     * @Cache(smaxage="10")
     */
    public function indexAction(Request $request)
    {
        $page = $request->query->get('page');
        if (! isset($page)) {
            $page = 1;
        }
        
        $params = null;
        if ($request->query->get('category') !== null) {
            $params['category'] = $request->query->get('category');
        }
        
        if ($request->query->get('subcategory') !== null) {
            $params['subcategory'] = $request->query->get('subcategory');
        }
        // $selectedCategory = $request->query->get('categorie');
        $selectedCategoryName = null;
        
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findLatest($page, $params);
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findActiveCategory();
        
        $selectedCategoryName = $this->getCategoryName($params, $categories);
        $selectedCategoryPluralName = $this->getCategoryPluralName($selectedCategoryName);
        
        return $this->render('product/index.html.twig', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategoryName' => $selectedCategoryName,
            'selectedCategoryPluralName' => $selectedCategoryPluralName,
        ]);
    }

    /**
     * @Route("/show/{id}", name="product_show")
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
    
    /**
     * 
     * @param unknown $params
     * @param unknown $categories
     * @return NULL
     */
    private function getCategoryName($params, $categories) {
        $selectedCategoryName = null;
        
        if (isset($params['category']) || isset($params['subcategory'])) {
            foreach ($categories as $category) {
                if (isset($params['category'])) {
                    if ($params['category'] == $category->getId()) {
                        $selectedCategoryName = $category->getName();
                        break;
                    }
                }
                if (isset($params['subcategory'])) {
                    foreach ($category->getSubcategories() as $subcategory) {
                        if ($params['subcategory'] == $subcategory->getId()) {
                            $selectedCategoryName = $subcategory->getName();
                            break;
                        }
                    }
                }
            }
        }
        return $selectedCategoryName;
    }
    
    private function getCategoryPluralName($categoryName) {
        $categoryNamePlural = null;
        if( strpos($categoryName, 'lait') !== false) {
            $categoryNamePlural = 'au ' . $categoryName;
        }
        
        return $categoryNamePlural;
    }

}
