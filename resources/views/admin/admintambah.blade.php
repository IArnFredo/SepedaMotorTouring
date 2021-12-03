<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Dashboard - Tambah</title>
    <link rel="icon" href="/images/Sepeda Motor Touring-logos.png" type="image/gif">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <style media="screen">
      .nav-link{
        color:white !important;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="/admin/dashboard" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="/admin/dashboard/tambah" class="nav-link px-0"> <span class="d-none d-sm-inline">Tambah Data</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-sm-inline mx-1">{{session()->get('nama_admin')}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/adminlogout">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">
            @if (session('gagal'))
                <div class="alert alert-danger">
                    {{ session('gagal') }}
                </div>
            @endif
              <form class="" action="/tambahdata" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">Merk Motor</label>
                      <input type="text" class="form-control" name="merk" placeholder="Tipe Motor" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">Tipe Motor</label>
                      <input type="text" class="form-control" name="tipemotor" placeholder="Tipe Motor" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">Range Harga</label><br>
                      <small class="form-text text-muted">Skala : 1-5</small><br>
                      <small class="form-text text-muted">1 = 15 - 30 Jt</small><br>
                      <small class="form-text text-muted">2 = 30 - 45 Jt</small><br>
                      <small class="form-text text-muted">3 = 45 - 60 Jt</small><br>
                      <small class="form-text text-muted">4 = 60 - 75 Jt</small><br>
                      <small class="form-text text-muted">5 = 75 - 100 Jt</small><br>
                      <input type="number" name="rangeharga" min="1" max="5" class="form-control mt-3" id="formGroupExampleInput" placeholder="Range Harga" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">Harga</label>
                      <input type="text" name="harga" class="form-control" id="formGroupExampleInput" placeholder="Harga" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">Tipe Ban</label>
                      <select class="form-select" name="tipeban" aria-label="Default select example" required>
                        <option selected>-</option>
                        @foreach ($ban as $ban)
                        <option value="{{$ban->id}}">{{$ban->tipe_ban}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">Kapasitas Bensin</label>
                      <input type="text" name="kapasitasbensin" class="form-control" id="formGroupExampleInput" placeholder="Kapasitas Bensin" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">Keiritan Bensin</label>
                      <small class="form-text text-muted">Skala : 1-5</small><br>
                      <small class="form-text text-muted">1 = Sangat Boros</small><br>
                      <small class="form-text text-muted">2 = Boros</small><br>
                      <small class="form-text text-muted">3 = Biasa</small><br>
                      <small class="form-text text-muted">4 = Irit</small><br>
                      <small class="form-text text-muted">5 = Sangat Irit</small><br>
                      <input type="number" class="form-control mt-3" name="iritbensin" id="formGroupExampleInput" placeholder="Irit Bensin" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">Pemakaian Bensin (Ex : 32 km/liter)</label>
                      <input type="text" class="form-control mt-3" name="pemakaianbensin" id="formGroupExampleInput" placeholder="pemakaianbensin" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">Posisi Duduk Ergonomis</label>
                      <input type="number" min="1" max="5" name="ergonomis" class="form-control" id="formGroupExampleInput" placeholder="Ergonomis" required>
                      <small class="form-text text-muted">Skala : 1-5</small><br>
                      <small class="form-text text-muted">1 = Sangat Tidak Nyaman</small><br>
                      <small class="form-text text-muted">2 = Tidak Nyaman</small><br>
                      <small class="form-text text-muted">3 = Biasa</small><br>
                      <small class="form-text text-muted">4 = Nyaman</small><br>
                      <small class="form-text text-muted">5 = Sangat Nyaman</small><br>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">Mesin</label>
                      <small class="form-text text-muted">Performa Mesin : 0-100</small><br>
                      <input type="number" name="mesin" min="0" max="100" class="form-control mt-3" id="formGroupExampleInput" placeholder="Mesin" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">CC Mesin</label>
                      <input type="text" name="ccmesin" class="form-control mt-3" id="formGroupExampleInput" placeholder="CC Mesin" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">Suku Cadang</label>
                      <small class="form-text text-muted">Skala : 1-5</small><br>
                      <small class="form-text text-muted">1 = Sangat Sulit Dicari</small><br>
                      <small class="form-text text-muted">2 = Sulit Dicari</small><br>
                      <small class="form-text text-muted">3 = Biasa</small><br>
                      <small class="form-text text-muted">4 = Mudah Dicari</small><br>
                      <small class="form-text text-muted">5 = Sangat Mudah Dicari</small><br>
                      <input type="number"  min="1" max="5" name="sukucadang" class="form-control mt-3" id="formGroupExampleInput" placeholder="Suku Cadang" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formGroupExampleInput" class="form-label">Service Center</label>
                      <small class="form-text text-muted">Skala : 1-5</small><br>
                      <small class="form-text text-muted">1 = Sangat Sedikit</small><br>
                      <small class="form-text text-muted">2 = Sedikit</small><br>
                      <small class="form-text text-muted">3 = Biasa</small><br>
                      <small class="form-text text-muted">4 = Banyak</small><br>
                      <small class="form-text text-muted">5 = Sangat Banyak</small><br>
                      <input type="number" min="1" max="5" name="servicecenter" class="form-control mt-3" id="formGroupExampleInput" placeholder="Service Center" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label for="formFileSm" class="form-label">Masukkan Foto</label>
                      <input name="uploadgambar" class="form-control form-control-sm" id="formFileSm" type="file" accept="image/jpeg" required>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" name="button">Submit</button>
              </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
