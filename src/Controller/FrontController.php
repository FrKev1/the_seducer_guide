<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Creates views that allow users to see the different pages
 * @Route(name="seducer_")
 */
class FrontController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('front/home.html.twig');
    }

    /**
     * @Route("/blog", name="blog")
     * @return Response
     */
    public function blog(): Response
    {
        return $this->render('front/blog.html.twig');
    }

    /**
     * @Route("/formations-de-seduction", name="formations")
     * @return Response
     */
    public function formations(): Response
    {
        return $this->render('front/formations.html.twig');
    }

    /**
     * @Route("/me-contacter", name="contact")
     * @return Response
     */
    public function contact(): Response
    {
        return $this->render('front/contact.html.twig');
    }
}