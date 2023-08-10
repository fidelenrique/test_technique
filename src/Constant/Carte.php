<?php

namespace App\Constant;

abstract class Card
{
    public static function randCards(): array
    {
        return [rand(1, 13) => array_rand(['carreau' => 1, 'coeur' => 2, 'pique' => 3, 'trefle' => 4])
        ];
    }

    public static function mainCards(): array
    {
        $i = 1;
        $cards = [];
        $keysAsc = [];

        $keysDesc = [];
        while ($i <= 10):
            $rands = Card::randCards();
            if (!in_array($rands, $cards)) {
                $keysAsc[] = key($rands);
                $keysDesc[] = key($rands);
                $cards[] = $rands;
                $i++;
            }
        endwhile;

        asort($keysAsc);
        rsort($keysDesc);

        $count = 0;
        $ascCards = [];
        foreach ($keysAsc as $key) {

            if (isset($cards[0][$key])) {
                $ascCards[$key][] = $cards[0][$key];
            }
            if (isset($cards[1][$key])) {
                $ascCards[$key][] = $cards[1][$key];
            }
            if (isset($cards[2][$key])) {
                $ascCards[$key][] = $cards[2][$key];
            }
            if (isset($cards[3][$key])) {
                $ascCards[$key][] = $cards[3][$key];
            }
            if (isset($cards[4][$key])) {
                $ascCards[$key][] = $cards[4][$key];
            }
            if (isset($cards[5][$key])) {
                $ascCards[$key][] = $cards[5][$key];
            }
            if (isset($cards[6][$key])) {
                $ascCards[$key][] = $cards[6][$key];
            }
            if (isset($cards[7][$key])) {
                $ascCards[$key][] = $cards[7][$key];
            }
            if (isset($cards[8][$key])) {
                $ascCards[$key][] = $cards[8][$key];
            }
            if (isset($cards[9][$key])) {
                $ascCards[$key][] = $cards[9][$key];
            }

            $count++;
        }

        return [
          'asc-cards' => $ascCards,
          'cards' => $cards
        ];
    }
}