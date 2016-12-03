<?php

namespace AppBundle\Entity;

/**
 * Post
 */
class Post
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $summary;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $authoremail;

    /**
     * @var \DateTime
     */
    private $publishedat;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Post
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Post
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Post
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set authoremail
     *
     * @param string $authoremail
     *
     * @return Post
     */
    public function setAuthoremail($authoremail)
    {
        $this->authoremail = $authoremail;

        return $this;
    }

    /**
     * Get authoremail
     *
     * @return string
     */
    public function getAuthoremail()
    {
        return $this->authoremail;
    }

    /**
     * Set publishedat
     *
     * @param \DateTime $publishedat
     *
     * @return Post
     */
    public function setPublishedat($publishedat)
    {
        $this->publishedat = $publishedat;

        return $this;
    }

    /**
     * Get publishedat
     *
     * @return \DateTime
     */
    public function getPublishedat()
    {
        return $this->publishedat;
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
