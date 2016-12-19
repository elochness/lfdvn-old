<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Purchase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


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
        
        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $purchase);
        
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
          ->add('deliveryDate',      DateType::class)
          ->add('deliveryHour',     TimeType::class)
          ->add('save',      SubmitType::class)
        ;
        
        // Pour l'instant, pas de candidatures, catégories, etc., on les gérera plus tard

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();
        
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $purchase contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);
            
            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $purchase dans la base de données, par exemple
                $em = $this->getDoctrine()->getManager();
                $em->persist($purchase);
                $em->flush();
        
                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
        
                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->redirectToRoute('purchase_index', array('id' => $purchase->getId()));
            }

        }
        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('purchase/add.html.twig', array(
          'form' => $form->createView(),
        ));
    }
}
