<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAcademicSessionRequest;
use App\Http\Requests\UpdateAcademicSessionRequest;
use App\Models\Admin\AcademicSession;
//
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB; // ADD THIS LINE

class AcademicSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // 1. Fetch the query
            $data = AcademicSession::select(['id', 'session_name', 'is_active']);

            // 2. Initialize Yajra Datatables
            return DataTables::of($data)
                ->addIndexColumn() // Generates the '#' column automatically
                ->addColumn('action', function ($row) {
                    // 1. Generate URLs here using your named routes
                    $deleteUrl = route('admin.academic.sessions.destroy', $row->id);

                    $btn = '<div class="btn-list flex-nowrap justify-content-end">';

                    // 2. Embed into the Edit Button (using href if it's a link, or data-url for AJAX)
                    // Delete Button
                    $btn .= '<button class="btn btn-outline-danger d-flex align-items-center gap-1 delete-session" data-id="'.$row->id.'" data-url="'.$deleteUrl.'">
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
    public function store(StoreAcademicSessionRequest $request)
    {
        try {
            $session = AcademicSession::create([
                'session_name' => $request->session_name,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'New academic session created successfully',
                'data' => $session,
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to add session', [
                'session_name' => $requets->session_name,
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Failed to add session',
                'error' => app()->isProduction() ? null : $e->getMessage(),
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicSession $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicSession $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAcademicSessionRequest $request, AcademicSession $session)
    {
        try {
            DB::transaction(function () use ($session) {
                $affected = AcademicSession::query()->update(['is_active' => false]);
                // \Log::info('Deactivated rows: ' . $affected);
                $result = $session->update(['is_active' => true]);
                // \Log::info('Activated result: ' . $result);
                // \Log::info('Session ID: ' . $session->id);
            });

            return response()->json([
                'message' => 'Session activated successfully!',
            ]);

        } catch (\Exception $e) {
            \log::error('Failed to activate session', [
                'session_id' => $session->id]);

            return response()->json([
                'message' => 'Failed to activate session.',
                'error' => app()->isProduction() ? null : $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicSession $session)
    {
        try {
            // Safety: prevent deleting active session
            if ($session->is_active) {
                return response()->json([
                    'message' => 'Cannot delete active session'
                ], 400);
            }

            // Extra safety: ensure model actually exists
            if (!$session->exists) {
                return response()->json([
                    'message' => 'Session not found'
                ], 404);
            }

            $session->delete();

            return response()->json([
                'message' => 'Session deleted successfully'
            ]);

        } catch (\Exception $e) {

            \Log::error('Failed to delete session', [
                'session_id' => $session->id ?? null,
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Failed to delete session',
                'error' => app()->isProduction() ? null : $e->getMessage(),
            ], 500);
        }
    }
}
