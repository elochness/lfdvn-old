<?php

namespace AppBundle\Entity;

/**
 * Schedule
 */
class Schedule
{
	/**
	 * Indicate the day is close
	 * @var string
	 */
	const CLOSED_DAY = "Fermé";
	
    /**
     * @var string
     */
    private $monday;

    /**
     * @var string
     */
    private $tuesday;

    /**
     * @var string
     */
    private $wednesday;

    /**
     * @var string
     */
    private $thursday;

    /**
     * @var string
     */
    private $friday;

    /**
     * @var string
     */
    private $saturday;

    /**
     * @var string
     */
    private $sunday;

    /**
     * @var string
     */
    private $alertDay;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set monday
     *
     * @param string $monday
     *
     * @return Schedule
     */
    public function setMonday($monday)
    {
        $this->monday = $monday;

        return $this;
    }

    /**
     * Get monday
     *
     * @return string
     */
    public function getMonday()
    {
        return $this->monday;
    }

    /**
     * Set tuesday
     *
     * @param string $tuesday
     *
     * @return Schedule
     */
    public function setTuesday($tuesday)
    {
        $this->tuesday = $tuesday;

        return $this;
    }

    /**
     * Get tuesday
     *
     * @return string
     */
    public function getTuesday()
    {
        return $this->tuesday;
    }

    /**
     * Set wednesday
     *
     * @param string $wednesday
     *
     * @return Schedule
     */
    public function setWednesday($wednesday)
    {
        $this->wednesday = $wednesday;

        return $this;
    }

    /**
     * Get wednesday
     *
     * @return string
     */
    public function getWednesday()
    {
        return $this->wednesday;
    }

    /**
     * Set thursday
     *
     * @param string $thursday
     *
     * @return Schedule
     */
    public function setThursday($thursday)
    {
        $this->thursday = $thursday;

        return $this;
    }

    /**
     * Get thursday
     *
     * @return string
     */
    public function getThursday()
    {
        return $this->thursday;
    }

    /**
     * Set friday
     *
     * @param string $friday
     *
     * @return Schedule
     */
    public function setFriday($friday)
    {
        $this->friday = $friday;

        return $this;
    }

    /**
     * Get friday
     *
     * @return string
     */
    public function getFriday()
    {
        return $this->friday;
    }

    /**
     * Set saturday
     *
     * @param string $saturday
     *
     * @return Schedule
     */
    public function setSaturday($saturday)
    {
        $this->saturday = $saturday;

        return $this;
    }

    /**
     * Get saturday
     *
     * @return string
     */
    public function getSaturday()
    {
        return $this->saturday;
    }

    /**
     * Set sunday
     *
     * @param string $sunday
     *
     * @return Schedule
     */
    public function setSunday($sunday)
    {
        $this->sunday = $sunday;

        return $this;
    }

    /**
     * Get sunday
     *
     * @return string
     */
    public function getSunday()
    {
        return $this->sunday;
    }

    /**
     * Set alertDay
     *
     * @param string $alertDay
     *
     * @return Schedule
     */
    public function setAlertDay($alertDay)
    {
        $this->alertDay = $alertDay;

        return $this;
    }

    /**
     * Get alertDay
     *
     * @return string
     */
    public function getAlertDay()
    {
        return $this->alertDay;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get id
     *
     * @param id $id
     *
     * @return Schedule
     */
    public function setId($id)
    {
      $this->id = $id;

      return $this;
    }
    
    /**
     * 
     * @param unknown $date
     * @return string
     */
    public static function getDayFormated($date, $translator) {
    	$dayNumberOfWeek = date("N",strtotime($date));
    	$stringDay = "";
    	// Day
    	if ($dayNumberOfWeek == 1) {
    		$stringDay = $translator->trans('Monday');
    	}
    	elseif ($dayNumberOfWeek == 2) {
    		$stringDay = $translator->trans('Tuesday');
    	}
    	elseif ($dayNumberOfWeek == 3) {
    		$stringDay = $translator->trans('Wednesday');
    	}
    	elseif ($dayNumberOfWeek == 4) {
    		$stringDay = $translator->trans('Thursday');
    	}
    	elseif ($dayNumberOfWeek == 5) {
    		$stringDay = $translator->trans('Friday');
    	}
    	elseif ($dayNumberOfWeek == 6) {
    		$stringDay = $translator->trans('Saturday');
    	}
    	elseif ($dayNumberOfWeek == 7) {
    		$stringDay = $translator->trans('Sunday');
    	}
    	
    	return $stringDay;
    }
    
    /**
     * 
     * @param unknown $date
     * @return string
     */
    public static function getMonthFormated($date, $translator) {
    	$monthNumber = date("m",strtotime($date));
    	$stringMonth = "";
    	
    	if ($monthNumber == 1) {
    		$stringMonth = $translator->trans('january');
    	}
    	elseif ($monthNumber == 2) {
    		$stringMonth = $translator->trans('february');
    	}
    	elseif ($monthNumber == 3) {
    		$stringMonth = $translator->trans('march');
    	}
    	elseif ($monthNumber == 4) {
    		$stringMonth = $translator->trans('april');
    	}
    	elseif ($monthNumber == 5) {
    		$stringMonth = $translator->trans('may');
    	}
    	elseif ($monthNumber == 6) {
    		$stringMonth = $translator->trans('june');
    	}
    	elseif ($monthNumber == 7) {
    		$stringMonth = $translator->trans('july');
    	}
    	elseif ($monthNumber == 8) {
    		$stringMonth = $translator->trans('august');
    	}
    	elseif ($monthNumber == 9) {
    		$stringMonth = $translator->trans('september');
    	}
    	elseif ($monthNumber == 10) {
    		$stringMonth = $translator->trans('october');
    	}
    	elseif ($monthNumber == 11) {
    		$stringMonth = $translator->trans('november');
    	}
    	elseif ($monthNumber == 12) {
    		$stringMonth = $translator->trans('december');
    	}
    	
    	return $stringMonth;
    }
    
    	 
}
