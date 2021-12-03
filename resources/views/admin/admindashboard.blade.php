<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Dashboard - Home</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="icon" href="/images/Sepeda Motor Touring-logos.png" type="image/gif">
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
              @if (session('berhasil'))
                  <div class="alert alert-success">
                      {{ session('berhasil') }}
                  </div>
              @endif
              @if (session('delete'))
                  <div class="alert alert-success">
                      {{ session('delete') }}
                  </div>
              @endif
              <a href="/admin/dashboard/tambah"><button type="button" class="btn btn-primary btn-large" name="button">Tambah Data</button></a>
              <table class="table my-3">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Merk Motor</th>
                    <th scope="col">Tipe Motor</th>
                    <th scope="col">Range Harga</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tipe Ban</th>
                    <th scope="col">Kapasitas Bensin</th>
                    <th scope="col">Keiritan Bensin</th>
                    <th scope="col">Ergonomis</th>
                    <th scope="col">Mesin</th>
                    <th scope="col">Suku Cadang</th>
                    <th scope="col">Service Center</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                @foreach ($data as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->merk_motor}}</td>
                  <td>{{$data->tipe_motor}}</td>
                  <td>{{$data->range_harga}}</td>
                  <td>{{$data->harga}}</td>
                  <td>{{$data->tipe_ban}}</td>
                  <td>{{$data->kapasitas_bensin}}</td>
                  <td>{{$data->keiritan_bensin}}</td>
                  <td>{{$data->ergonomis}}</td>
                  <td>{{$data->mesin}}</td>
                  <td>{{$data->suku_cadang}}</td>
                  <td>{{$data->service_center}}</td>
                  <td><img src="{{$data->photomotor}}" width="60px" alt=""> </td>
                  <td><a href="/admin/dashboard/edit/{{$data->id}}"><button class="btn btn-warning" type="button" name="button">Edit</button> </a> <button type="button" class="btn btn-danger" data-bs-backdrop='static' data-bs-keyboard="true" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button> </td>
                </tr>
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
                        <a href="/delete/{{$data->id}}"><button type="button" id="submit" class="btn btn-primary">Submit</button></a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
