<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todos;

class CalenderController extends Controller
{
    public function stroe(Request $request)
    {
        $date = $request['date'];
        
        return $date;
    }
}
