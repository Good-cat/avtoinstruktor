<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 24.08.15
 * Time: 22:09
 */

namespace FeedbackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FeedbackBundle\Entity\FeedbackPost;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="feedback_comment", options={"collate"="utf8_general_ci", "charset"="utf8", "engine"="MyISAM"})
 */
class FeedbackComment {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $author;

    /**
     * @ORM\Column(type="text")
     */
    protected $text;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $visible;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $update_at;

    /**
     * @ORM\ManyToOne(targetEntity="FeedbackPost", inversedBy="feedback_comments", cascade={"persist"})
     * @ORM\JoinColumn(name="feedback_post_id", referencedColumnName="id")
     */
    protected $feedback_post;

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
     * Set author
     *
     * @param string $author
     * @return FeedbackComment
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return FeedbackComment
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return FeedbackComment
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set update_at
     *
     * @param \DateTime $updateAt
     * @return FeedbackComment
     */
    public function setUpdateAt($updateAt)
    {
        $this->update_at = $updateAt;

        return $this;
    }

    /**
     * Get update_at
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->update_at;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdateAtValue()
    {
        $this->update_at = new \DateTime();
    }


    /**
     * Set feedback_post
     *
     * @param \FeedbackBundle\Entity\FeedbackPost $feedbackPost
     * @return FeedbackComment
     */
    public function setFeedbackPost(FeedbackPost $feedbackPost = null)
    {
        $this->feedback_post = $feedbackPost;
        return $this;
    }

    /**
     * Get feedback_post
     *
     * @return \FeedbackBundle\Entity\FeedbackPost 
     */
    public function getFeedbackPost()
    {
        return $this->feedback_post;
    }

    public function __toString()
    {
        return $this->text;
    }
}
