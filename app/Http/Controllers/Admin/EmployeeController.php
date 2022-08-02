<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Tampilkan data pegawai
     */ 
    public function index()
    {
        $employees = Employee::latest()->when(request()->q, function($employees) {
          $employees = $employees->where('name', 'like', '%'. request()->q . '%');
      })->paginate(10);

        return view('admin.employee.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function show($id)
    {
      $employee = Employee::findOrFail($id);

      return view('admin.employee.show', compact('employee'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'nik' => 'required',
          'name' => 'required',
          'email' => 'required',
          'phone' => 'required',
          'gender' => 'required',
          'photo' => 'required',
          'address' => 'required',
        ]);

        $photo = $request->file('photo');
        $photo->storeAs('public/employees', $photo->hashName());

        $employee = Employee::create([
          'nik' => $request->nik,
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'gender' => $request->gender,
          'photo' => $photo->hashName(),
          'address' => $request->address,
        ]);

        if($employee){
          //redirect dengan pesan sukses
          return redirect()->route('admin.employee.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
          //redirect dengan pesan error
          return redirect()->route('admin.employee.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit($id)
    {
      $employee = Employee::findOrFail($id);
      return view('admin.employee.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
      $this->validate($request, [
        'nik' => 'required',
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'gender' => 'required',
        // 'photo' => 'required',
        'address' => 'required',
      ]);

      if($request->file('photo') == '') {

        $employee = Employee::findOrFail($employee->id);
        $employee->update([
          'nik' => $request->nik,
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'gender' => $request->gender,
          'address' => $request->address,
        ]);

      } else {

        Storage::disk('local')->delete('public/employees/'.basename($employee->photo));

        $photo = $request->file('photo');
        $photo->storeAs('public/employees', $photo->hashName());

        $employee = Employee::findOrFail($employee->id);
        $employee->update([
          'nik' => $request->nik,
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'gender' => $request->gender,
          'photo' => $photo->hashName(),
          'address' => $request->address,
        ]);
      }

      if($employee){
        //redirect dengan pesan sukses
        return redirect()->route('admin.employee.index')->with(['success' => 'Data Berhasil Diupdate!']);
      }else{
        //redirect dengan pesan error
        return redirect()->route('admin.employee.index')->with(['error' => 'Data Gagal Diupdate!']);
      }

    }

    public function destroy($id)
    {
      $employee = Employee::findOrFail($id);
      $photo = Storage::disk('local')->delete('public/employees/'.basename($employee->photo));
      $employee->delete();

      if($employee){
        return response()->json([
          'status' => 'success'
        ]);
      } else {
        return response()->json([
          'status' => 'error'
        ]);
      }
    }

    
}
