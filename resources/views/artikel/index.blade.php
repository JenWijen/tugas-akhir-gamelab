@extends('adminlte.layouts.app')
@section('addCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('addJavascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $("#data-table").DataTable();
    })
</script>
@endsection

 @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Artikel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Artikel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
         <div class="container-fluid">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{ route('createArtikel') }}" class="btn btn-primary" role="button">Tambah Artikel</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Gambar</th>
                                <th>Nama Kategori</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikels as $artikel)
                            <tr>
                                <td> {{ $loop->index + 1}} </td>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/artikels/' . $artikel->gambar) }}" class="rounded" style="width: 50px">
                                </td>
                                <td>{{ $artikel->kategori ? $artikel->kategori->deskripsi : '-'}}
                                </td>
                                <td>{{ $artikel->judul}}</td>
                                <td>{!! $artikel->deskripsi !!}</td>
                                <td class="text-center">
                                    <a href="{{ route('editArtikel', ['id' => $artikel->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a>
                                    {{-- <a href="{{ route('deleteArtikel', ['id' => $artikel->id]) }}" class="btn btn-danger btn-sm" role="button">Hapus</a> --}}
                                    <a onclick="confirmDelete(this)"
                                        data-url="{{ route('deleteArtikel', ['id' => $artikel->id]) }}" 
                                        class="btn btn-danger btn-sm" role="button">Hapus
                                    </a>
                                </td>
                            </tr>
                            {{-- @empty
                                <div class="alert alert-danger">Data artikel belum tersedia</div>    
                            @endempty --}}
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
         </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
     
@endsection