<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    Protected $table = 'class_sections';

    protected $fillable = [
        'class_id',
        'section_id',
    ];

    public $timestamps = true;
}
