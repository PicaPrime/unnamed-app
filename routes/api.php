<?php

use App\Http\Controllers\API\SupportTicketController;
use App\Http\Controllers\API\TicketCommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('tickets')->group(function () {
        Route::get('/', [SupportTicketController::class, 'index']);
        Route::post('/', [SupportTicketController::class, 'store']);
        Route::get('/{supportTicket}', [SupportTicketController::class, 'show']);
        Route::patch('/{supportTicket}/status', [SupportTicketController::class, 'updateStatus']);
        Route::patch('/{supportTicket}/priority', [SupportTicketController::class, 'updatePriority']);
        Route::get('/{supportTicket}/comments', [TicketCommentController::class, 'index']);
        Route::post('/{supportTicket}/comments', [TicketCommentController::class, 'store']);
    });
    
    Route::delete('/comments/{ticketComment}', [TicketCommentController::class, 'destroy']);
    Route::get('/admin/tickets', [SupportTicketController::class, 'getAllTickets']);
}); 