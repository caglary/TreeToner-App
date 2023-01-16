<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
class WelcomeController extends Controller
{
    public function __invoke()
    {
        $musteries=Musteri::all();
        return view('treetoner.index',compact('musteries'));
    }
}
