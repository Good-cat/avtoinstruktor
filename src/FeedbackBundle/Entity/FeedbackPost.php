<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 22.08.15
 * Time: 11:14
 */

namespace FeedbackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Utils\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use FeedbackBundle\Entity\FeedbackComment;

/**
 * @ORM\Entity
 * @ORM\Table(name="feedback_post", options={"collate"="utf8_general_ci", "charset"="utf8", "engine"="MyISAM"})
 */

class FeedbackPost {
    const FEEDBACK_POSTS_PER_PAGE = 10;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
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
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="FeedbackComment", mappedBy="feedback_post", orphanRemoval=true, cascade={"persist"})
     */
    private $feedback_comments;

    public function __construct()
    {
        $this->feedback_comments = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTeitl($title)
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
     * Set text
     *
     * @param string $text
     * @return Post
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
     * @return Post
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
     * @return Post
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
     * Set slug
     *
     * @param string $slug
     * @return Post
     */
    public function setSlug()
    {
        $this->slug = Slugify::slug($this->author);

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

    public function __toString()
    {
        return $this->author;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return FeedbackPost
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
     * Add feedback_comments
     *
     * @param \FeedbackBundle\Entity\FeedbackComment $feedbackComments
     * @return FeedbackPost
     */
    public function addFeedbackComment(FeedbackComment $feedbackComment)
    {
        $feedbackComment->setFeedbackPost($this);
        $this->feedback_comments[] = $feedbackComment;

        return $this;
    }

    /**
     * Remove feedback_comments
     *
     * @param \FeedbackBundle\Entity\FeedbackComment $feedbackComments
     */
    public function removeFeedbackComment(FeedbackComment $feedbackComments)
    {
        $this->feedback_comments->removeElement($feedbackComments);
    }

    /**
     * Get feedback_comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFeedbackComments()
    {
        return $this->feedback_comments;
    }
}
