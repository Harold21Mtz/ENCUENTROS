<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Throwable;

class ConfigurationController extends Controller
{
    public function index()
    {
        return view('modules-admin.configuration', [
            'configurations' => Configuration::first()
        ]);
    }

    public function update_maintenance(Request $request, $id)
    {
        $request->validate([
            'configuration_maintenance' => 'required|in:1,0'
        ]);
        try {

            Configuration::where('configuration_id', $id)
                ->update([
                    'configuration_maintenance' => $request->configuration_maintenance,
                ]);
            return redirect()->back()->with('status', 'Mantenimiento actualizado');

        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Reintente mas tarde');
        }
    }
}
