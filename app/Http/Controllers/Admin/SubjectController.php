<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

// --- ADD THIS LINE ---
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // 1. Fetch the query
            $data = Subject::select(['id', 'subject_name']);

            // 2. Initialize Yajra Datatables
            return DataTables::of($data)
                ->addIndexColumn() // Generates the '#' column automatically
                ->addColumn('action', function ($row) {
                    // 1. Generate URLs here using your named routes
                    $editUrl = route('admin.academic.subjects.update', $row->id);
                    $deleteUrl = route('admin.academic.subjects.destroy', $row->id);

                    $btn = '<div class="btn-list flex-nowrap justify-content-end">';

                    // 2. Embed into the Edit Button (using href if it's a link, or data-url for AJAX)
                    // Edit Button
                    $btn .= '<button class="btn btn-outline-success btn-xxs btn-icon edit-subject" data-id="'.$row->id.'" data-url="'.$editUrl.'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                             </button>';

                    // Delete Button
                    $btn .= '<button class="btn btn-outline-danger btn-xxs btn-icon delete-subject" data-id="'.$row->id.'" data-url="'.$deleteUrl.'">
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
    public function store(StoreSubjectRequest $request)
    {
        try {
            $subject = Subject::create([
                'subject_name' => $request->subject_name
            ]);

            return response()->json([
                'success' => true,
                'message' => 'New subject created successfully',
                'data' => $subject
            ]);
        } catch (\Exception $e){
            \Log::error('Failed to add subject', [
                'subject_name' => $request->subject_name,
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add subject.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        try {
            $subject->update([
                'subject_name' => $request->subject_name,
            ]);

            return response()->json([
                'message' => 'Subject updated successfully!',
                'data'    => $subject->fresh()
            ]);
        }
        catch (\Exception $e) {
            return response()-json([
                'message' => 'Failed to update subject',
                'error' => app()->isProduction() ? null : $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();

            return response()->json([
                'message' => 'Subject deleted successfully!',
            ]);
        }
        catch (\Exception $e) {
             \Log::error('Failed to delete subject', [
                'subject_id' => $subject->id,
                'error'      => $e->getMessage(),
            ]);

            return response()-json([
                'message' => 'Failed to update subject',
                'error' => app()->isProduction() ? null : $e->getMessage()
            ], 500);
        }
    }
}
