<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $variable = 'Hello, World!';

        $variable2 = 'This is another variable!';

        $variable3 = $variable . '' . $variable2;
        $variable4 = sprintf('%s %s', $variable, $variable2);

        //dd($variable, $variable2, $variable3, $variable4);

        return view('home', compact('variable', 'variable2', 'variable3', 'variable4'));
    }
}
