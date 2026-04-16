<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
   protected $fillable = [
    'title',
    'slug',
    'heading',
    'sub_heading',
    'description',
    'results_delivered',
    'link_one',
    'link_two',
    'meta_ads_title',
    'performance_image',
    'feedback_heading',
    'feedback_description',
    'client_name',
    'feedback_image',
    'image',
    'status',
    'meta_title',
    'meta_description',
    'meta_keyword',
];
}