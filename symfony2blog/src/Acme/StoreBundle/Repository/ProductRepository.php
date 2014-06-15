<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 15.06.14
 * Time: 18:39
 */

namespace Acme\StoreBundle\Repository;
use Doctrine\ORM\EntityRepository;
/**
 * Class ProductRepository
 * @package Acme\StoreBundle\Repository
 */
class ProductRepository extends EntityRepository {
    /**
     * Find Last
     */
    public function findLast($num) {
        $qb =  $this->getQueryBuilder()
            ->setMaxResults($num);
        return $qb->getQuery()->getResult();
    }

    private function getQueryBuilder() {
        $em = $this->getEntityManager();
        $qb = $em->getRepository('AcmeStoreBundle:Product')
            ->createQueryBuilder('p');
        return $qb;
    }

    /**
     * find first
     */
    public function findFirs() {
        $qb = $this->getQueryBuilder()
            ->orderBy('p.id','asc')
            ->setMaxResults(1);
        return $qb->getQuery()->getSingleResult();
    }
} 