<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserImportController extends Controller
{
    public function index()
    {
        return view('imports.index');
    }

    public function import(Request $request)
    {
        $data = Excel::toArray(new UsersImport, $request->file('file') );
//    dd($data);
        return view('imports.table', [
            'users' => $data
        ]);
    }
}
