<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller used to manage product contents in the public part of the site.
 *
 * @Route("/")
 *
 * @author Pierre François
 */
class ArticleController extends Controller
{
    /**
    *  @Route("/", name="article_index")
    *  @Method("GET")
    *  @Cache(smaxage="10")
    */
    public function indexAction(Request $request)
    {
    	
    	$page =  $request->query->get('page');
    	if (!isset($page)) {
    		$page = 1;
    	}
    	
        $articles = $this->getDoctrine()->getRepository(Article::class)->findLatest($page);
        return $this->render('article/index.html.twig', ['articles' => $articles]);
        
    }

    /**
    *  @Route("/la-fromagerie", name="article_enterprise")
    *  @Method("GET")
    *  @Cache(smaxage="10")
    */
    public function enterpriseAction()
    {
        $articlesEnterprise = $this->getDoctrine()->getRepository(Article::class)->findEnterprise();
        return $this->render('article/enterprise.html.twig', ['articles' => $articlesEnterprise]);
    }

    public function bandeauAction()
    {
        $articlesBandeau = $this->getDoctrine()->getRepository(Article::class)->findBandeau();
        return $this->render('article/bandeau.html.twig', ['articlesBandeau' => $articlesBandeau]);
    }
}
