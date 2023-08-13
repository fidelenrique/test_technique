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
        $colorsAsc = [];

        while ($i <= 10):
            $rands = Card::randCards();
            if (!in_array($rands, $cards)) {
                $keysAsc[] = key($rands);
                $colorsAsc[] = key(array_flip($rands));
                $cards[] = $rands;
                $i++;
            }
        endwhile;

        return [
            'asc-cards' => Card::cardsSortedByAscendingValues($keysAsc, $cards),
            'order-by-colors' => Card::cardsSortedByColors($colorsAsc, $keysAsc, $cards),
            'cards' => $cards
        ];
    }

    private static function cardsSortedByAscendingValues($keysAsc, $cards): array
    {
        asort($keysAsc);

        $ascCards = [];
        // parcourir le tri par valeur
        foreach ($keysAsc as $key) {
            // collecter pour chaque carte
            for ($i = 0; $i < 10; $i++) {
                if (isset($cards[$i][$key])) {
                    $ascCards[$key][] = $cards[$i][$key];
                }
            }
        }

        $ascCardsData = [];
        for ($i = 0; $i <= 13; $i++) {
            if (!empty($ascCards[$i])) {
                $ascCardsData[] = [$i => array_unique($ascCards[$i])];
            }
        }

        return $ascCardsData;
    }

    private static function cardsSortedByColors($colorsAsc, $keysAsc, $cards)
    {
        asort($colorsAsc);
        asort($keysAsc);

        var_dump($colorsAsc);
    }
}