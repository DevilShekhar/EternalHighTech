<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'services',
        'business_name',
        'message',
        'goal',
        'budget',
        'ip_address',
        'city',
        'state',
        'country',
        'zipcode',
        'latitude',
        'longitude',
        'current_user_index',
        'notified_at',
        'status',
    ];

    /**
     * Relation: Lead belongs to a User (Sales Person)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function followups()
    {
        return $this->hasMany(LeadFollowup::class);
    }
}