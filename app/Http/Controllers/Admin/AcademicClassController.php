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
        if ($request->ajax()) {
            // 1. Fetch the query
            $data = AcademicClass::select(['id', 'class_name']);

            // 2. Initialize Yajra Datatables
            return DataTables::of($data)
                ->addIndexColumn() // Generates the '#' column automatically
                ->addColumn('action', function ($row) {
                    // 1. Generate URLs here using your named routes
                    $editUrl = route('admin.academic.classes.update', $row->id);
                    $deleteUrl = route('admin.academic.classes.destroy', $row->id);

                    $btn = '<div class="btn-list flex-nowrap justify-content-end">';

                    // 2. Embed into the Edit Button (using href if it's a link, or data-url for AJAX)
                    // Edit Button
                    $btn .= '<button class="btn btn-outline-success btn-xxs btn-icon edit-class" data-id="'.$row->id.'" data-url="'.$editUrl.'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                             </button>';

                    // Delete Button
                    $btn .= '<button class="btn btn-outline-danger btn-xxs btn-icon delete-class" data-id="'.$row->id.'" data-url="'.$deleteUrl.'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                             </button>';

                    $btn .= '</div>';

                    return $btn;
                })
                ->rawColumns(['action']) // Essential to render the HTML buttons
                ->filterColumn('DT_RowIndex', function($query, $keyword) {
                    // Keep this empty. It prevents SQL from looking for "academic_sessions.DT_RowIndex"
                })
                ->make(true);
        }

        // Return the initial view for non-AJAX requests
        return view('admin.academic.settings');
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
                'error' => $e->getMessage(),
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
