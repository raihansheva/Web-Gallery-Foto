<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gas</title>
    <link rel="stylesheet" href="css/style-form-regis.css">
    {{-- <link rel="stylesheet" href="css/style-form-login2.css"> --}}
    <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> --}}
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: grid;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            background-color: #F1EFEF;
        }
    </style>
</head>

<body>
    {{-- @if (session()->has('loginerror'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert"
            style="transition: all 0.4s ease-in-out; width: 100px">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}

    {{-- @if (session()->has('loginerror'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert"
            style="transition: all 0.4s ease-in-out;">
            <strong>Salah!</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}

    <div class="main">
        <div class="kiri">
            <div class="kotak-gede">

            </div>
        </div>

        <div class="kanan">
            <div class="login">
                <div class="title">
                    <p class="p1"><span>Daftar</span></p>
                    <p class="p2">Daftar terlebih dahulu :)</p>
                </div>

                <form action="/registrasi" class="form2" method="POST">
                    @csrf
                    <div class="input-container ic1">
                        <input id="name" class="input @error('name') error @enderror" name="name" type="text"
                            placeholder=" " autocomplete="off" required />
                        <div class="cut"></div>
                        <label for="Username" class="placeholder1">Username</label>
                    </div>
                    {{-- <span class="underline"></span> --}}
                    <div class="input-container ic2">
                        <input id="password" class="input" name="password" type="password" placeholder=" " />
                        <div class="cut"></div>
                        <label for="password" class="placeholder1">Password</label>
                    </div>
                    <div class="input-container ic2">
                        <input id="password" class="input" name="Email" type="email" placeholder=" " />
                        <div class="cut"></div>
                        <label for="password" class="placeholder1">Email</label>
                    </div>
                    <div class="input-container ic2">
                        <input id="password" class="input" name="NamaLengkap" type="text" placeholder=" " />
                        <div class="cut"></div>
                        <label for="password" class="placeholder1">NamaLengkap</label>
                    </div>
                    <div class="input-container ic2">
                        <input id="password" class="input" name="Alamat" type="text" placeholder=" " />
                        <div class="cut"></div>
                        <label for="password" class="placeholder1">Alamat</label>
                    </div>
                    {{-- <span class="underline"></span> --}}
                    <button class="btn1" type="submit" value="Masuk">Daftar</button>
                </form>
                <div class="pooter">
                    <p class="link">Sudah punya akun? <a class="regis" href="/login">Login.</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/fontawesome/js/all.js"></script>
    <script src="assets/fontawesome/js/fontawesome.js"></script>
    <script type="text/javascript" src="js/validasi.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
        @include('sweetalert::alert')
</body>

</html>
