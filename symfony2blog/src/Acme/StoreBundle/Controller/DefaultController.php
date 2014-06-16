<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
class DefaultController extends Controller
{
    public function indexAction() {

        $products = $this->getDoctrine()
            ->getRepository('AcmeStoreBundle:Product')
            ->findAll();
        $latesProduct = $this->getDoctrine()
            ->getRepository('AcmeStoreBundle:Product')
            ->findLast(5);
        return $this->render('AcmeStoreBundle:Store:AllProduct.html.twig', array('produts' => $products, 'last_products' => $latesProduct));
//        return array('produts' => $products);
    }

    /**
     * Show a post
     *
     * 1Route("/{slug}")
     * 1Template()
     */
    public function showProductAction($slug) {
        $product = $this->getDoctrine()->getRepository('AcmeStoreBundle:Product')->findOneBy(
            array(
                'slug' => $slug
            )
        );

        if (null === $product) {
            throw $this->createNotFoundException('Product not found');
        }
        return $this->render('AcmeStoreBundle:Store:showproduct.html.twig', array('product' => $product));
    }

    public function createAction() {
        $product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice('12.56');
        $product->setDescription("Lorem ipsum");

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($product);
        $em->flush();
        return new Response('Created product id '.$product->getId());
    }

    public function showAction($id) {
        $product = $this->getDoctrine()
            ->getRepository('AcmeStoreBundle:Product')
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException('No product with id '.$id);
        }
        return new Response('Product name - '.$product->getName());

    }
    public function updateAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $product = $em->getRepository('AcmeStoreBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException('No found product with id: '.$id);

        }
        $product->setName('New product name');
        $em->flush();
        return new Response('Product update - '.$product->getId());

    }

}
