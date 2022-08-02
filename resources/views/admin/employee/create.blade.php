@extends('layouts.app', ['title' => 'Tambah Pegawai'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-shopping-bag"></i> TAMBAH PRODUK</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>NAMA</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                              value="{{ old('name') }}" placeholder="Nama Pegawai">

                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                              value="{{ old('nik') }}" placeholder="NIK">

                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>EMAIL</label>
                              <input type="email" name="email" value="{{ old('email') }}" placeholder="Input Email"
                                  class="form-control @error('email') is-invalid @enderror">

                              @error('email')
                              <div class="invalid-feedback" style="display: block">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                                <label>NO HP</label>
                                <input type="number" name="phone" value="{{ old('phone') }}" placeholder="Input nomor hp"
                                    class="form-control @error('phone') is-invalid @enderror">

                                @error('phone')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label>JENIS KELAMIN</label>
                          <div class="form-check">
                            <input class="form-check-input" name="gender" value="Laki-laki" type="radio" name="gender" id="Laki-laki">
                            <label class="form-check-label" for="Laki-laki">
                              Laki-laki
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" name="gender" value="Perempuan" type="radio" name="gender" id="Perempuan">
                            <label class="form-check-label" for="Perempuan">
                              Perempuan
                            </label>
                          </div>
                        </div>

                        <div class="form-group">
                            <label>FOTO</label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">

                            @error('photo')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>ALAMAT</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                              value="{{ old('address') }}" placeholder="Masukkan alamat">

                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            SIMPAN</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->
  </div>
@endsection