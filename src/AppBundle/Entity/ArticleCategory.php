<?php

namespace AppBundle\Entity;

/**
 * Article
 */
class ArticleCategory
{

  /**
     * Element number per page
     */
    const ARTICLE_PRINCIPAL = 1;

    /**
     * Element number per page
     */
    const ARTICLE_ENTERPRISE = 2;

    /**
     * Element number per page
     */
    const ARTICLE_BANDEAU = 3;
    
    /**
     * Id of recipe article
     */
    const ARTICLE_RECIPE = 4;
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return ArticleCategory
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
     * Set id
     *
     * @param int $id
     *
     * @return ArticleCategory
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Get String information of article category
     *
     * @return string Name of article category
     */
    public function __toString()
    {
      return $this->getName();
    }
}
