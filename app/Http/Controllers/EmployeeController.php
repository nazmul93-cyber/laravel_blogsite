<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Login;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //

    public function index() {
        // dd(Employee::all());
        // $data = Employee::paginate(15);
        $data = Employee::query()
//            ->search(request('search'))
//            ->select('id', 'name', 'email', 'company_id')
            ->select("employees.*")
//            ->join('companies', 'companies.id', '=', 'employees.company_id')
            ->join('logins', 'logins.employee_id', '=', 'employees.id')
            ->groupBy('employees.id')
            ->orderByRaw('max(logins.created_at) desc')
//            ->orderBy('logins.created_at')
//            ->orderBy('companies.name')
//            ->withLastLoginAt()
            ->withLastLogin()
            ->with('company:id,name')
//            ->orderBy('name')
            ->simplePaginate();
        return view('employee_data', compact('data'));
    }
}
