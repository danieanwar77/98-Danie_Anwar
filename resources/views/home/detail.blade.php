@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-9">{{ __('Dashboard') }}</div>
                        <div class="col-3"><button type="button" class="btn btn-warning float-right" onclick="enableEdit()">Edit</button></div>
                    </div>
                </div>
                <di class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- DataTable -->  

                    <form action="/home/{{ $detail->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="nama">Nama Tempat</label>
                          <input type="text" class="form-control" id="nama" name="nama" aria-describedby="namaHelp" value="{{ $detail->nama }}" disabled>
                          <small id="namaHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="kategori">Kategori</label>
                          <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $detail->kategori }}" disabled>
                        </div>
                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" disabled>{{ $detail->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="lat">Latitude</label>
                          <input type="text" class="form-control" id="lat" name="latitude" value="{{ $detail->lat }}" disabled>
                        </div>
                        <div class="form-group">
                          <label for="lng">Longitude</label>
                          <input type="text" class="form-control" id="lng" name="longitude" value="{{ $detail->lng }}" disabled>
                        </div>
                        <div class="modal-footer">
                          <button id="submit" type="submit" class="btn btn-primary" disabled>Submit</button>
                        </div>
                      </form>
                </div>


            </div>
        </div>
    </div>
</div>
<script>

    function enableEdit(){

        var status = document.getElementById("nama");
        if(status.disabled){
            $('input').attr('disabled', false);
            $('textarea').attr('disabled', false);
            $('#submit').attr('disabled', false);
        } else {
            $('input').attr('disabled', true);
            $('textarea').attr('disabled', true);
            $('#submit').attr('disabled', true);
        }

    }
</script>

@endsection