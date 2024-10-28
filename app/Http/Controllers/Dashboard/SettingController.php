<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingStoreRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('dashboard.settings.index', [
            'setting' => $setting
        ]);
    }

    public function update(SettingStoreRequest $request)
    {
        $setting = Setting::first();
        $setting->mobile = $request->mobile;
        $setting->is_whatsapp_enable = $request->is_whatsapp_enable === "1";
        $setting->save();

        return redirect()->back()->withSuccess("Settings has been updated successfully");
    }
}
