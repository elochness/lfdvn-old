<?php

namespace AppBundle\Entity;

/**
 * Subcategory
 */
class Subcategory
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
     * @var \AppBundle\Entity\Category
     */
    private $category;
    
    /**
     * @var \AppBundle\Entity\Product[]
     */
    private $products;
    
    /**
     * Constructor
     *
     */
    public function __construct()
    {
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
     * @return Subcategory
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
     * @return Subcategory
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
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Subcategory
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
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
    
    /**
     * Add product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return Category
     */
    public function addProduct(\AppBundle\Entity\Product $product)
    {
    	$this->products[] = $product;
    
    	return $this;
    }
    
    /**
     * Remove product
     *
     * @param \AppBundle\Entity\Product $product
     */
    public function removeProduct(\AppBundle\Entity\Product $product)
    {
    	$this->products->removeElement($product);
    }
}
