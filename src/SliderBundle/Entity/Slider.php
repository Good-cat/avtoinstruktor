<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 09.08.15
 * Time: 16:52
 */

namespace SliderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="slider", options={"collate"="utf8_general_ci", "charset"="utf8", "engine"="MyISAM"})
 */
class Slider {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $item;

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
     * Set item
     *
     * @param string $item
     * @return Slider
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return string 
     */
    public function getItem()
    {
        return $this->item;
    }

    public function __toString()
    {
        return 'Слайдер';
    }
}
