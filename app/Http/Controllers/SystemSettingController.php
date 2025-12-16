<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use App\Models\User;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    /**
     * Display a listing of system settings
     */
    public function index()
    {
        $settings = SystemSetting::with('modifiedByUser')->paginate(15);
        return view('system_settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new setting
     */
    public function create()
    {
        $users = User::all();
        return view('system_settings.create', compact('users'));
    }

    /**
     * Store a newly created setting in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'setting_type' => 'required|unique:system_settings|max:255',
            'setting_value' => 'nullable|max:1000',
            'modified_by' => 'nullable|exists:users,user_id',
        ]);

        $validated['modified_date'] = now();
        $setting = SystemSetting::create($validated);

        return redirect()->route('system-settings.show', $setting->setting_id)
                        ->with('success', 'System setting created successfully!');
    }

    /**
     * Display the specified setting
     */
    public function show(SystemSetting $systemSetting)
    {
        return view('system_settings.show', ['systemSetting' => $systemSetting->load('modifiedByUser')]);
    }

    /**
     * Show the form for editing the specified setting
     */
    public function edit(SystemSetting $systemSetting)
    {
        $users = User::all();
        return view('system_settings.edit', compact('systemSetting', 'users'));
    }

    /**
     * Update the specified setting in storage
     */
    public function update(Request $request, SystemSetting $systemSetting)
    {
        $validated = $request->validate([
            'setting_type' => 'required|unique:system_settings,setting_type,' . $systemSetting->setting_id . ',setting_id|max:255',
            'setting_value' => 'nullable|max:1000',
            'modified_by' => 'nullable|exists:users,user_id',
        ]);

        $validated['modified_date'] = now();
        $systemSetting->update($validated);

        return redirect()->route('system-settings.show', $systemSetting->setting_id)
                        ->with('success', 'System setting updated successfully!');
    }

    /**
     * Remove the specified setting from storage
     */
    public function destroy(SystemSetting $systemSetting)
    {
        $systemSetting->delete();

        return redirect()->route('system-settings.index')
                        ->with('success', 'System setting deleted successfully!');
    }
}
