<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAcademicClassRequest;
use App\Http\Requests\UpdateAcademicClassRequest;
use App\Models\Admin\AcademicClass;

// --- ADD THIS LINE ---
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AcademicClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = AcademicClass::select(['id', 'class_name'])->get();

        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAcademicClassRequest $request)
    {
        try {
            $mClass = AcademicClass::create([
                'class_name' => $request->class_name,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'New class created successfully',
                'data' => $mClass,
            ]);

        } catch (\Exception $e) {
            \Log::error('Failed to add class', [
                'class_name' => $request->class_name,
                'error' => app()->isProduction() ? null : $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Failed to add class',
                'error' => app()->isProduction() ? null : $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicClass $academicClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicClass $academicClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAcademicClassRequest $request, AcademicClass $class)
    {
        try {
            $class->update([
                'class_name' => $request->class_name,
            ]);

            return response()->json([
                'message' => 'Class updated successfully!',
                'data' => $class->fresh(),
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to update class', [
                'class_id' => $class->id,
                'error' => $e->getMessage(),
            ]);

            return response() - json([
                'message' => 'Failed to update class',
                'error' => app()->isProduction() ? null : $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicClass $class)
    {
        try {
            $class->delete();

            return response()->json([
                'message' => 'Class deleted successfully!',
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to delete section', [
                'class_id' => $class->id,
                'error' => $e->getMessage(),
            ]);

            return response() - json([
                'message' => 'Failed to delete class',
                'error' => app()->isProduction() ? null : $e->getMessage(),
            ], 500);
        }
    }
}
