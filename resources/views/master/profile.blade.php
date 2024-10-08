@extends('layout.main')
@section('content')
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-profile.css">

    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('upload/' . Auth::user()->profile) }}" alt="Admin"
                                    class="rounded-circle" width="150" height="150" style="object-fit: cover;">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    {{-- <p class="text-secondary mb-1">Full Stack Developer</p>
                          <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                          <button class="btn btn-primary">Follow</button>
                          <button class="btn btn-outline-primary">Message</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3"
                        style="height: 300px; background-color: white; display: flex; justify-content: center; align-items: center;">
                        <form action="/liatreport">
                            <button type="submit" class="editpw">
                                Lihat Statistik
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Username</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nama Lengkap</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->NamaLengkap }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->Email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Alamat</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->Alamat }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="button" class="edit" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body"
                                                    style="display: flex; justify-content: center; align-items: center;">
                                                    <div class="dalamform2">
                                                        <form action="/editprofile" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <label for="">Nama :</label>
                                                            <br>
                                                            <input type="text" class="input"
                                                                value="{{ Auth::user()->name }}" name="name">
                                                            <br>
                                                            <label for="">Nama Lengkap :</label>
                                                            <br>
                                                            <input type="text" class="input"
                                                                value="{{ Auth::user()->NamaLengkap }}" name="NamaLengkap">
                                                            <br>
                                                            <label for="">Email :</label>
                                                            <br>
                                                            <input type="text" class="input"
                                                                value="{{ Auth::user()->Email }}" name="Email">
                                                            <br>
                                                            <label for="">Alamat :</label>
                                                            <br>
                                                            <input type="text" class="input"
                                                                value="{{ Auth::user()->Alamat }}" name="Alamat">
                                                            <br>
                                                            <label for="">Foto :</label>
                                                            <div class="input-group mb-3">
                                                                <input type="file" class="form-control" id="inputfile"
                                                                    name="foto">
                                                                <label class="input-group-text"
                                                                    for="inputfile">Upload</label>
                                                            </div>
                                                            <br>
                                                            <div class="modal-footer">
                                                                <button class="editsimpan" type="submit">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ubah pw --}}
                                    <button type="button" class="editpw" data-bs-toggle="modal"
                                        data-bs-target="#exampleModaleditpw">
                                        Ubah Password
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModaleditpw" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body"
                                                    style="display: flex; justify-content: center; align-items: center; height: 220px; ">
                                                    <div class="dalamform2">
                                                        <form action="/ubahpassword" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <label for="">Kata Sandi Lama :</label>
                                                            <br>
                                                            <input type="password" class="inputpw" value=""
                                                                placeholder="Masukan Kata Sandi Lama" required>
                                                            <input type="text" class="input"
                                                                value="{{ Auth::user()->id }}" name="UserID" hidden>
                                                            <br>
                                                            <label for="">Kata Sandi Baru :</label>
                                                            <br>
                                                            <input type="password" class="inputpw" value=""
                                                                name="password" placeholder="Masukan Kata Sandi Baru"
                                                                required>
                                                            <div class="modal-footer">
                                                                <button class="editsimpan" type="submit">Ubah</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="card"
                            style="width: 98%; margin-left: 9px; background-color: white; height: 290px; overflow-y: auto;"
                            id="style-3">
                            @if (isset($album[0]))
                                <div class="card-body" style="display: flex;margin: 7.9px; gap: 5px;"
                                    data-masonry='{"percentPosition": true}'>
                                    @foreach ($album as $list)
                                        {{--  --}}
                                        {{-- <div class="center"> --}}
                                        <a href="/liatpotoalbum{{ $list->AlbumID }}">
                                            <div class="article-card">
                                                <div class="content">
                                                    <p class="date">{{ $list->TanggalDibuat }}</p>
                                                    <p class="title">{{ $list->NamaAlbum }}</p>
                                                </div>
                                                <img src="{{ asset('upload/' . $list->LokasiFile) }}"
                                                    alt="notfound.png" />
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @else
                            <div class="bungkus-not">
                                <div class="notice">
                                    <div class="notice-atas">
                                        <p class="ikon-notice"><i class="fa-light fa-images"></i></p>
                                    </div>
                                    <div class="notice-bawah">
                                        <p class="desk">Belum ada album yang dibuat.</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
              </div>
            </div>
        </div>
    </div>
    <script>
        const fileInput = document.getElementById("inputfile");

        // Menetapkan nilai input file
        fileInput.value = {{ Auth::user()->profile }};
    </script>
    <script src="assets/style-bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/style-bootstrap/js/bootstrap.bundle.min.js"></script>
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="js/poto.js"></script>
    @include('sweetalert::alert')
@endsection
