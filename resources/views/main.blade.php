<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sistem Pemilihan Sepeda Motor</title >
    <link rel="stylesheet" href="/style.css" >
    <link rel="icon" href="/images/Sepeda Motor Touring-logos.png" type="image/gif">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container">
        <a href="/"><img class="d-inline-block" src="/images/Sepeda Motor Touring-logos_black.png" alt="CalVCP logo" width="100" class="img-responsive header-logo"></a>
        <button type="button" name="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-lable="Toggle navigation"><span class="navbar-toggler-icon"></span> </button>
      </div>
    </nav >

<div class="container">

  <div class="row">

    <!-- Main Content -->
    <div class="col-xs-12 col-lg-9 col-sm-9 col-md-9">
      <h2>Sistem Pemilihan Sepeda Motor Touring Terbaik</h2>

      <form action="/result" method="post" id="form">
        @csrf
        <div class="row">
          <div class="col-lg-6 col-xs-12 col-sm-6 my-3">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Depan</label>
              <input type="text" name="fname" class="form-control" id="fname" placeholder="Nama Depan">
              @error('fname')
                <div class="alert alert-danger mt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6 my-3">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Belakang</label>
              <input type="text" name="lname" class="form-control" id="exampleInputEmail1" placeholder="Nama Belakang">
              @error('lname')
                <div class="alert alert-danger mt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6 my-2">
            <div class="form-group">
              <label for="Gender" class="select">Range Harga</label>
              <select class="form-select" id="harga" name="harga">
                <option value="">-</option>
                @foreach ($harga as $harga)
                <option value="{{$harga->id}}">{{$harga->range_harga}}</option>
                @endforeach
              </select>
              @error('harga')
                <div class="alert alert-danger mt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12 my-2">
            <div class="form-group">
              <label for="Gender" class="select">Pemilihan Ban</label>
              <select class="form-select" id="ban" name="ban">
                <option value="">-</option>
                @foreach ($ban as $ban)
                <option value="{{$ban->id}}">{{$ban->tipe_ban}}</option>
                @endforeach
              </select>
              @error('ban')
                <div class="alert alert-danger mt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="col-lg-12 col-xs-12 col-sm-12 my-4">
            <div class="form-group">
              <h5><b>Skala Kepentingan</b></h5>
            </div>
            <div class="form-group">
              <p>Skala : </p>
              <p>1 = Sangat Tidak Penting</p>
              <p>2 = Tidak Penting</p>
              <p>3 = Penting</p>
              <p>4 = Sangat Penting</p>
            </div>
          </div>
          <div class="alert alert-info" role="alert">
            <h5>Silahkan memilih bobot skala, untuk menunjukkan kriteria apa yang lebih penting.</h5>
          </div>



          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-12 my-3">
            <div class="form-group">
              <label for="Gender" class="select">Keiritan Bensin</label><br>
              <small id="emailHelp" class="form-text text-muted">Skala 1-4</small>
              <input type="range" name="kapasitasbensin" value="1" class="form-range" min="1" max="4" oninput="this.nextElementSibling.value = this.value">
              Skala : <output>1</output>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6 my-3">
            <div class="form-group">
              <label for="Gender" class="select">Posisi Duduk</label><br>
              <small id="emailHelp" class="form-text text-muted">Skala 1-4</small>
              <input type="range" name="ergonomis" value="1" class="form-range" min="1" max="4" oninput="this.nextElementSibling.value = this.value">
              Skala : <output>1</output>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6 my-3">
            <div class="form-group">
              <label for="Gender" class="select">Performa Mesin</label><br>
              <small id="emailHelp" class="form-text text-muted">Skala 1-4</small>
              <input type="range" name="mesin" value="1" class="form-range" min="1" max="4" oninput="this.nextElementSibling.value = this.value">
              Skala : <output>1</output>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6 my-3">
            <div class="form-group">
              <label for="Gender" class="select">Ketersediaan Suku Cadang</label><br>
              <small id="emailHelp" class="form-text text-muted">Skala 1-4</small>
              <input type="range" name="sukucadang" value="1" class="form-range" min="1" max="4" oninput="this.nextElementSibling.value = this.value">
              Skala : <output>1</output>
            </div>
          </div>

          <div class="col-lg-offset-0 col-lg-6 col-xs-12 col-sm-6 my-3">
            <div class="form-group">
              <label for="Gender" class="select">Tersebarnya Service Center</label><br>
              <small id="emailHelp" class="form-text text-muted">Skala 1-4</small>
              <input type="range" name="servicecenter" value="1" class="form-range" min="1" max="4" oninput="this.nextElementSibling.value = this.value">
              Skala : <output>1</output>
            </div>
          </div>
        </div><!--/ Row-->

        <hr>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-large" data-bs-backdrop='static' data-bs-keyboard="true" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>

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
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </form>

    </div> <!-- /Main Content -->
    <div class="col-xs-12 col-lg-3 col-sm-3 col-md-3 my-4">
      <div class="card">
        <div class="card-header">
          History Penggunaan
        </div>
        <ul class="list-group list-group-flush">
          @foreach ($listpengguna as $list)
            <li class="list-group-item"> <p>{{$list->nama_depan}} {{$list->nama_belakang}} - {{$list->merk_motor}} - {{$list->tipe_motor}}</p></li>
          @endforeach
        </ul>
      </div>
    </div>
    <br />
    <br />
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
</div>
</div>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- script manual -->
  <script type="text/javascript">
      $('#submit').click(function(){

      $('#formfield').submit();
      $('#exampleModal').modal('hide');
    });
  </script>
</body>
</html>
