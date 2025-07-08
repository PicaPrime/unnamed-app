<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqTitle = 'Frequently Asked Questions';
        // Example FAQ data, replace with DB or config as needed
        $faqs = [
            [
                'question' => 'What is HustleBTC Bitcoin Casino?',
                'answer' => 'HustleBTC is a premier Bitcoin casino featuring a thrilling social cryptocurrency gambling experience. Our provably fair Bitcoin crash game offers real-time, exciting gameplay where you can securely play for fun or win substantial Bitcoin rewards. Each round of our crypto multiplier game gives you the opportunity to place Bitcoin bets before the round starts. Once the Bitcoin gambling round begins, a lucky multiplier starts at 1x and climbs higher and higher. At any moment, you can click "Cashout" to lock in the current multiplier and win your multiplied Bitcoin bet. The longer you stay in the cryptocurrency game before cashing out, the higher the Bitcoin multiplier gets. But beware! If you don\'t cash out before the crash, you lose your Bitcoin bet in this exciting crypto gambling experience.'
            ],
            [
                'question' => 'How do I play the Bitcoin crash game at HustleBTC?',
                'answer' => 'To start playing our Bitcoin casino games, you need a positive balance by depositing Bitcoin to your crypto gambling account or receiving Bitcoin tips from the HustleBTC community. Watch the cryptocurrency multiplier increase from 1x upwards in our provably fair Bitcoin crash game! You can cash out your Bitcoin bet before your set cash-out limit by pressing the \'Cash Out\' button. Get your Bitcoin bet multiplied by the current multiplier in our crypto casino. Be careful because our Bitcoin gambling game can crash at any time, and you\'ll lose your cryptocurrency bet! This makes HustleBTC one of the most exciting Bitcoin casinos for crypto gambling enthusiasts.'
            ],
            // ...add more FAQ items as needed...
        ];
        return view('pages.faq', [
            'faqTitle' => $faqTitle,
            'faqs' => $faqs,
        ]);
    }
}
