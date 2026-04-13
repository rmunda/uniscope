<?php

namespace App\Actions;

use App\Models\Admin\AcademicSession;
// use App\Models\SchoolClass;
// use App\Models\Teacher;
// use App\Models\Course;

class GetAcademicSettings
{
    public function execute(): array
    {
        // Fetch latest session
        //$latestSession = AcademicSession::latest()->first();

        // Fetch active session
        //$activeSession = AcademicSession::where('is_active', true)->first();

        // Fetch all sessions (for dropdown)
        $sessions = AcademicSession::orderBy('created_at', 'desc')->get();

        // // Fetch other entities (only required fields)
        // $classes = SchoolClass::select('id', 'name')->get();
        // $teachers = Teacher::select('id', 'name')->get();
        // $courses = Course::select('id', 'name')->get();

        return [
            //'latestSession' => $latestSession,
            //'activeSession' => $activeSession,
            'sessions' => $sessions,
            // 'classes' => $classes,
            // 'teachers' => $teachers,
            // 'courses' => $courses,
        ];
    }
}