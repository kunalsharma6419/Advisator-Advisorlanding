<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\AllDataImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importform()
    {
        return view('admin.pages.alldataimport');
    }
    public function importData(Request $request)
    {
        $request->validate([
            'data_file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('data_file');
        Excel::import(new AllDataImport, $file);

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}
