<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\GetAcademicSettings;

class AcademicSettingsController extends Controller
{
    /**
     * The controller is now just a bridge.
     */
    public function __invoke(Request $request, GetAcademicSettings $action)
    {
        // We delegate the "Heavy Lifting" to our Action class
        //$data = $action->execute(auth()->id()); // When passing arguments
        $data = $action->execute();

        // We return the response to the user
        return view('admin.academic.settings', $data);
    }
}
