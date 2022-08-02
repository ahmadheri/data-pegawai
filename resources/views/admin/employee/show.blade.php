@extends('layouts.app', ['title' => 'Data Pegawai'])

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-shopping-bag"></i> EDIT PEGAWAI</h6>
                </div>

                <div class="card-body">
                          
                  <label>NAMA</label>
                  <p>{{ $employee->name }}</p>
                          
                  <label>NIK</label>
                  <p>{{ $employee->nik }}</p>
                  
                  <label>EMAIL</label>
                  <p>{{ $employee->email }}</p>
                  
                  <label>NO HP</label>
                  <p>{{ $employee->phone }}</p>
                  
                  <label>JENIS KELAMIN</label>
                  <p>{{ $employee->gender }}</p>
                  
                  <label>FOTO</label>
                  <p>{{ $employee->photo }}</p>
                  
                  <label>ALAMAT</label>
                  <p>{{ $employee->address }}</p>
                    
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
