@extends('layout.main')
@section('content')
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-home.css">
    <div class="kotak">
        <div class="kiri">
            <div class="cari">
                <p class="title-cari">Pencarian</p>
                <form action="/cari" method="GET">
                    @csrf
                    <input class="form-control" type="text" placeholder="Cari" aria-label="default input example"
                        style="height: 50px" name="cari">
                </form>
            </div>
        </div>
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
                                {{-- {{ $list->like[0]->UserID }} --}}
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
                                {{ $jumlahKomentar[$list->FotoID] }}
                                <a class="link" href="" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalkomen{{ $list->FotoID }}">Komentar</a>
                            </div>
                            <div class="card-meta card-meta--date">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" display="block" id="Calendar">
                                    <rect x="2" y="4" width="20" height="18" rx="4" />
                                    <path d="M8 2v4" />
                                    <path d="M16 2v4" />
                                    <path d="M2 10h20" />
                                </svg>
                                {{ $list->TanggalUnggah }}
                            </div>

                            <div class="card-meta card-meta--date" style="padding-left: 20px">
                                Suka {{ $list->like->count() }}
                            </div>
                            <div class="card-meta card-meta--date" style="padding-left: 40px">
                                <a class="link2" href="/liatuser{{ $list->user->id }}">{{ $list->user->NamaLengkap }}</a>
                            </div>
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
            @endforeach
        </div>

        <div class="kanan">
            <div class="kanan-atas">
                {{-- <div class="cari">
                    <p class="title-cari">Pencarian User</p>
                    <form action="/cariuser" method="GET">
                        @csrf
                        <input class="form-control" type="text" placeholder="Cari User" aria-label="default input example"
                            style="height: 50px" name="cariuser">
                    </form>
                </div> --}}
            </div>
            <div class="kanan-tengah">
                <p class="title">Pengguna Lainnya</p>
                {{-- <div class="area-profile"> --}}
                <div class="card"
                    style="width: 100%; height: 100%; border-radius: 10px; border: none; background-color: #eeeded71; padding: 10px; gap: 10px">
                    @foreach ($user as $list)
                        <a href="/liatuser{{ $list->id }}" style="text-decoration: none; color: black;">
                            <div class="card2">
                                <div class="card-body" style="display: flex; padding: 10px">
                                    {{-- <p><i class="fa-light fa-user" style="font-size: 24; text-decoration: none "></i></p> --}}
                                    <img src="{{ asset('upload/' . $list->profile) }}" alt="Admin"
                                    class="rounded-circle" width="36" height="36" style="object-fit: cover;" >
                                    <div class="nama" style="font-size: 26;  ">
                                        <p style="text-decoration: none; padding-top: 6px; font-weight: 600">{{ $list->NamaLengkap }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    <script>
        const icon = document.getElementById("like");

        let isRed = true;

        icon.addEventListener("click", function() {
            if (isRed) {
                icon.style.backgroundColor = "white";
                icon.style.Color = "#565656";
            } else {
                icon.style.backgroundColor = "#EC4646";
                icon.style.Color = "white";
            }

            isRed = !isRed;
        });
    </script>
    <script src="assets/style-bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/style-bootstrap/js/bootstrap.bundle.min.js"></script>
    @include('sweetalert::alert')
@endsection
