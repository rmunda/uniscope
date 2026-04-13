<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// #[Fillable(['name', 'is_active'])]
class AcademicSession extends Model
{
    /** @use HasFactory<\Database\Factories\AcademicSessionFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     protected $fillable = ['session_name', 'is_active'];
}
