<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RestController extends Controller
{
    public function intercept(Request $request)
    {
        
        $tmp = $request->all();
        $t = $tmp['Request'];
        $Service = $t['Service'];
        $Method = $t['Method'];
        $Params = $t['Params'];

        return $this->_callService($Service,$Method,$Params);
    }
}
