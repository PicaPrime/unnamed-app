<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $joinedDate = $user ? $user->created_at->format('F j, Y') : null;
        // Example support tickets, replace with real DB data
        $tickets = [
            [
                'id' => 1,
                'title' => 'Withdrawal Issue',
                'status' => 'open',
                'action' => 'Reply',
            ],
            [
                'id' => 2,
                'title' => 'Account Verification',
                'status' => 'closed',
                'action' => 'View',
            ],
            [
                'id' => 3,
                'title' => 'Deposit Problem',
                'status' => 'open',
                'action' => 'Reply',
            ],
        ];
        return view('pages.support', [
            'user' => $user,
            'joinedDate' => $joinedDate,
            'tickets' => $tickets,
        ]);
    }
}
