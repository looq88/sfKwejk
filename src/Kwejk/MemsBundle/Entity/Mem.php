<?php

namespace Kwejk\MemsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Mems
 *
 * @ORM\Table(name="mem")
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Mem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\ManyToOne(targetEntity="Kwejk\UserBundle\Entity\User", inversedBy="mems")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * @var Kwejk\UserBundle\Entity\User
     */
    private $createdBy;
    
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="mem")
     * @var ArrayCollection
     */
    private $comments;
    
    /**
     * @ORM\OneToMany(targetEntity="Rating", mappedBy="mem")
     * @var ArrayCollection
     */
    private $raitings;
    
    /**
     * @Vich\UploadableField(mapping="mems_image", fileNameProperty="imageName")
     * 
     * @var File $imageFile 
     */
    private $imageFile;
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * 
     * @Gedmo\Slug(fields={"title"})
     * 
     * @ORM\Column(name="slug", length=255, unique=true)
     */
    private $slug;
    
    /**
     * @var string
     *
     * @ORM\Column(name="image_name", type="string", length=255)
     */
    private $imageName;

    /**
     * @var string
     *
     * @ORM\Column(name="is_accepted", type="string", length=255)
     */
    private $isAccepted = false;


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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Mems
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
     * Set title
     *
     * @param string $title
     * @return Mems
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
     * @return Mems
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
     * Set imageFile
     *
     * @param File $imageFile
     */
    public function setImageFile(File $imageFile)
    {
        $this->imageFile = $imageFile;
    }
    
    /**
     * Get imageFile
     * 
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }
    
    /**
     * Set imageName
     *
     * @param string $imageName
     * @return MemsFile
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string 
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set isAccepted
     *
     * @param string $isAccepted
     * @return Mems
     */
    public function setIsAccepted($isAccepted)
    {
        $this->isAccepted = $isAccepted;

        return $this;
    }

    /**
     * Get isAccepted
     *
     * @return string 
     */
    public function getIsAccepted()
    {
        return $this->isAccepted;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->raitings = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set createdBy
     *
     * @param \Kwejk\UserBundle\Entity\User $createdBy
     * @return Mem
     */
    public function setCreatedBy(\Kwejk\UserBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Kwejk\UserBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Add comments
     *
     * @param \Kwejk\MemsBundle\Entity\Comment $comments
     * @return Mem
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
     * @return Mem
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
