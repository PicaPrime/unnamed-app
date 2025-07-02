<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SupportTicketController extends Controller
{
    public function index(): JsonResponse
    {
        $tickets = Auth::user()->supportTickets()->latest()->get();
        
        return response()->json([
            'success' => true,
            'data' => $tickets
        ]);
    }
    
    public function getAllTickets(): JsonResponse
    {
        
        $tickets = SupportTicket::with('user')->latest()->get();
        
        return response()->json([
            'success' => true,
            'data' => $tickets
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:' . implode(',', [
                SupportTicket::PRIORITY_LOW,
                SupportTicket::PRIORITY_MEDIUM,
                SupportTicket::PRIORITY_HIGH,
                SupportTicket::PRIORITY_URGENT
            ])
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        $ticket = Auth::user()->supportTickets()->create([
            'subject' => $request->subject,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => SupportTicket::STATUS_OPEN
        ]);
        
        return response()->json([
            'success' => true,
            'data' => $ticket
        ], 201);
    }

    public function show(SupportTicket $supportTicket): JsonResponse
    {
        if (Auth::id() !== $supportTicket->user_id) {
        }
        
        $supportTicket->load(['user', 'comments.user']);
        
        return response()->json([
            'success' => true,
            'data' => $supportTicket
        ]);
    }
    
    public function updateStatus(Request $request, SupportTicket $supportTicket): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:' . implode(',', [
                SupportTicket::STATUS_OPEN,
                SupportTicket::STATUS_IN_PROGRESS,
                SupportTicket::STATUS_RESOLVED,
                SupportTicket::STATUS_CLOSED
            ])
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        if ($request->status === SupportTicket::STATUS_RESOLVED && $supportTicket->status !== SupportTicket::STATUS_RESOLVED) {
            $supportTicket->resolved_at = now();
        }
        
        $supportTicket->status = $request->status;
        $supportTicket->save();
        
        return response()->json([
            'success' => true,
            'data' => $supportTicket
        ]);
    }
    
    public function updatePriority(Request $request, SupportTicket $supportTicket): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'priority' => 'required|in:' . implode(',', [
                SupportTicket::PRIORITY_LOW,
                SupportTicket::PRIORITY_MEDIUM,
                SupportTicket::PRIORITY_HIGH,
                SupportTicket::PRIORITY_URGENT
            ])
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        $supportTicket->priority = $request->priority;
        $supportTicket->save();
        
        return response()->json([
            'success' => true,
            'data' => $supportTicket
        ]);
    }
} 