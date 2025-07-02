<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Models\TicketComment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TicketCommentController extends Controller
{
    public function index(SupportTicket $supportTicket): JsonResponse
    {
        
        if (Auth::id() !== $supportTicket->user_id) {
        
        }
        
        $comments = $supportTicket->comments()->with('user')->latest()->get();
        
        return response()->json([
            'success' => true,
            'data' => $comments
        ]);
    }
    
    public function store(Request $request, SupportTicket $supportTicket): JsonResponse
    {
        if (Auth::id() !== $supportTicket->user_id) {
        
        }
        
        $validator = Validator::make($request->all(), [
            'content' => 'required|string'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        $comment = $supportTicket->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);    
        $comment->load('user');
        
        return response()->json([
            'success' => true,
            'data' => $comment
        ], 201);
    }
    
    public function destroy(TicketComment $ticketComment): JsonResponse
    {
        if (Auth::id() !== $ticketComment->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'У вас нет прав на удаление этого комментария'
            ], 403);
        }
        
        $ticketComment->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Комментарий успешно удален'
        ]);
    }
} 