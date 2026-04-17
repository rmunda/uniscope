<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;

// --- ADD THIS LINE ---
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // 1. Fetch the query
            $data = Section::select(['id', 'section_name']);

            // 2. Initialize Yajra Datatables
            return DataTables::of($data)
                ->addIndexColumn() // Generates the '#' column automatically
                ->addColumn('action', function($row) {
                    // 1. Generate URLs here using your named routes
                    $editUrl = route('admin.academic.sections.update', $row->id);
                    $deleteUrl = route('admin.academic.sections.destroy', $row->id);

                    $btn = '<div class="btn-list flex-nowrap justify-content-end">';
                    // Edit Button
                    $btn .= '<button class="btn btn-outline-success d-flex edit-section" data-id="'.$row->id.'" data-url="'.$editUrl.'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                <span>Edit</span>
                             </button>';

                    // Delete Button
                    $btn .= '<button class="btn btn-outline-danger d-flex delete-section" data-id="'.$row->id.'" data-url="'.$deleteUrl.'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                <span>Delete</span>
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
    public function store(StoreSectionRequest $request)
    {
        try {
            $class = Section::create([
                'section_name' => $request->section_name
            ]);

            return response()->json([
                'success' => true,
                'message' => 'New section created successfully',
                'data' => $class
            ]);
        } catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create section.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {
        // Check if the name is being changed
        if ($request->has('section_name') && $request->section_name !== $section->section_name) {
            // Check if it's already used in the pivot table
            if ($section->classes()->exists()) {
                return response()->json([
                    'message' => 'Cannot rename this section because it is already assigned to classes. Create a new section instead.'
                ], 409);
            }
        }

        // Allow update
        try {
            $section->update([
                'section_name' => $request->section_name,
            ]);

            return response()->json([
                'message' => 'Section updated successfully!',
                'data'    => $section->fresh()
            ]);
        }
        catch (\Exception $e) {
            return response()-json([
                'message' => 'Failed to update section',
                'error' => app()->isProduction() ? null : $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        
        // 1. PROACTIVE CHECK (Recommended)
        // Assuming you have a 'classes()' relationship defined on your Section model.
        // This checks if the section has any entries in the pivot table.
        
        if ($section->classes()->exists()) {
            return response()->json([
                'message' => 'Cannot delete this section because it is currently assigned to one or more classes. Please remove those assignments first.',
            ], 409); // 409 Conflict is the standard HTTP status for this scenario
        }

        try {
            $section->delete();

            return response()->json([
                'message' => 'Section deleted successfully!',
            ]);

        } catch (QueryException $e) {
            // 2. CATCH FOREIGN KEY REJECTION (Fallback)
            // Error code 23000 is the SQL standard code for constraint violations
            if ($e->getCode() === '23503') {
                return response()->json([
                    'message' => 'Cannot delete section due to existing database relationships.',
                ], 409);
            }

            // Handle other database-related exceptions
            Log::error('Database error while deleting section', [
                'section_id' => $section->id,
                'error'      => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'A database error occurred while trying to delete the section.',
                'error'   => app()->isProduction() ? null : $e->getMessage()
            ], 500);

        } catch (\Exception $e) {
            // 3. CATCH GENERAL EXCEPTIONS
            Log::error('Failed to delete section', [
                'section_id' => $section->id,
                'error'      => $e->getMessage(),
            ]);

            return response()->json([ // Note: Fixed the typo `response()-json` from your code here
                'message' => 'Failed to delete section',
                'error'   => app()->isProduction() ? null : $e->getMessage()
            ], 500);
        }
    }
}
