<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//
use App\Models\Admin\Section;

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

    // Relationship 
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'class_sections', 'class_id', 'section_id');
    }
}
