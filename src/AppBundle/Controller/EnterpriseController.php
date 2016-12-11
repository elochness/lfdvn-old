<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EnterpriseDetails;
use AppBundle\Entity\Schedule;
use AppBundle\Entity\GeographicCoordinates;
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
        $enterpriseDetails = $this->getDoctrine()
            ->getRepository(EnterpriseDetails::class)
            ->findOneById(1);

        $schedule = $this->getDoctrine()
            ->getRepository(Schedule::class)
            ->findOneById(1);

        $geographicsCoordinates = $this->getDoctrine()
            ->getRepository(GeographicCoordinates::class)
            ->findAll();

        return $this->render('enterprise/show.html.twig',
        [
          'enterpriseDetails' => $enterpriseDetails,
          'schedule' => $schedule,
          'geographicsCoordinates' => $geographicsCoordinates
        ]);
    }

}
