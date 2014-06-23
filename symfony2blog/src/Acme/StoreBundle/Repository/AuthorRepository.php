<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 16.06.14
 * Time: 13:42
 */

namespace Acme\StoreBundle\Repository;
use Blog\ModelBundle\Entity\Author;
use Doctrine\ORM\EntityRepository;

use Mapping\Fixture\Unmapped\Timestampable;


class AuthorRepository extends EntityRepository {

    public function findFirst() {
        $qb = $this->getQueryBuilder()
            -> orderBy('a.id', 'asc')
            ->setMaxResult(1);
        return $qb->getQuery()->getSingleResult();
    }

    public function getQueryBuilder() {
        $em = $this->getEntityManager();

        $qb = $em->getReposiory('BlogModelBundle:Author')
            ->createQueryBuilder('a');

        return $qb;
    }
} 