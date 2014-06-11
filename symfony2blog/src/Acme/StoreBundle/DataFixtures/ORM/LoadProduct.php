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
    public function getOrder() {
        return 10;
    }

    public function load(ObjectManager $manager){
        $product = new Product();
        $product -> setName('Product1');
        $product -> setPrice(18);
        $product->setDescription('Lorem ipsum sefis oeioseh fioso sofe osie');

        $product2 = new Product();
        $product2 -> setName('Product2');
        $product2 -> setPrice(18);
        $product2->setDescription('Lorem2222 ipsum sefis oeioseh fioso sofe osie');

        $product3 = new Product();
        $product3 -> setName('Product3');
        $product3 -> setPrice(18);
        $product3->setDescription('Lorem3333 ipsum sefis oeioseh fioso sofe osie');

        $manager->persist($product);
        $manager->persist($product2);
        $manager->persist($product3);
        $manager->flush();
    }
} 