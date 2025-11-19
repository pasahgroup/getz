<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class victims extends Model
{
    use HasFactory;

      protected $casts = [
          'car_body_type_id',
          'tag_id',
          'car_model_no',
        'images' => 'object',
        'specifications' => 'object',
    ];
}
