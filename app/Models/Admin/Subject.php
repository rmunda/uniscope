<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\Admin\SubjectFactory> */
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     protected $fillable = ['subject_name', 'is_active'];
}
