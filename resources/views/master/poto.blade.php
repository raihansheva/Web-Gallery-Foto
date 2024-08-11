@extends('layout.main')
@section('content')
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-poto.css">

    <div class="container" style="display: flex;  height: calc(100vh - 72px); padding: 10px; gap: 10px">
        <div class="atas" style=" width: 35%; height: 91.5%;">
            <div class="card" style="width: 100%; height: 100%;">
                <div class="card-body">
                    <p class="judul">Upload gambar</p>
                    <hr>
                    <form action="/tambahpoto3" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="" class="namalabel">Judul Foto :</label>
                        <input class="inputalbum" type="text" name="Judul">
                        <label for="" class="namalabel">Deskripsi Foto :</label>
                        <textarea class="inputalbumtxt" id="" cols="30" rows="10"  name="keterangan"></textarea>
                        <input class="inputalbum" type="text" name="AlbumID" value="{{ $albumid }}" hidden>
                        {{-- <input class="inputalbum" type="text" name="UserID" value="{{ Auth::user()->id }}" hidden> --}}
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02" name="foto" multiple>
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <button class="button" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bawah" style=" width: 65%; height: calc(100% - 50px);">
            <div class="card2"
                style=" width: 100%; height: 100%;border-radius:10px;  background-color: none; overflow: auto;"
                id="style-3">
                <form action="/post" method="POST">
                    @csrf
                    <div class="card-body"
                        style="padding: 10px;  display: flex; flex-wrap: wrap; gap: 20px;">
                        {{-- <label for="" class="namalabel">Judul Foto :</label>
                        <input class="inputalbum" type="text" name="Judul">
                        <label for="" class="namalabel">Deskripsi Foto :</label>
                        <input class="inputalbum" type="text" name="keterangan"> --}}
                        <input class="inputalbum" type="text" name="TanggalUnggah" hidden>
                        <input class="inputalbum" type="text" name="UserID" value="{{ Auth::user()->id }}" hidden>
                        <input class="inputalbum" type="text" name="AlbumID" value="{{ $albumid }}" hidden>
                        @foreach ($krnjng as $list)
                        <div class="card-list">
                            <article class="card-art">
                                <figure class="card-image">
                                    <img src="{{ asset('upload/' . $list->foto ) }}"
                                        alt="An orange painted blue, cut in half laying on a blue background" />
                                </figure>
                                <div class="card-header">
                                    {{ $list->judul }}
                                    <a class="hapusfoto" href="/hapusfotokeranjang/{{ $list->id }}"><i class="fa-regular fa-x" style="color: white; padding-left: 12px; font-size: 16px"></i></a>
                                </div>
                                <div class="card-footer">
                                    <div class="card-meta card-meta--views">
                                        {{-- <i class="fa-light fa-comment"></i> --}}
                                        {{ $list->keterangan }}
                                    </div>
                                    <div class="card-meta card-meta--date">

                                    </div>      
                                    <div class="card-meta card-meta--date" style="padding-left: 190px" >
                                        
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
            </div>
            <div style="width: 100%; height: 50px;display: flex; justify-content: center; margin-top: 8px">
                
                <button class="btnpost" type="submit">Posting</button>
            </div>
            </form>
        </div>
        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Album
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Album</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <script src="assets/style-bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/style-bootstrap/js/bootstrap.bundle.min.js"></script>
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="js/poto.js"></script>
    @include('sweetalert::alert')
@endsection
