@extends('layouts.app', ['title' => 'Pegawai'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-users"></i> DATA PEGAWAI</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.employee.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a href="{{ route('admin.employee.create') }}" class="btn btn-primary btn-sm"
                                    style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                </div>
                                <input type="text" class="form-control" name="q"
                                    placeholder="cari berdasarkan nama pegawai">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                    <th scope="col">NAMA PEGAWAI</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($employees as $no => $employee)
                                <tr>
                                    <th scope="row" style="text-align: center">
                                        {{ ++$no + ($employees->currentPage()-1) * $employees->perPage() }}</th>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->nik }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td class="text-center">
                                    <a href="{{ route('admin.employee.edit', $employee->id) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>

                                    <a href="{{ route('admin.employee.show', $employee->id) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <button onClick="Delete(this.id)" class="btn btn-sm btn-danger"
                                        id="{{ $employee->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                                </tr>

                                @empty

                                    <div class="alert alert-danger">
                                        Data Belum Tersedia!
                                    </div>

                                @endforelse
                            </tbody>
                        </table>
                        <div style="text-align: center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script>
function Delete(id) {
    var id = id;
    var token = $("meta[name='csrf-token']").attr("content");

    swal({
        title: "APAKAH KAMU YAKIN ?",
        text: "INGIN MENGHAPUS DATA INI!",
        icon: "warning",
        buttons: [
            'TIDAK',
            'YA'
        ],
        dangerMode: true,
    }).then(function (isConfirm) {
        if (isConfirm) {

            //ajax delete
            jQuery.ajax({
                url: "/employee/" + id,
                data: {
                    "id": id,
                    "_token": token
                },
                type: 'DELETE',
                success: function (response) {
                    if (response.status == "success") {
                        swal({
                            title: 'BERHASIL!',
                            text: 'DATA BERHASIL DIHAPUS!',
                            icon: 'success',
                            timer: 1000,
                            showConfirmButton: false,
                            showCancelButton: false,
                            buttons: false,
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        swal({
                            title: 'GAGAL!',
                            text: 'DATA GAGAL DIHAPUS!',
                            icon: 'error',
                            timer: 1000,
                            showConfirmButton: false,
                            showCancelButton: false,
                            buttons: false,
                        }).then(function () {
                            location.reload();
                        });
                    }
                }
            });

        } else {
            return true;
        }
    })
}
</script>

@endsection