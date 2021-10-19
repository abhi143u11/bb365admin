<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function setting()
    {
        $settings = Settings::all();

        if ($settings->count() > 0) {
            return response()->json($settings, 200);
        } else {
            return response()->json(['error' => true, 'Message' => "No Settings found"], 200);
        }
    }
}
