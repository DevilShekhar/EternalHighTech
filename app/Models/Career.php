<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Career extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'location',
        'experience',
        'industry',
        'description',
        'created_by',
        'updated_by',
        'job_type',
        'image',
        'status',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}