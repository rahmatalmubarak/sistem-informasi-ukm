<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $postingans = Postingan::all();
        return view('landing_page.templates.index', compact([
            'postingans'
        ]));
    }
}
