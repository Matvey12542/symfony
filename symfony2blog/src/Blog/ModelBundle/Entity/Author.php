<?php

namespace Blog\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
//use Symfony\Component\Validator\Constraint as Assert;
use  Acme\StoreBundle\Repository\AuthorRepository;
/**
 * Author
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Acme\StoreBundle\Repository\AuthorRepository")
 */

class Author extends TimeStampable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @Gedmo\Slug(fields={"name"}, unique=false)
     * @ORM\Column(length=255)
     *
     */
    private $slug;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Post", mappedBy="author", cascade={"remove"})
     */

    private $posts;



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
     * Set name
     *
     * @param string $name
     * @return Author
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
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set slug
     *
     * @param string $slug
     * @return Author
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
     * Add posts
     *
     * @param \Blog\ModelBundle\Entity\Post $posts
     * @return Author
     */
    public function addPost(\Blog\ModelBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;
    
        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Blog\ModelBundle\Entity\Post $posts
     */
    public function removePost(\Blog\ModelBundle\Entity\Post $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }
}