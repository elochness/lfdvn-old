<?php

namespace AppBundle\Entity;

/**
 * Schedule
 */
class Schedule
{
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
}

