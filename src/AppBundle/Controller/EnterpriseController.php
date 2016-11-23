<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Enterprise;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller used to manage product contents in the public part of the site.
 *
 * @Route("/nous-contacter")
 *
 * @author Pierre François
 */
class EnterpriseController extends Controller
{

    /**
    *  @Route("/", name="enterprise_show")
    *  @Cache(smaxage="10")
    */
    public function showAction()
    {
        $enterprise = $this->getDoctrine()
            ->getRepository(Enterprise::class)
            ->findOneById(1);

        if (!$enterprise) {
            throw $this->createNotFoundException(
                'No information for enterprise.'
            );
        }

        return $this->render('enterprise/show.html.twig', ['enterprise' => $enterprise]);
    }

}
