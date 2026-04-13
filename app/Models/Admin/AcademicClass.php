<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{
    /** @use HasFactory<\Database\Factories\AcademicClassFactory> */
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     protected $fillable = ['class_name', 'is_active'];

}
