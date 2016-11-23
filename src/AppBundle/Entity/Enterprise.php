<?php

namespace AppBundle\Entity;

/**
 * Enterprise
 */
class Enterprise
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $contains;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $id;

    /**
     * Constructor
     */
    public function __construct__()
    {
      $this->createdAt = new \DateTime();
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Enterprise
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set contains
     *
     * @param string $contains
     *
     * @return Enterprise
     */
    public function setContains($contains)
    {
        $this->contains = $contains;

        return $this;
    }

    /**
     * Get contains
     *
     * @return string
     */
    public function getContains()
    {
        return $this->contains;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Enterprise
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
     * @return Enterprise
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
}
