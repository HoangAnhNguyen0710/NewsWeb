<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getUser(Request $request) {
        return [['name'=>'hoanh', 'age'=>21], ['name'=>'long', 'age'=>30]];
    }
}
