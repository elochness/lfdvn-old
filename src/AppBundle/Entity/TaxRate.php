<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaxRate
 *
 * @ORM\Table(name="tax_rate")
 * @ORM\Entity
 */
class TaxRate
{
    /**
     * @var float
     *
     * @ORM\Column(name="rate", type="float", precision=10, scale=0, nullable=false)
     */
    private $rate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Set rate
     *
     * @param float $rate
     *
     * @return Tax Rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return rate
     */
    public function getRate()
    {
        return $this->rate;
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
     * Get String information of TaxRate
     *
     * @return string Name of TaxRate
     */
    public function __toString()
    {
      return strval($this->getRate()) . " %";
    }
}
