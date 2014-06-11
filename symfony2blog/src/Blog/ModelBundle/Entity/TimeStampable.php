<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 01.06.14
 * Time: 17:20
 */

namespace Blog\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Validator\Constraint as Assert;

/**
 * Class TimeStampable
 * @package Blog\ModelBundle\Entity
 * @ORM\MappedSuperclass
 */
abstract class TimeStampable {
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime")
     */
    private $createAt;

    public function __construct() {
        $this->createAt = new \DateTime();
    }
    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return Author
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }
}