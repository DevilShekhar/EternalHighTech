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
        'business_name',
        'alt_mobile',
        'short_desc',
        'note',
        'next_followup_date',
        'reminder_sent'
    ];
    protected $casts = [
        'next_followup_date' => 'datetime',
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