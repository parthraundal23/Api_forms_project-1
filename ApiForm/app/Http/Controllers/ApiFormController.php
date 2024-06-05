<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiForm;

class ApiFormController extends Controller
{
    //
    public function create()
    {
        return view('api_form.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'api_access_type' => 'required|array',
            'api_method_permission' => 'required|array',
            'api_ip_whitelist' => 'required|string',
        ]);

        ApiForm::create([
            'name' => $validated['name'],
            'api_access_type' => json_encode($validated['api_access_type']),
            'api_method_permission' => json_encode($validated['api_method_permission']),
            'api_ip_whitelist' => $validated['api_ip_whitelist'],
        ]);

        return redirect()->back()->with('success', 'Form submitted successfully');
    }

}
