<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;

// --- ADD THIS LINE ---
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

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
                    // Matching the UI from your screenshot (Green Edit icon)
                    $btn = '<div class="btn-list flex-nowrap justify-content-end">';
                    // Edit Button
                    $btn .= '<button class="btn btn-outline-success btn-xxs btn-icon edit-section" data-id="'.$row->id.'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                             </button>';

                    // Delete Button
                    $btn .= '<button class="btn btn-outline-danger btn-xxs btn-icon delete-section" data-id="'.$row->id.'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                             </button>';

                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action']) // Essential to render the HTML buttons
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
        try {
            $section->delete();

            return response()->json([
                'message' => 'Section deleted successfully!',
            ]);
        } 
        catch (\Exception $e) {
             \Log::error('Failed to delete section', [
                'section_id' => $section->id,
                'error'      => $e->getMessage(),
            ]);

            return response()-json([
                'message' => 'Failed to update section',
                'error' => app()->isProduction() ? null : $e->getMessage()
            ], 500);
        }
    }
}
