<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sistem Pemilihan Sepeda Motor</title >
    <link rel="icon" href="/images/Sepeda Motor Touring-logos.png" type="image/gif">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
      <a href="/"><img class="d-inline-block" src="/images/Sepeda Motor Touring-logos_black.png" alt="CalVCP logo" width="100" class="img-responsive header-logo"></a>
    </div>
  </nav>

  <div class="container">

    <div class="row">

      <div class="col-xs-12 col-lg-7 col-sm-7 col-md-7">
        <div class="row">
          <!-- Merk -->
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
            <div class="form-group">
              <h4>Merk</h4>
            </div>
          </div>
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h5>: {{$motor->merk_motor}}</h5>
          </div>

          <!-- Tipe Motor -->
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h4>Tipe Motor</h4>
          </div>
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h5>: {{$motor->tipe_motor}}</h5>
          </div>

          <!-- Kapasitas Bensin -->
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h4>Kapasitas Bensin</h4>
          </div>
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h5>: {{$motor->kapasitas_bensin}}</h5>
          </div>

          <!-- Keiritan Bahan Bakar -->
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h4>Keiritan Bahan Bakar</h4>
          </div>
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h5>: {{$motor->pemakaian_bensin}}</h5>
          </div>

          <!-- Performa Mesin -->
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h4>Performa Mesin</h4>
          </div>
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h5>: {{$motor->mesin_cc}}</h5>
          </div>

          <!-- Ketersediaan suku cadang -->
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h4>Ketersediaan Suku Cadang</h4>
          </div>
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h5>: {{$motor->suku_cadang}}</h5>
          </div>

          <!-- Cabang service center -->
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h4>Cabang Service Center</h4>
          </div>
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h5>: {{$motor->service_center}}</h5>
          </div>

          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h4>Harga</h4>
          </div>
          <div class="col-lg-6 col-xs-6 col-sm-6 my-3">
              <h5>: {{"Rp ". number_format($motor->harga,2,',','.')}}</h5>
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-lg-5 col-sm-5 col-md-5">
        <div class="row align-items-center">
          <img class="align-middle" src="{{$motor->photomotor}}" width="100px" alt="">
          <div class="col-6 my-5">
            <button type="button" class="btn btn-primary btn-large" data-bs-backdrop='static' data-bs-keyboard="true" data-bs-toggle="modal" data-bs-target="#exampleModal">Cari Motor Lain</button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda Yakin?</h5>
                  </div>
                  <div class="modal-body">
                    Jika sudah yakin silahkan tekan tombol Submit, jika tidak silahkan tekan tombol ESC.
                  </div>
                  <div class="modal-footer">
                    <a href="/"><button type="submit" id="submit" class="btn btn-primary">Submit</button></a>
                  </div>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>

      <br />
      <br />
      <br />
      <hr>
      <div class="row">
        <div class="text-center col-md-12 col-md-offset-3">
          <h4>Sistem Pemilihan Sepeda Motor Touring</h4>
          <p>Copyright &copy; 2021 &middot; All Rights Reserved &middot; <a href="/"></a></p>
        </div>
      </div>
      <hr>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
