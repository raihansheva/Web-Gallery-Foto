@extends('layout.main')
@section('content')
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-potoalbum.css">
    <div class="kotak">
        {{-- <div class="kiri"></div> --}}
        <div class="tengah" id="style-3">
            @foreach ($foto as $list)
                <div class="card-list">
                    <article class="card-art">
                        <figure class="card-image">
                            <img src="{{ asset('upload/' . $list->LokasiFile) }}"
                                alt="An orange painted blue, cut in half laying on a blue background" />
                        </figure>
                        <div class="card-header">
                            <a href="#">{{ $list->JudulFoto }}</a>
                            <form action="/like" method="POST">
                                @csrf
                                <input type="text" value="{{ Auth::user()->id }}" name="UserID" hidden>
                                <input type="text" value="{{ $list->FotoID }}" name="FotoID" hidden>
                                @if ($list->like->where('UserID','=',Auth::user()->id)->first() )
                                <button class="icon-button" id="like" style="background-color: #EC4646; color: white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                        <path
                                            d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                    </svg>
                                </button>
                                @else
                                <button class="icon-button" id="like">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                        <path
                                            d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                    </svg>
                                </button>
                                @endif

                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="card-meta card-meta--views">
                                <i class="fa-light fa-comment"></i>
                                <a class="link" href="" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalkomen{{ $list->FotoID }}">Komentar</a>

                                <!-- Modal -->

                            </div>
                            <div class="card-meta card-meta--date">
                                @if ($list->UserID == Auth::user()->id)
                                    <i class="fa-regular fa-pen-to-square"
                                        style="font-size: 18px; padding: 2px; padding-left: 7px; cursor: pointer;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#exampleModaleditfoto{{ $list->FotoID }}"></i>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
                                        <rect x="2" y="4" width="20" height="18" rx="4" />
                                        <path d="M8 2v4" />
                                        <path d="M16 2v4" />
                                        <path d="M2 10h20" />
                                    </svg>
                                    {{ $list->TanggalUnggah }}
                                @endif

                            </div>

                            @if ($list->UserID == Auth::user()->id)
                                <div class="card-meta card-meta--date" style="padding-left: 120px">
                                    <a class="hapusfoto" href="/hapusfoto/{{ $list->FotoID }}" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalhapusfoto{{ $list->FotoID }}">Hapus</a>
                                </div>
                            @else
                                <div class="card-meta card-meta--date" style="padding-left: 60px">
                                    <a class="link"
                                        href="/liatuser{{ $list->user->id }}">{{ $list->user->NamaLengkap }}</a>
                                </div>
                            @endif

                        </div>
                    </article>
                </div>
                <div class="modal fade" id="exampleModalkomen{{ $list->FotoID }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Komentar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="overflow: auto;" id="style-3">
                                @foreach ($list->komentar as $komen)
                                    <div class="card" style="width: 100%; height: 100%; padding: 0px; margin-top: 10px">
                                        <div class="card-body">
                                            <div class="atas-komen">
                                                <p class="user1">{{ $komen->user->name }}</p>
                                                {{-- <form action="/hapuskomen" method="post"> --}}
                                                    @if ($komen->user->id == Auth::user()->id || $list->UserID == Auth::user()->id )
                                                        
                                                    <a href="/hapuskomen{{ $komen->KomentarID }}" type="submit" style="text-decoration: none; color: black"><i class="fa-regular fa-x" style=" font-size: 22px; cursor: pointer;"></i></a>
                                                    @endif
                                                {{-- </form> --}}
                                            </div>
                                            <div class="area-komen">
                                                {{ $komen->IsiKomentar }}
                                            </div>
                                            <p class="tanggal1">{{ $komen->TanggalKomentar }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <form action="/komen" method="POST" style="width: 100%">
                                    @csrf
                                    <input type="text" value="{{ $list->FotoID }}" hidden name="FotoID">
                                    <input type="text" value="{{ Auth::user()->id }}" hidden name="UserID">
                                    <textarea class="form-control" name="komentar" id="" cols="10" rows="4"></textarea>
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-top: 10px">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal edit foto -->
                <div class="modal fade" id="exampleModaleditfoto{{ $list->FotoID }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/editfoto{{ $list->FotoID }}" method="post">
                                    @csrf
                                    <label for="">Judul Foto :</label>
                                    <input type="text" class="form-control" value="{{ $list->JudulFoto }}"
                                        style="padding-bottom: 8px" name="JudulFoto">
                                    <label for="">Deskripsi :</label>
                                    <textarea class="form-control" name="DeskripsiFoto" id="" cols="10" rows="5" value=""
                                        style="padding-bottom: 8px">{{ $list->DeskripsiFoto }}</textarea>
                                    <label for="">Tanggal Unggah :</label>
                                    <input type="text" class="form-control" value="{{ $list->TanggalUnggah }}"
                                        style="padding-bottom: 8px">
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalhapusfoto{{ $list->FotoID }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="width: 250px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               <p>Yakin mau hapus foto ini?</p>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                <a class="hapusfoto" href="/hapusfoto/{{ $list->FotoID }}">Hapus</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="kanan">
            {{-- <div class="kanan-atas"></div> --}}
            <div class="kanan-tengah">
                <div class="card2" style="width: 100%; height: 100%; padding: 10px;">
                    <div class="card-body">
                        @foreach ($album as $item)
                            <div class="form">
                                <label for="" class="judul">Nama Album :</label>
                                <label for="" class="judul">{{ $item->NamaAlbum }}</label>
                                <hr style="margin: 0px; padding: 0px">
                            </div>
                            <div class="form">
                                <label for="" class="judul">Deskripsi :</label>
                                <label for="" class="judul">{{ $item->Deskripsi }}</label>
                                <hr style="margin: 0px; padding: 0px">
                            </div>
                            <div class="form">
                                <label for="" class="judul">Tanggal Dibuat :</label>
                                <label for="" class="judul">{{ $item->TanggalDibuat }}</label>
                                <hr style="margin: 0px; padding: 0px">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="assets/style-bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/style-bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
