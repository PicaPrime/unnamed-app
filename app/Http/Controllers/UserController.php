<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Example dynamic data, replace with real queries as needed
        $stats = [
            'games_played' => 1247,
            'total_wagered' => '0.00000000',
            'net_profit' => '0.00000000',
            'global_rank' => 42,
        ];
        $metrics = [
            'win_rate' => 68.5,
            'avg_multiplier' => 2.45,
            'best_streak' => 12,
        ];
        $recent_activity = [
            [
                'type' => 'win',
                'title' => 'Won at 3.45x',
                'details' => '0.001 ₿ → 0.00345 ₿',
                'time' => '2h ago',
            ],
            [
                'type' => 'loss',
                'title' => 'Crashed at 1.23x',
                'details' => 'Lost 0.002 ₿',
                'time' => '3h ago',
            ],
            [
                'type' => 'win',
                'title' => 'Won at 8.91x',
                'details' => '0.0005 ₿ → 0.004455 ₿',
                'time' => '5h ago',
            ],
        ];
        $achievements = [
            [
                'icon' => '🎯',
                'name' => 'First Win',
                'description' => 'Win your first game',
                'earned' => true,
            ],
            [
                'icon' => '💯',
                'name' => 'Century Club',
                'description' => 'Play 100 games',
                'earned' => true,
            ],
            [
                'icon' => '🚀',
                'name' => 'High Roller',
                'description' => 'Wager over 10 BTC total',
                'earned' => true,
            ],
            [
                'icon' => '👑',
                'name' => 'Millionaire',
                'description' => 'Win 1 BTC in a single game',
                'earned' => false,
            ],
            [
                'icon' => '🔥',
                'name' => 'Hot Streak',
                'description' => 'Win 20 games in a row',
                'earned' => false,
            ],
            [
                'icon' => '💎',
                'name' => 'Diamond Hands',
                'description' => 'Cash out at 50x multiplier',
                'earned' => false,
            ],
        ];
        $joined_date = 'Sat Mar 29 2025';
        $joined_ago = '3 months ago';
        return view('pages.user', [
            'user' => $user,
            'stats' => $stats,
            'metrics' => $metrics,
            'recent_activity' => $recent_activity,
            'achievements' => $achievements,
            'joined_date' => $joined_date,
            'joined_ago' => $joined_ago,
        ]);
    }
}
