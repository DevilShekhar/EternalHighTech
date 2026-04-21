<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'user_id',
        'action',
    ];

    /**
     * Relationship: LeadLog belongs to Lead
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    /**
     * Relationship: LeadLog belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Optional helper (clean usage)
     */
    public static function log($leadId, $userId, $action)
    {
        return self::create([
            'lead_id' => $leadId,
            'user_id' => $userId,
            'action'  => $action,
        ]);
    }
}