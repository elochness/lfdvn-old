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
    *  @Route("/", defaults={"page": 1}, name="article_index")
    *  @Method("GET")
    * @Cache(smaxage="10")
    */
    public function indexAction($page)
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findLatest($page);
        return $this->render('article/index.html.twig', ['articles' => $articles]);
    }

}
