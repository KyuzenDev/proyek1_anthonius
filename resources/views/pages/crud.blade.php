@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'CRUD')
@section('content_header_title', 'Dashboard')
@section('content_header_subtitle', 'CRUD')

{{-- Content body: main page content --}}

@section('content_body')
    @include('_message')
    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addUsersModal">Tambah Data Siswa</button>
    <table class="table table-hover table-dark mt-3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Siswa</th>
                <th>Jurusan </th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            ?>
            @forelse ($getRecord as $data)
                <tr>
                    <td><?= $no++ ?></td>
                    <td>{{ $data->nama_siswa }}</td>
                    <td>{{ $data->jurusan }}</td>
                    <td>{{ $data->jk }}</td>
                    <td>{{ $data->agama }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>
                        <form action="{{ route('admin.delete', $data->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100%">No Record Found.</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    <div>
        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links('pagination::bootstrap-5') !!}
    </div>


    <div class="modal fade" tabindex="-1" id="addUsersModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Siswa</h5>
                </div>
                <form action="{{ url('admin/addUsers') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="nama_siswa" class="form-label">Nama Siswa</label>
                            <input name="nama_siswa" type="text" class="form-control" id="nama_siswa"
                                placeholder="Nama Siswa" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input name="jurusan" type="text" class="form-control" id="jurusan" placeholder="Jurusan"
                                autocomplete="off" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jeniskelamin">Jenis kelamin</label>
                            <div class="input-group custom-go-button">
                                <div class="form-select-list">
                                    <select class="form-control custom-select-value" name="jk" id="jeniskelamin"
                                        required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="agama">Agama</label>
                            <div class="input-group custom-go-button">
                                <div class="form-select-list">
                                    <select class="form-control custom-select-value" id="agama" name="agama" required>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Khonghucu">Khonghucu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" name="alamat" id="alamat" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
        console.log("Success!");
    </script>
@endpush
