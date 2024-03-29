<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Imports\CustomerImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function importExcelData(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new CustomerImport, $request->file('import_file'));


        return redirect()->back()->with('status', 'Insert Record successfully.');
    }
}
