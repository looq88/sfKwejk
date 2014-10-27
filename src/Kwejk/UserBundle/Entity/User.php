<?php

namespace Kwejk\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Kwejk\MemsBundle\Entity\Mem", mappedBy="createdBy")
     * @var ArrayCollection
     */
    private $mems;
    
    /**
     * @ORM\OneToMany(targetEntity="Kwejk\MemsBundle\Entity\Comment", mappedBy="createdBy")
     * @var ArrayCollection
     */
    private $comments;
    
    /**
     * @ORM\OneToMany(targetEntity="Kwejk\MemsBundle\Entity\Rating", mappedBy="createdBy")
     * @var ArrayCollection
     */
    private $raitings;
    
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
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->roles= ['ROLE_USER'];
        
        $this->mems = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->raitings = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mems
     *
     * @param \Kwejk\MemsBundle\Entity\Mem $mems
     * @return User
     */
    public function addMem(\Kwejk\MemsBundle\Entity\Mem $mems)
    {
        $this->mems[] = $mems;

        return $this;
    }

    /**
     * Remove mems
     *
     * @param \Kwejk\MemsBundle\Entity\Mem $mems
     */
    public function removeMem(\Kwejk\MemsBundle\Entity\Mem $mems)
    {
        $this->mems->removeElement($mems);
    }

    /**
     * Get mems
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMems()
    {
        return $this->mems;
    }

    /**
     * Add comments
     *
     * @param \Kwejk\MemsBundle\Entity\Comment $comments
     * @return User
     */
    public function addComment(\Kwejk\MemsBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Kwejk\MemsBundle\Entity\Comment $comments
     */
    public function removeComment(\Kwejk\MemsBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add raitings
     *
     * @param \Kwejk\MemsBundle\Entity\Rating $raitings
     * @return User
     */
    public function addRaiting(\Kwejk\MemsBundle\Entity\Rating $raitings)
    {
        $this->raitings[] = $raitings;

        return $this;
    }

    /**
     * Remove raitings
     *
     * @param \Kwejk\MemsBundle\Entity\Rating $raitings
     */
    public function removeRaiting(\Kwejk\MemsBundle\Entity\Rating $raitings)
    {
        $this->raitings->removeElement($raitings);
    }

    /**
     * Get raitings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRaitings()
    {
        return $this->raitings;
    }
}
