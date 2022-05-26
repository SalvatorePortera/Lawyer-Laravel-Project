<?php

namespace Modules\ClientLogin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Config;

class ClientLoginController extends Controller
{
    public function settings()
    {
        return view('clientlogin::settings');
    }

    public function post_settings(Request $request)
    {
            $ClientLogin = $request->ClientLogin ? 1 : 0;

            $settings = Config::where('key', 'ClientLogin')->first();
            $settings->value = $ClientLogin;
            $settings->save();

            return response()->json(['message' => __('client.Client login setting updated successfully'), 'goto' => route('client.settings') ]);

    }
}
