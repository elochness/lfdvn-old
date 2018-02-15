<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EnterpriseDetails;
use AppBundle\Entity\Schedule;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

/**
 * Controller used to manage product contents in the public part of the site.
 *
 * @Route("/nous-contacter")
 *
 * @author Pierre FranÃ§ois
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

        return $this->render('enterprise/show.html.twig',
        [
          'enterpriseDetails' => $enterpriseDetails,
        ]);
    }
    
    public function scheduleAction() {
    	
    	$schedule = $this->getDoctrine()
    	->getRepository(Schedule::class)
    	->findOneById(1);
    	
    	return $this->render('enterprise/schedule.html.twig', ['schedule' => $schedule]);
    }

}
