<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicSession;
use App\Http\Requests\StoreAcademicSessionRequest;
use App\Http\Requests\UpdateAcademicSessionRequest;
//
use Illuminate\Support\Facades\DB; // <--- ADD THIS LINE

class AcademicSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = AcademicSession::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $sessions
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
    public function store(StoreAcademicSessionRequest $request)
    {
        $session = AcademicSession::create([
            'name' => $request->name
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New academic session created successfully',
            'data' => $session
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicSession $academicSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicSession $academicSession)
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
                \Log::info('Deactivated rows: ' . $affected);
                $result = $session->update(['is_active' => true]);
                \Log::info('Activated result: ' . $result);
                \Log::info('Session ID: ' . $session->id);
            });

            return response()->json([
                'message' => 'Session activated successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to activate session.',
                'error'   => $e->getMessage()   // remove this line in production
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicSession $academicSession)
    {
        //
    }
}
