<?php

namespace Cody\LandingPageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="record")
 */
class Record
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $email;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $ip;
    
    /** @ORM\Column(type="datetime", name="posted_at") */
    protected $postedAt;

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Record
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
     * Set ip
     *
     * @param string $ip
     * @return Record
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set postedAt
     *
     * @param \DateTime $postedAt
     * @return Record
     */
    public function setPostedAt($postedAt)
    {
        $this->postedAt = $postedAt;

        return $this;
    }

    /**
     * Get postedAt
     *
     * @return \DateTime 
     */
    public function getPostedAt()
    {
        return $this->postedAt;
    }
}
