<?php

namespace AppBundle\Entity;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Product
 *
 * @Vich\Uploadable
 */
class Product
{

    /**
     * Element number per page
     */
    const NUM_ITEMS = 10;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $quantity;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var decimal
     */
    private $price;
    
    /**
     * @var decimal
     */
    private $refundable;

    /**
     * @var string
     */
    private $taxRate;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Category
     */
    private $category;

    /**
     * @var string
     */
    private $packaging;

    /**
     * Constructor of the Article class.
     * (Initialize some fields).
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->enabled = true;
    }
    
    /**
     * Get String information of user
     *
     * @return string Name of user
     */
    public function __toString()
    {
      return $this->getName();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Product
     */
    public function setImage($image)
    {
    	$this->image = $image;
    	//$this->image = $this->getValidFilename($image);

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
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Product
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Product
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
     * Set price
     *
     * @param float $refundable
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * Set refundable
     *
     * @param decimal $refundable
     *
     * @return Product
     */
    public function setRefundable($refundable)
    {
    	$this->refundable = $refundable;
    
    	return $this;
    }
    
    /**
     * Get refundable
     *
     * @return decimal
     */
    public function getRefundable()
    {
    	return $this->refundable;
    }

    /**
     * Set taxRate
     *
     * @param string $taxRate
     *
     * @return Product
     */
    public function setTaxRate($taxRate)
    {
        $this->taxRate = $taxRate;

        return $this;
    }

    /**
     * Get taxRate
     *
     * @return string
     */
    public function getTaxRate()
    {
        return $this->taxRate;
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
     * @return Product
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
     * Set packaging
     *
     * @param string $packaging
     *
     * @return Product
     */
    public function setPackaging($packaging = null)
    {
        $this->packaging = $packaging;

        return $this;
    }

    /**
     * Get packaging
     *
     * @return $packaging
     */
    public function getPackaging()
    {
        return $this->packaging;
    }
    
    /**
     * Replace filename for validation
     * @param string $originFilename origin of filename
     * @return string valid filename
     */
    private function getValidFilename($originFilename)
    {
    	//remplacement lettres accentuées par équivalent
    	$modifiedFilename = strtr($originFilename ,
    			'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
    			'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    	
    	//n'autorise que les lettres et les chiffres et les caractères '_' et '-'; remplace tous les autres caractères par '-'
    	return preg_replace('/([^.a-z0-9_-]+)/i', '-', $modifiedFilename);
    }
}
