<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Blog\ModelBundle\Entity\Author;


class AuthorController extends Controller
{
    /**
     * @Route("/show/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $author = $this->getDoctrine()->getRepository('ModelBundle:Author')->findOneBy(
            array(
                'slug' => $slug
            )
        );

        if (null === $author) {
            throw $this->createNotFoundException('Author not found');
        }

        $products = $this->getDoctrine()->getRepository('AcmeStoreBundle:Product')->findOneBy(
            array(
                'author' => $author
            )
        );

        return $this->render('AcmeStoreBundle:Store:showproduct.html.twig', array('products' => $products));
    }

}
