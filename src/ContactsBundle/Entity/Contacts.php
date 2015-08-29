<?php

namespace ContactsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="contacts", options={"collate"="utf8_general_ci", "charset"="utf8", "engine"="MyISAM"})
 */

class Contacts {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $phones;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $skype;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $address;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $information;

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
     * Set phones
     *
     * @param string $phones
     * @return Contact
     */
    public function setPhones($phones)
    {
        $this->phones = $phones;

        return $this;
    }

    /**
     * Get phones
     *
     * @return string 
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set skype
     *
     * @param string $skype
     * @return Contact
     */
    public function setSkype($skype)
    {
        $this->skype = $skype;

        return $this;
    }

    /**
     * Get skype
     *
     * @return string 
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Contact
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set information
     *
     * @param string $information
     * @return Contact
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return string 
     */
    public function getInformation()
    {
        return $this->information;
    }

    public function __toString()
    {
        return "Контакты";
    }
}
