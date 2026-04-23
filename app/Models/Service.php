<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'category_id',
        'heading',
        'sub_heading',
        'slug',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'created_by',
        'updated_by',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function extraSections()
    {
        return $this->hasMany(ServiceSection::class, 'service_id')->orderBy('section_no', 'asc');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}