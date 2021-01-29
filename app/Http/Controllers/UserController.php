<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Exports\UserExportQuery;
use App\Exports\UserMultiSheetExport;
use App\User;
use Carbon\Carbon;
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
        if ($request->fromDate) {
            $toDate = $request->toDate ?? Carbon::now()->toDateString();

            return Excel::download(new UserExportQuery($request->fromDate, $toDate), 'users.' . $type);
        }

        return Excel::download(new UserExport, 'users.' . $type);
    }

    public function exportPerMonth()
    {
        $year = 2020;
        return Excel::download(new UserMultiSheetExport($year), 'users_per_month.xlsx');
    }
}
