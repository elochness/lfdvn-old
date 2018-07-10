<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Purchase
 *
 * @ORM\Table(name="purchase", indexes={@ORM\Index(name="IDX_6117D13B6C755722", columns={"buyer_id"})})
 * @ORM\Entity
 */
class Purchase
{
    /**
     * @var \Date
     *
     * @ORM\Column(name="delivery_date", type="date", nullable=false)
     */
    private $deliveryDate;
    
    /**
     * Delivery date formated
     * 
     * @var \Date
     */
    private $deliveryDateFormated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $items;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="buyer_id", referencedColumnName="id")
     * })
     */
    private $buyer;
    
    /**
     * @var string
     */
    private $comment;

    /**
     * Constructor of the Purchase class.
     * (Initialize some fields).
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->deliveryDate = new \DateTime();
        $this->items = new ArrayCollection();
    }
    
    /**
     * Get String information of user
     *
     * @return string Name of user
     */
    public function __toString()
    {
      return $this->getId() . " - " . $this->getCreatedAt();
    }

    /**
     * Set deliveryDate
     *
     * @param \Date $deliveryDate
     *
     * @return Purchase
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    /**
     * Get deliveryDate
     *
     * @return \Date
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }
    
    /**
     * Set deliveryDateFormated
     *
     * @param \Date $deliveryDateFormated
     *
     * @return Purchase
     */
    public function setDeliveryDateFormated($deliveryDateFormated)
    {
    	$this->deliveryDateFormated = $deliveryDateFormated;
    
    	return $this;
    }
    
    /**
     * Get deliveryDateFormated
     *
     * @return \Date
     */
    public function getDeliveryDateFormated()
    {
    	return $this->deliveryDateFormated;
    }
    
        
    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Purchase
     */
    public function setComment($comment)
    {
    	$this->comment = $comment;
    
    	return $this;
    }
    
    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
    	return $this->comment;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Purchase
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
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
  
    /**
     * Add item
     *
     * @param \AppBundle\Entity\PurchaseItem $item
     *
     * @return Purchase
     */
    public function addItem(\AppBundle\Entity\PurchaseItem $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \AppBundle\Entity\PurchaseItem $item
     */
    public function removeItem(\AppBundle\Entity\PurchaseItem $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }
}
