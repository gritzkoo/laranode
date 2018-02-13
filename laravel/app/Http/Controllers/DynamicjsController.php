<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DynamicjsController extends Controller
{
    public function base()
    {
        $content = view('dynamicjs.base');
        return response($content,200,[
            'Content-Type'=>'application/x-javascript;charset=UTF-8'
        ]);
    }
}
