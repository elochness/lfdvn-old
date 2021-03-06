<?php

namespace AppBundle\Entity;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Category
 * 
 * @Vich\Uploadable
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
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $id;
    
    /**
     * @var string
     */
    private $image;
    
    /**
     * @Vich\UploadableField(mapping="category_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;
    
    /**
     * @var \AppBundle\Entity\Subcategory[]
     */
    private $subcategories;
    
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
        $this->updatedAt = new \DateTime();
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
     * Get all subcategories
     */
    public function getSubcategories()
    {
    	return $this->subcategories;
    }
    
    /**
     * Get all subcategories
     */
    public function setSubcategories($subcategories)
    {
    	return $this->subcategories = $subcategories;
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Product
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }
    
    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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

   
    /**
     * Set image
     *
     * @param string $image
     *
     * @return Category
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
    
    public function setImageFile($image = null)
    {
        // $this->imageFile = $this->getValidFilename($image);
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }
    
    public function getImageFile()
    {
    	return $this->imageFile;
    }
    
    /**
     * Add subcategory
     *
     * @param \AppBundle\Entity\Subcategory $subcategory
     *
     * @return Category
     */
    public function addSubcategories(\AppBundle\Entity\Subcategory $subcategory)
    {
    	$this->subcategories[] = $subcategory;
    
    	return $this;
    }
    
    /**
     * Remove subcategory
     *
     * @param \AppBundle\Entity\Subcategory $subcategory
     */
    public function removeSubcategories(\AppBundle\Entity\Subcategory $subcategory)
    {
    	$this->subcategories->removeElement($subcategory);
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
