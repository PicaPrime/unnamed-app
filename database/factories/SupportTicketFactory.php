<?php

namespace Database\Factories;

use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupportTicketFactory extends Factory
{
    public function definition(): array
    {
        $statuses = [
            SupportTicket::STATUS_OPEN,
            SupportTicket::STATUS_IN_PROGRESS,
            SupportTicket::STATUS_RESOLVED,
            SupportTicket::STATUS_CLOSED
        ];
        
        $priorities = [
            SupportTicket::PRIORITY_LOW,
            SupportTicket::PRIORITY_MEDIUM,
            SupportTicket::PRIORITY_HIGH,
            SupportTicket::PRIORITY_URGENT
        ];
        
        $status = $this->faker->randomElement($statuses);
        
        return [
            'user_id' => User::factory(),
            'subject' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(3),
            'status' => $status,
            'priority' => $this->faker->randomElement($priorities),
            'resolved_at' => in_array($status, [SupportTicket::STATUS_RESOLVED, SupportTicket::STATUS_CLOSED]) 
                ? $this->faker->dateTimeBetween('-1 month', 'now') 
                : null,
        ];
    }
    
    public function open(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => SupportTicket::STATUS_OPEN,
            'resolved_at' => null,
        ]);
    }
    
    public function inProgress(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => SupportTicket::STATUS_IN_PROGRESS,
            'resolved_at' => null,
        ]);
    }

    public function resolved(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => SupportTicket::STATUS_RESOLVED,
            'resolved_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ]);
    }
    
    public function closed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => SupportTicket::STATUS_CLOSED,
            'resolved_at' => $this->faker->dateTimeBetween('-2 months', '-1 month'),
        ]);
    }
} 