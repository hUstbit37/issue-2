<?php

namespace App\Http\Controllers;

use App\Exports\helper\Export;
use App\Exports\UserExport;
use App\Exports\UserExportQuery;
use App\Exports\UserMultiSheetExport;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('exports.users.index', compact('users'));
    }

    public function export(Request $request)
    {
        $type = 'xlsx';
        if ($request->from && $request->to) {
            return Excel::download(new UserExportQuery($request->from, $request->to), 'users.'.$type);
        }
        return Excel::download(new UserExport, 'users.'.$type);
    }

    public function exportPerMonth()
    {
        return Excel::download(new UserMultiSheetExport(2020), 'users.xlsx');
    }
}
