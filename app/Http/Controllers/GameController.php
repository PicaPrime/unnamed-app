<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        // Example dynamic data, replace with real DB queries as needed
        $game = [
            'id' => 12345,
            'title' => 'Bitcoin Crash Game',
            'multiplier' => 2.47,
            'time_ago' => '3 hours ago',
            'date' => 'January 15, 2025 14:32:15 UTC',
            'hash' => 'a1b2c3d4e5f6789012345678901234567890abcdef1234567890abcdef123456789012345678901234567890abcdef',
        ];
        $players = [
            [
                'name' => 'CryptoKing',
                'bet' => 1000,
                'cashed_out' => 2.47,
                'bonus' => 5.25,
                'profit' => 1522.5,
            ],
            [
                'name' => 'BitcoinBull',
                'bet' => 500,
                'cashed_out' => 2.35,
                'bonus' => null,
                'profit' => 675,
            ],
            [
                'name' => 'HodlMaster',
                'bet' => 2500,
                'cashed_out' => 1.85,
                'bonus' => null,
                'profit' => 2125,
            ],
            [
                'name' => 'RiskyPlayer',
                'bet' => 750,
                'cashed_out' => null,
                'bonus' => null,
                'profit' => -750,
            ],
            [
                'name' => 'GreedyGambler',
                'bet' => 1200,
                'cashed_out' => null,
                'bonus' => null,
                'profit' => -1200,
            ],
            [
                'name' => 'SmartBetter',
                'bet' => 300,
                'cashed_out' => 2.10,
                'bonus' => null,
                'profit' => 330,
            ],
            [
                'name' => 'AllInPlayer',
                'bet' => 5000,
                'cashed_out' => null,
                'bonus' => null,
                'profit' => -5000,
            ],
            [
                'name' => 'LuckyWinner',
                'bet' => 150,
                'cashed_out' => 2.40,
                'bonus' => 2.15,
                'profit' => 213.2,
            ],
        ];
        return view('pages.game', [
            'game' => $game,
            'players' => $players,
        ]);
    }
}
