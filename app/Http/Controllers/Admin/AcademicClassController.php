<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicClass;
use App\Http\Requests\StoreAcademicClassRequest;
use App\Http\Requests\UpdateAcademicClassRequest;

class AcademicClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $class = AcademicClass::create([
            'class_name' => $request->class_name
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New class created successfully',
            'data' => $class
        ]);
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
    public function update(UpdateAcademicClassRequest $request, AcademicClass $academicClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicClass $academicClass)
    {
        //
    }
}
