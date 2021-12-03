<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin Login</title>
    <link rel="icon" href="/images/Sepeda Motor Touring-logos.png" type="image/gif">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container">
        <a href="/"><img class="d-inline-block" src="/images/Sepeda Motor Touring-logos_black.png" alt="CalVCP logo" width="100" class="img-responsive header-logo"></a>

        <!-- <button type="button" name="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-lable="Toggle navigation"><span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active mx-3"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item mx-3"><a href="our-team" class="nav-link">Our Team</a></li>
          </ul>
        </div> -->
      </div>
    </nav >
    <div class="container align-middle">
      <div class="row">
        <div class="card text-center">
          <div class="card-header">
            Admin Login
          </div>
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/images/Sepeda Motor Touring-logos.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <form action="/adminloginver" method="post">
                    @csrf
                    <div class="form-group">
                      @if (session('gagal'))
                          <div class="alert alert-danger">
                              {{ session('gagal') }}
                          </div>
                      @endif
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" name="username" class="form-control my-3" id="username" placeholder="Username">
                      @error('fname')
                        <div class="alert alert-danger my-1">
                          {{ $message }}
                        </div>
                      @enderror
                      <input type="password" name="password" class="form-control my-3" id="password" placeholder="Password">
                      @error('password')
                        <div class="alert alert-danger my-1">
                          {{ $message }}
                        </div>
                      @enderror
                      <input type="checkbox" class="text-left" onclick="myFunction()">Show Password
                    </div>
                    <button type="submit" class="btn btn-primary btn-large" data-bs-backdrop='static' data-bs-keyboard="true" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</button>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function myFunction() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>
  </body>
</html>
