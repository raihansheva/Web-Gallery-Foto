@extends('layout.main')
@section('content')
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-tambahalbum2.css">
    <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">

    <div class="container" style="display: flex;  height: calc(100vh - 72px); padding: 10px">
        <div class="atas" style=" width: 26%; height: 100%;">
            <div class="card" style="width: 100%; height: 100%;">
                <div class="card-body">
                    <p class="judul">Buat Album</p>
                    <hr>
                    <form action="/tambahpoto2" method="post">
                        @csrf
                        <label for="" class="namalabel">Nama Album :</label>
                        <input class="inputalbum" type="text" name="NamaAlbum">
                        <label for="" class="namalabel">Deskripsi :</label>
                        {{-- <input  type="text" name="Deskripsi"> --}}
                        <textarea class="inputalbumtxt" id="" cols="30" rows="10"  name="Deskripsi"></textarea>
                        <input class="inputalbum" type="text" name="TanggalDibuat" hidden>
                        <input class="inputalbum" type="text" name="UserID" value="{{ Auth::user()->id }}" hidden>
                        <button class="button" type="submit">Buat</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bawah" style=" width: 74%; height: 100%;">
            <div class="card2"
                style=" width: 100%; height: 100%; border-radius: 0px; background-color: none; overflow: auto;"
                id="style-3">
                <div class="card-body" style="padding: 10px;  display: flex; flex-wrap: wrap; gap: 18px">
                    @foreach ($album as $list)
                        <div class="card" style="width: 250px; height: 240px;">
                            <div class="card-body">
                                <div class="card-atas" style=" justify-content: end; display: flex;">
                                    <a class="tambah" href="/poto{{ $list->AlbumID }}"  ><i class="fa-regular fa-rectangle-history-circle-plus"></i></a>

                                            <p class="edit" type="submit" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $list->AlbumID }}"><i
                                            class="fa-regular fa-pen-to-square"></i></p>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $list->AlbumID }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="width: 300px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Album</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/editalbum{{ $list->AlbumID }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <label for="">Nama Album :</label>
                                                        <br>
                                                        <input type="text" class="input" value="{{ $list->NamaAlbum }}" name="NamaAlbum">
                                                        <br>
                                                        <label for="">Deskripsi :</label>
                                                        <br>
                                                        <input type="texta" class="input" value="{{ $list->Deskripsi }}" name="Deskripsi">

                                                        <br>
                                                        <input type="text" class="input" value="{{ $list->TanggalUnggah }}" name="TanggalUnggah" hidden>
                                                        <input type="text" class="input" value="{{ Auth::user()->id }}" name="UserID" hidden>
                                                        <div class="modal-footer">
                                                            <button class="edit2" type="submit">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- hapus --}}
                                    <p class="hapus" type="submit" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalHapus{{ $list->AlbumID }}"><i class="fa-regular fa-trash-can"></i></p>
                                

                                    <div class="modal fade" id="exampleModalHapus{{ $list->AlbumID }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="width: 265px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Album</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Yakin mau hapus album ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="/hapusalbum/{{ $list->AlbumID }}" type="button" class="btn btn-danger" type="submit">Hapus</a>
                                                </div>
                                                {{-- </form> --}}
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-tengah">
                                    <p class="judull">{{ $list->NamaAlbum }}</p>
                                    <input type="text" name="AlbumID" value="{{ $list->AlbumID }}" hidden>
                                </div>
                                <div class="card-bawah" style="padding: 13px">

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
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
    <script src="assets/fontawesome/js/all.js"></script>
    <script src="assets/fontawesome/js/fontawesome.js"></script>
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="js/poto.js"></script>
    @include('sweetalert::alert')
@endsection
