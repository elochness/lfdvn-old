<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Purchase;
use AppBundle\Form\PurchaseType;
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
    /*public function indexAction()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findActiveCategory();
        
        return $this->render('purchase/index.html.twig', ['categories' => $categories]);
    } */
    
    /**
     *  @Route("/", name="purchase_add")    
     *  @Method("GET")
     */
    public function addAction(Request $request)
    {
        // On crée un objet Purchase
        $purchase = new Purchase();
        $form = $this->createForm(PurchaseType::class, $purchase);
                
        // Si la requête est en POST
        // À partir de maintenant, la variable $purchase contient les valeurs entrées dans le formulaire par le visiteur
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            // On enregistre notre objet $purchase dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();
            $em->persist($purchase);
            $em->flush();
    
            $request->getSession()->getFlashBag()->add('notice', 'Achat bien enregistrée.');
    
            // On redirige vers la page de visualisation de l'annonce nouvellement créée
            return $this->redirectToRoute('purchase_index', array('id' => $purchase->getId()));

        }
        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('purchase/add.html.twig', array(
          'form' => $form->createView(),
        ));
    }
}
