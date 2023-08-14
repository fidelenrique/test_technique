<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Constant\Card;

class CardController extends AbstractController
{
    /**
     * @Route("/")
     * @return Response
     */
    public function homepage(): Response
    {
        return $this->render('cards/homepage.html.twig');
    }

    /**
     * @Route("/card/rand", name="test")
     * @return Response
     */
    public function randCard(): Response
    {
        $cards = Card::mainCards();

        return $this->render('cards/rand.html.twig', [
            'cards' => $cards['cards'],
            'ascCards' => $cards['asc-cards'],
            'orderByColors' => $cards['order-by-colors']
        ]);
    }
}