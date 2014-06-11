<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 11.06.14
 * Time: 13:37
 */

namespace Acme\StoreBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\StoreBundle\Entity\Product;

class LoadProductData implements FixtureInterface {
    public function load(ObjectManager $manager){
        $product = new Product();
        $product -> setName('Product1');
        $product -> setPrice(18);
        $product->setDescription('Lorem ipsum sefis oeioseh fioso sofe osie');

        $manager->persist($product);
        $manager->flush();
    }
} 