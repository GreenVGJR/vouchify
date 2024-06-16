<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class mainPage extends Controller
{
    public function main() {
        $path = public_path('json/main.json');
        $exvoucher = file_get_contents($path);
        $jex = json_decode($exvoucher, true);

        return view('main', ['exvoucher' => $jex]);
    }

    public function loadlist(Request $request) {
        $data = $request->input('myData');

        return response()->json(['success' => true, 'history' => $data]);
    }
}
