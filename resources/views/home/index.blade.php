@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Button trigger modal -->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        + Tambah Tempat
                    </button>
                    <br><br>

                    <!-- DataTable -->  

                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Tempat</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tempat as $place)
                            <tr>
                                <td><a href="{{ route('articles.index') }}">{{ $place->nama }}</a></td>
                                <td>{{ $place->kategori }}</td>
                                <td>{{ $place->deskripsi }}</td>
                                <td>{{ $place->lat }}</td>
                                <td>{{ $place->lng }}</td>
                                <td>
                                  <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="/home/{{ $place->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger float-right">Hapus</button>
                                  </form>
                                </td>
                            </tr>
                            @empty
                                <td colspan="5">Tidak ada Data</td> 
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama Tempat</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                    </table>

                    {{ __('You are logged in!') }}
                </div>


            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/home/store" method="POST">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama Tempat</label>
                  <input type="text" class="form-control" id="nama" name="nama" aria-describedby="namaHelp">
                  <small id="namaHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="kategori">Kategori</label>
                  <input type="text" class="form-control" id="kategori" name="kategori">
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="lat">Latitude</label>
                  <input type="text" class="form-control" id="lat" name="latitude" aria-describedby="latHelp">
                </div>
                <div class="form-group">
                  <label for="lng">Longitude</label>
                  <input type="text" class="form-control" id="lng" name="longitude" aria-describedby="longHelp">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
<script src="ttps://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

@endsection
