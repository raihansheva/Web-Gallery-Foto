<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GaleryMe</title>
    <link rel="stylesheet" href="css/style-navbar.css">
    <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/poppins/font.css">

    {{-- <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.css"> --}}
    {{-- <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.min.css"> --}}
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg"
            style=" background: rgb(247, 247, 247); height: 50px; border-bottom: 0.5px  rgb(223, 223, 223) solid">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="position: fixed; font-weight: 600">Gallery<span style="color: #aeda7f">Me</span>.</a>

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup"
                    style=" justify-content: center; align-items: center">
                    <div class="navbar-nav" style="gap: 20px">
                        <a class="nav-link" aria-current="page" href="/home" style="font-size: 20px;"><i
                                class="fa-regular fa-house"></i></a>
                        {{-- <a class="nav-link" href="/album" style="font-size: 20px"><i class="fa-regular fa-image"></i></a> --}}
                        <a class="nav-link" href="/tambahalbum2" style="font-size: 20px"><i
                                class="fa-regular fa-square-plus"></i></a>
                        <a class="nav-link" href="/profile" style="font-size: 20px"><i
                                class="fa-regular fa-user"></i></a>
                    </div>
                </div>
                <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModalkeluar" class="navbar-brand"
                    href="/logout" style=" font-weight: 600"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                <div class="modal fade" id="exampleModalkeluar" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" style="width: 250px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Keluar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="text-align: center">
                                Yakin Mau keluar?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                <a href="/logout">
                                    <button type="button" class="btn btn-danger">Yaa</button>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="main">
        {{-- <div class="container" style="height: 100%;"> --}}
        @yield('content')
        {{-- </div> --}}
    </main>

    <script src="assets/fontawesome/js/all.js"></script>
    <script src="assets/fontawesome/js/fontawesome.js"></script>

    {{-- <script src="assets/style-bootstrap/js/bootstrap.bundle.js"></script> --}}
    {{-- <script src="assets/style-bootstrap/js/bootstrap.bundle.min.js"></script> --}}
</body>

</html>
