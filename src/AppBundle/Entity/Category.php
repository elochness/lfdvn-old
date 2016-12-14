<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 */
class Category
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var integer
     */
    private $id;
    
    /**
     * @var Products[]
     */
    private $products;

    /**
     * Constructor
     * 
     */              
    public function __construct()
    {
        $this->purchases = new ArrayCollection();
        $this->enabled = true;
    }
    
    /**
     * Get all products
     */              
    public function getProducts()
    {
      return $this->products;
    }
    
    /**
     * Get all products
     */              
    public function setProducts($products)
    {
      return $this->products = $products;
    }
    
    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Category
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
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
     * Get String information of category
     *
     * @return string Name of category
     */
    public function __toString()
    {
      return $this->getName();
    }
}
