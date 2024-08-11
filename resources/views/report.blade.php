@extends('layout.main')
@section('content')
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style-bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-report.css">

    <div class="container">
        <div class="bungkus">
          <div class="atas-atas">
            
            <a href="/profile" class="back"><i class="fa-regular fa-arrow-left" style="font-size: 20px; padding-left: 10px"></i></a></span><label for="" class="judul">Statistik </label>
          </div>
            <div class="atas">
                <div class="card" style="width: 100%;">
                    <div class="card-body" >
                      <div class="card-atas">
                        <label for="" style="font-size: 24px; padding-top: 5px;padding-right: 6px; text-align:center;"><i class="fa-sharp fa-light fa-image"></i></label>
                        <label style="font-size: 24px; text-align:center; padding-top: 5px;">{{ $jumfoto }}</label>
                      </div>
                      <div class="card-bawah">
                        <label for="">Foto</label>
                      </div>
                    </div>
                  </div>
                  <div class="card" style="width: 100%;">
                    <div class="card-body">
                      <div class="card-atas">
                        <label for="" style="font-size: 24px; padding-top: 5px;padding-right: 6px; text-align:center;"><i class="fa-regular fa-rectangle-history"></i></label>
                        <label style="font-size: 24px; text-align:center; padding-top: 5px;">{{ $jumalbum }}</label>
                      </div>
                      <div class="card-bawah">
                        <label for="">Album</label>
                      </div>
                    </div>
                  </div>
                  <div class="card" style="width: 100%;">
                    <div class="card-body">
                      
                    </div>
                  </div>
            </div>
            <div class="bawah">
              <div class="bungkus-bawah" id="style-3">
                @foreach ($report as $item)
                <div class="card" style="width: 98%; height: 20%; margin-bottom: 10px">
                    <div class="card-body" style="display: flex;">
                        <div class="col1">
                          <label class="labeljudul">NamaAlbum :</label>
                          <br>
                          <label for="">{{ $item->NamaAlbum }}</label>
                        </div>
                        <div class="col2">
                          <label class="labeljudul">Tanggal Dibuat :</label>
                          <br>
                          <label for="">{{$item->created_at}}</label>
                        </div>
                        <div class="col3">
                          <label class="labeljudul">Jumlah Foto :</label>
                          <br>
                          <label for=""><i class="fa-regular fa-image" style="padding-right: 8px"></i>{{$item->jumlahfoto}}</label>
                        </div>
                        <div class="col4">
                          <label class="labeljudul">Jumlah Like :</label>
                          <br>
                          <label for=""><i class="fa-regular fa-heart" style="padding-right: 8px; color: red;"></i>{{$item->jumlahlike}}</label>
                        </div>
                        <div class="col5">
                          <label class="labeljudul">Jumlah Komentar :</label>
                          <br>
                          <label for=""><i class="fa-light fa-comment" style="padding-right: 8px"></i>{{$item->jumlahkomentar}}</label>
                        </div>
                    </div>
                  </div>                
                @endforeach         
              </div>
            </div>
        </div>
        
    </div>
    <script src="assets/style-bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/style-bootstrap/js/bootstrap.bundle.min.js"></script>
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="js/poto.js"></script>
@endsection
