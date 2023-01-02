<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/")
     * @return Response
     */
    public function homepage(): Response
    {
        return $this->render('products/homepage.html.twig');
    }

    /**
     * @Route("/products/{slug}")
     * @param $slug
     * @return Response
     */
    public function show($slug): Response
    {
        $answers = [
            'Make sure your cat is sitting perfectly still 😉',
            'Honestly, I like furry shoes better than MY cat',
            'Maybe... try saying the spell backwards?',
        ];

        return $this->render('products/show.html.twig', [
            'product' => ucwords(str_replace('-', ' ', $slug)),
            'answers' => $answers
        ]);
    }
}