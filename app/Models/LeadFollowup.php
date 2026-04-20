<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadFollowup extends Model
{
    protected $fillable = [
        'lead_id',
        'user_id',
        'action_type',
        'status',
        'note',
        'next_followup_date',
        'reminder_sent'
    ];

    // relation: followup belongs to lead
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    // relation: followup belongs to user (sales executive)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}