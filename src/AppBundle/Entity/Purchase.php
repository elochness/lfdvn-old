<?php

namespace AppBundle\Entity;

/**
 * Purchase
 */
class Purchase
{
    /**
     * @var \DateTime
     */
    private $deliverydate;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var \DateTime
     */
    private $deliveryhour;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\User
     */
    private $buyer;


    /**
     * Set deliverydate
     *
     * @param \DateTime $deliverydate
     *
     * @return Purchase
     */
    public function setDeliverydate($deliverydate)
    {
        $this->deliverydate = $deliverydate;

        return $this;
    }

    /**
     * Get deliverydate
     *
     * @return \DateTime
     */
    public function getDeliverydate()
    {
        return $this->deliverydate;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return Purchase
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set deliveryhour
     *
     * @param \DateTime $deliveryhour
     *
     * @return Purchase
     */
    public function setDeliveryhour($deliveryhour)
    {
        $this->deliveryhour = $deliveryhour;

        return $this;
    }

    /**
     * Get deliveryhour
     *
     * @return \DateTime
     */
    public function getDeliveryhour()
    {
        return $this->deliveryhour;
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
     * Set buyer
     *
     * @param \AppBundle\Entity\User $buyer
     *
     * @return Purchase
     */
    public function setBuyer(\AppBundle\Entity\User $buyer = null)
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * Get buyer
     *
     * @return \AppBundle\Entity\User
     */
    public function getBuyer()
    {
        return $this->buyer;
    }
}

