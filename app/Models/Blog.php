<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Blog extends Model
{
    protected $fillable = [
        'heading',
        'sub_heading',
        'heading_image',
        'image',
        'title',
        'company_name',
        'description',
        'tags',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
        'created_by',
        'updated_by',
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