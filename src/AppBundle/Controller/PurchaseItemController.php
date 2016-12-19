<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PurchaseItem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Purchaseitem controller.
 *
 * @Route("purchaseitem")
 */
class PurchaseItemController extends Controller
{
    /**
     * Lists all purchaseItem entities.
     *
     * @Route("/", name="purchaseitem_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $purchaseItems = $em->getRepository('AppBundle:PurchaseItem')->findAll();

        return $this->render('purchaseitem/index.html.twig', array(
            'purchaseItems' => $purchaseItems,
        ));
    }

    /**
     * Creates a new purchaseItem entity.
     *
     * @Route("/new", name="purchaseitem_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $purchaseItem = new Purchaseitem();
        $form = $this->createForm('AppBundle\Form\PurchaseItemType', $purchaseItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($purchaseItem);
            $em->flush($purchaseItem);

            return $this->redirectToRoute('purchaseitem_show', array('id' => $purchaseItem->getId()));
        }

        return $this->render('purchaseitem/new.html.twig', array(
            'purchaseItem' => $purchaseItem,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a purchaseItem entity.
     *
     * @Route("/{id}", name="purchaseitem_show")
     * @Method("GET")
     */
    public function showAction(PurchaseItem $purchaseItem)
    {
        $deleteForm = $this->createDeleteForm($purchaseItem);

        return $this->render('purchaseitem/show.html.twig', array(
            'purchaseItem' => $purchaseItem,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing purchaseItem entity.
     *
     * @Route("/{id}/edit", name="purchaseitem_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PurchaseItem $purchaseItem)
    {
        $deleteForm = $this->createDeleteForm($purchaseItem);
        $editForm = $this->createForm('AppBundle\Form\PurchaseItemType', $purchaseItem);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('purchaseitem_edit', array('id' => $purchaseItem->getId()));
        }

        return $this->render('purchaseitem/edit.html.twig', array(
            'purchaseItem' => $purchaseItem,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a purchaseItem entity.
     *
     * @Route("/{id}", name="purchaseitem_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PurchaseItem $purchaseItem)
    {
        $form = $this->createDeleteForm($purchaseItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($purchaseItem);
            $em->flush($purchaseItem);
        }

        return $this->redirectToRoute('purchaseitem_index');
    }

    /**
     * Creates a form to delete a purchaseItem entity.
     *
     * @param PurchaseItem $purchaseItem The purchaseItem entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PurchaseItem $purchaseItem)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('purchaseitem_delete', array('id' => $purchaseItem->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
