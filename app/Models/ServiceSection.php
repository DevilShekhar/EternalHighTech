<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    protected $fillable = [
        'service_id',
        'section_no',
        'heading',
        'sub_heading',
        'image',
        'description',
    ];
}