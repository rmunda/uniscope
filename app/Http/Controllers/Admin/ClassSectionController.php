<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClassSection;
use Illuminate\Http\Request;

// --- ADD THIS LINE ---
use App\Http\Requests\AssignSectionRequest;
use Yajra\DataTables\Facades\DataTables;
use App\models\Admin\AcademicClass;
use Illuminate\Support\Facades\DB;

class ClassSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // 1. Fetch the query
            // $data = AcademicClass::select(['id', 'class_name']); // Single table example

            // Using join
            $data = DB::table('academic_classes')
            ->leftJoin('class_sections', 'academic_classes.id', '=', 'class_sections.class_id')
            ->leftJoin('sections', 'class_sections.section_id', '=', 'sections.id')
            ->select(
                'academic_classes.id',
                'academic_classes.class_name',

                DB::raw('STRING_AGG(sections.id::text, \',\') as section_ids'),
                DB::raw('STRING_AGG(sections.section_name, \',\') as section_names'),

                DB::raw('COUNT(class_sections.section_id) as section_count')
            )
            ->groupBy('academic_classes.id', 'academic_classes.class_name');

            // ADD HERE
            /*
            --- Debug techinique AJAX ---
        `    \DB::listen(function ($query) {
                \Log::info('SQL:', [$query->sql]);
            });

            return DataTables::of($data)->make(true);

            --- Debug technique ---            
            \DB::enableQueryLog();

            $data->get(); // force execution

            dd(\DB::getQueryLog()); //  THIS WILL STOP RESPONSE

            // This won't run while debugging
            return DataTables::of($data)->make(true);`
            */

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
                    $btn .= '<button class="btn btn-outline-success d-flex align-items-center edit-class" data-id="'.$row->id.'" data-url="'.$editUrl.'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                <span>Edit</span>
                             </button>';

                    // Delete Button
                    $btn .= '<button class="btn btn-outline-danger d-flex align-items-center delete-class" data-id="'.$row->id.'" data-url="'.$deleteUrl.'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                <span>Delete</span>
                             </button>';

                    $btn .= '</div>';

                    return $btn;
                })
                ->addColumn('section_names', function ($row) {
                    $deleteUrl = route('admin.academic.class-sections.destroy', $row->id);

                    if (!$row->section_names) {
                        return '<span class="text-muted">No sections</span>';
                    }

                    $names = explode(',', $row->section_names);
                    $ids   = explode(',', $row->section_ids);

                    $html = '<div class="d-flex flex-wrap gap-1">';

                    foreach ($names as $i => $name) {
                        $html .= '
                            <span class="badge bg-primary-lt d-flex align-items-center">
                                '.$name.'
                                <button 
                                    class="delete-class-section btn btn-sm p-0 ms-1 text-danger d-flex align-items-center justify-content-center bg-transparent border-0"
                                    data-class="'.$row->id.'"
                                    data-section="'.$ids[$i].'"
                                    data-url="'.$deleteUrl.'"
                                ><svg xmlns="http://www.w3.org/2000/svg" style="width:20px;height:20px" viewBox="0 0 24 24" fill="#212121" class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-x"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" fill="#aaa4a4" /></svg>
                                </button>
                            </span>
                        ';
                    }

                    $html .= '</div>';

                    return $html;
                })
                ->addColumn('section_count', function ($row) {
                    return '<span class="badge bg-primary-lt">' . ($row->section_count ?? 0) . '</span>';
                })
                ->rawColumns(['action', 'section_names','section_count']) // Essential to render the HTML buttons
                ->filterColumn('DT_RowIndex', function($query, $keyword) {
                    // Keep this empty. It prevents SQL from looking for "academic_sessions.DT_RowIndex"
                })
                ->make(true);
        }

        // Return the initial view for non-AJAX requests
        return view('admin.academic.settings');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssignSectionRequest $request)
    {
        try {
            // Prevent duplicate assignment
            $exists = DB::table('class_sections')
                ->where('class_id', $request->class_id)
                ->where('section_id', $request->section_id)
                ->exists();

            if ($exists) {
                return response()->json([
                    'success' => false,
                    'message' => 'This section is already assigned to the class.'
                ], 422);
            }

            DB::table('class_sections')->insert([
                'class_id'   => $request->class_id,
                'section_id' => $request->section_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'message' => 'Section assigned successfully.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong.',
                'error' => app()->isProduction() ? null :$e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $classId)
    {
        \Log::info($request->all());
        // dd($request->all());
        $request->validate([
            'section_id' => ['required', 'exists:sections,id'],
        ]);

        try {
            $class = \App\Models\Admin\AcademicClass::findOrFail($classId);

            // Detach only removes mapping (pivot row)
            $class->sections()->detach($request->section_id);

            return response()->json([
                'message' => 'Section removed from class successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to remove section',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
