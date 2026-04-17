<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//
use App\Models\Admin\AcademicClass;

class Section extends Model
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     protected $fillable = ['section_name', 'is_active'];

    // Relationship
     public function classes()
    {
        return $this->belongsToMany(AcademicClass::class, 'class_sections', 'section_id', 'class_id');
    }
}
