<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style-form-login2.css">
</head>

<body>
    <div class="bungkus">
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="/registrasi" method="POST">
					@csrf
                    <h1>Daftar</h1>
                    <span>Isi form dibawah ini</span>
                    <input class="inputfile" type="text" placeholder="Username" name="name"/>
                    <input class="inputfile" type="password" placeholder="Password" name="password"/>
                    <input class="inputfile" type="email" placeholder="Email" name="Email"/>
                    <input class="inputfile" type="text" placeholder="NamaLengkap" name="NamaLengkap"/>
                    <textarea class="inputfiletext" name="Alamat" id="" cols="30" rows="10" placeholder="alamat"></textarea>
                    <button type="submit" value="Masuk">Daftar</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="/masuklogin" method="POST">
					@csrf
                    <h1 class="titledaftar">Log In</h1>
                    <span>Silahkan Login Dibawah Ini</span>
                    <input class="inputfile" type="text" placeholder="Username" name="name" />
                    <input class="inputfile" type="password" placeholder="Password" name="password"/>
                    <button type="submit" value="Masuk">Login</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1 class="titlekanan">Haiii Lagiiii</h1>
                        <p>Jika sudah punya akun silahkan langsung login dibawah ini</p>
                        <button class="ghost" id="signIn">Login</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1 class="titlekanan">GalleryMe.</h1>
                        <p>Belum punya akun?, Daftar aja dulu dibawah ini</p>
                        <button class="ghost" id="signUp">Daftar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/login.js"></script>
	@include('sweetalert::alert')
</body>

</html>
