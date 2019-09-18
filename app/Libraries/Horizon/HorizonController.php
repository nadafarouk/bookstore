<?php

namespace App\Libraries\Horizon;

use Illuminate\Http\Request;
use Laravel\Horizon\Horizon;
use App\Http\Controllers\Controller;

class HorizonController extends Controller
{
    public function index(Request $req)
    {
        return view('horizon.main', [
            'cssFile' => Horizon::$useDarkTheme ? 'app-dark.css' : 'app.css',
            'horizonScriptVariables' => Horizon::scriptVariables(),
        ]);
    }
}
