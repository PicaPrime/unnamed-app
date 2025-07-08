<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $joinedDate = $user ? $user->created_at->format('F j, Y') : null;
        // Example dynamic data, replace with real DB queries as needed
        $balance = [
            'btc' => 0.12345678,
            'fiat' => 4567.89,
        ];
        $depositAddress = 'bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh';
        $referral = [
            'link' => 'https://hustlebtc.com/r/' . ($user->name ?? 'YourUsername'),
            'total' => 12,
            'earned' => 0.00456789,
            'rate' => 25,
        ];
        $stats = [
            'deposits' => 2.45678901,
            'withdrawals' => 1.23456789,
            'faucet' => 0.00123456,
            'net_profit' => 0.98765432,
        ];
        $achievements = [
            ['icon' => '🎯', 'title' => 'First Win', 'desc' => 'Win your first game', 'earned' => true],
            ['icon' => '💯', 'title' => 'Century Club', 'desc' => 'Play 100 games', 'earned' => true],
            ['icon' => '🚀', 'title' => 'High Roller', 'desc' => 'Wager over 10 BTC total', 'earned' => true],
            ['icon' => '👑', 'title' => 'Millionaire', 'desc' => 'Win 1 BTC in a single game', 'earned' => false],
            ['icon' => '🔥', 'title' => 'Hot Streak', 'desc' => 'Win 20 games in a row', 'earned' => false],
            ['icon' => '💎', 'title' => 'Diamond Hands', 'desc' => 'Cash out at 50x multiplier', 'earned' => false],
        ];
        $transactions = [
            ['type' => 'deposit', 'amount' => 0.05, 'status' => 'confirmed', 'date' => '2 hours ago'],
            ['type' => 'withdrawal', 'amount' => -0.025, 'status' => 'confirmed', 'date' => '1 day ago'],
            ['type' => 'faucet', 'amount' => 0.00001, 'status' => 'confirmed', 'date' => '3 days ago'],
        ];
        return view('pages.account', [
            'user' => $user,
            'joinedDate' => $joinedDate,
            'balance' => $balance,
            'depositAddress' => $depositAddress,
            'referral' => $referral,
            'stats' => $stats,
            'achievements' => $achievements,
            'transactions' => $transactions,
        ]);
    }

    public function security()
    {
        $user = auth()->user();
        $joined_date = $user ? $user->created_at->format('F j, Y') : null;
        return view('pages.security', [
            'user' => $user,
            'joined_date' => $joined_date,
        ]);
    }

    public function transfer()
    {
        $user = auth()->user();
        $joined_date = 'Sat Mar 29 2025'; // Replace with $user->created_at->format('D M d Y') if available
        $joined_ago = '3 months ago'; // Replace with Carbon::parse($user->created_at)->diffForHumans() if available
        // Example transfer history, replace with real data from DB
        $transfer_history = [
            [
                'from' => $user ? $user->name : 'YourUsername',
                'amount' => -1000,
                'to' => 'PlayerABC',
                'date' => '2 hours ago',
            ],
            [
                'from' => 'PlayerXYZ',
                'amount' => 500,
                'to' => $user ? $user->name : 'YourUsername',
                'date' => '1 day ago',
            ],
            [
                'from' => $user ? $user->name : 'YourUsername',
                'amount' => -2500,
                'to' => 'CryptoKing',
                'date' => '3 days ago',
            ],
        ];
        return view('pages.transfer', [
            'user' => $user,
            'joined_date' => $joined_date,
            'joined_ago' => $joined_ago,
            'transfer_history' => $transfer_history,
        ]);
    }


    public function faucet()
    {
        $user = Auth::user();
        $joinedDate = $user ? $user->created_at->format('F j, Y') : null;
        // Example faucet and referral data
        $faucet = [
            'claimable' => true,
            'amount' => 100,
            'last_claimed' => '2 hours ago',
        ];
        $referral = [
            'link' => 'https://hustlebtc.com/r/' . ($user->name ?? 'YourUsername'),
            'total' => 12,
            'earned' => 0.00456789,
            'rate' => 25,
        ];
        return view('pages.faucet', [
            'user' => $user,
            'joinedDate' => $joinedDate,
            'faucet' => $faucet,
            'referral' => $referral,
        ]);
    }

    public function investment()
    {
        $user = Auth::user();
        $joinedDate = $user ? $user->created_at->format('F j, Y') : null;
        // Example investment data
        $investment = [
            'total_invested' => 0.25,
            'total_profit' => 0.0123,
            'active_investments' => 2,
            'roi' => 4.92,
        ];
        $stats = [
            'bankroll' => 5.0,
            'investors' => 42,
            'total_paid' => 0.45,
            'active' => true,
        ];
        return view('pages.investment', [
            'user' => $user,
            'joinedDate' => $joinedDate,
            'investment' => $investment,
            'stats' => $stats,
        ]);
    }

    public function leaderboard()
    {
        // Example leaderboard data, replace with real DB queries as needed
        $leaders = [
            [
                'rank' => 1,
                'name' => 'CryptoKing',
                'profit' => 1.2345,
                'games_played' => 120,
                'avatar' => 'https://hustlebtc.com/img/hustle10.png',
            ],
            [
                'rank' => 2,
                'name' => 'BitcoinBull',
                'profit' => 0.9876,
                'games_played' => 110,
                'avatar' => 'https://hustlebtc.com/img/hustle11.png',
            ],
            [
                'rank' => 3,
                'name' => 'LuckyWinner',
                'profit' => 0.8765,
                'games_played' => 105,
                'avatar' => 'https://hustlebtc.com/img/hustle12.png',
            ],
            [
                'rank' => 4,
                'name' => 'HodlMaster',
                'profit' => 0.7654,
                'games_played' => 100,
                'avatar' => 'https://hustlebtc.com/img/hustle13.png',
            ],
            [
                'rank' => 5,
                'name' => 'SmartBetter',
                'profit' => 0.6543,
                'games_played' => 98,
                'avatar' => 'https://hustlebtc.com/img/hustle14.png',
            ],
        ];
        $user = Auth::user();
        $title = 'Leaderboard - HustleBTC';
        $description = 'Top players, profits, and stats on HustleBTC Bitcoin Casino.';
        $updated_at = 'July 8, 2025 12:00 UTC';
        
        return view('pages.leaderboard', [
            'leaders' => $leaders,
            'user' => $user,
            'title' => $title,
            'description' => $description,
            'updated_at' => $updated_at,
        ]);
    }
}
