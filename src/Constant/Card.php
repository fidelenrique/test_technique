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
        // 1) iteration sort 10 cards
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
            'order-by-colors' => Card::cardsSortedByColors($colorsAsc, $cards),
            'cards' => $cards
        ];
    }

    private static function cardsSortedByAscendingValues($keysAsc, $cards): array
    {
        asort($keysAsc);

        $ascCards = [];
        // 2 browse sort by value
        foreach ($keysAsc as $key) {
            // 3 collect for each card
            for ($i = 0; $i < 10; $i++) {
                if (isset($cards[$i][$key])) {
                    $ascCards[$key][] = $cards[$i][$key];
                }
            }
        }

        $ascCardsData = [];
        // 4 collect without duplicates
        for ($i = 0; $i <= 13; $i++) {
            if (!empty($ascCards[$i])) {
                $ascCardsData[] = [$i => array_unique($ascCards[$i])];
            }
        }

        return $ascCardsData;
    }

    private static function cardsSortedByColors($colorsAsc, $cards): array
    {
        asort($colorsAsc);
        $orderColorsAcs = [];
        // 6 browse sort by value
        foreach ($colorsAsc as $color) {

            if ($color === 'carreau') {
                // 7 go through the 10 cards to find the carreau
                for ($i = 0; $i < 10; $i++) {
                    if (isset($cards[$i])) {
                        if(key(array_flip($cards[$i])) === $color) {
                            $orderColorsAcs[$color][] = key($cards[$i]);
                        }
                    }
                }
            }
            if ($color === 'coeur') {
                // 8 go through the 10 cards to find the coeur
                for ($i = 0; $i < 10; $i++) {
                    if (isset($cards[$i])) {
                        if(key(array_flip($cards[$i])) === $color) {
                            $orderColorsAcs[$color][] = key($cards[$i]);
                        }
                    }
                }
            }

            if ($color === 'pique') {
                // 9 go through the 10 cards to find the pique
                for ($i = 0; $i < 10; $i++) {
                    if (isset($cards[$i])) {
                        if(key(array_flip($cards[$i])) === $color) {
                            $orderColorsAcs[$color][] = key($cards[$i]);
                        }
                    }
                }
            }
            if ($color === 'trefle') {
                // 10 go through the 10 cards to find the trefle
                for ($i = 0; $i < 10; $i++) {
                    if (isset($cards[$i])) {
                        if(key(array_flip($cards[$i])) === $color) {
                            $orderColorsAcs[$color][] = key($cards[$i]);
                        }
                    }
                }
            }

        }

        $resultColors = [];

        if (isset($orderColorsAcs['carreau'])) {
            if (!empty($orderColorsAcs['carreau'])) {
                $resultColors[] = ['carreau' => array_unique($orderColorsAcs['carreau'])];
            }
        }
        if (isset($orderColorsAcs['coeur'])) {
            if (!empty($orderColorsAcs['coeur'])) {
                $resultColors[] = ['coeur' => array_unique($orderColorsAcs['coeur'])];
            }
        }
        if (isset($orderColorsAcs['pique'])) {
            if (!empty($orderColorsAcs['pique'])) {
                $resultColors[] = ['pique' => array_unique($orderColorsAcs['pique'])];
            }
        }
        if (isset($orderColorsAcs['trefle'])) {
            if (!empty($orderColorsAcs['trefle'])) {
                $resultColors[] = ['trefle' => array_unique($orderColorsAcs['trefle'])];
            }
        }

        return $resultColors;
    }
}