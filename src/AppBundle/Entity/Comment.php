<?php

namespace AppBundle\Entity;

/**
 * Comment
 */
class Comment
{
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
     * @var \AppBundle\Entity\Post
     */
    private $post;


    /**
     * Set content
     *
     * @param string $content
     *
     * @return Comment
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
     * @return Comment
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
     * @return Comment
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

    /**
     * Set post
     *
     * @param \AppBundle\Entity\Post $post
     *
     * @return Comment
     */
    public function setPost(\AppBundle\Entity\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \AppBundle\Entity\Post
     */
    public function getPost()
    {
        return $this->post;
    }
}

