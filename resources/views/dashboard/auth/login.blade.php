<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="col-12 my-3">
                <img style="width: 100%;" src="{{Storage::url('public/img/assets/siomah.png')}}" alt="">
            </div>
            <ul class="nav nav-pills mx-auto">
                <li class="nav-item"><a class="nav-link active" href="#super_admin" data-toggle="tab">Masuk Super Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="#admin" data-toggle="tab">Masuk Admin</a></li>
            </ul>
            <div class="card-body my-3">
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="super_admin">
                            <form action="{{ route('auth.process') }}" method="post">
                                @method('POST')
                                @csrf
                                <input type="hidden" name="role_id" value="1">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('username') invalid @enderror" name="username" placeholder="Username">
                                    @error('username')<p class="text-sm text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control @error('password') invalid @enderror" name="password" placeholder="Password">
                                    @error('password')<p class="text-sm text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-danger w-1">Login</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
        
                        <div class="tab-pane" id="admin">
                            <form action="{{ route('auth.process') }}" method="post">
                                @method('POST')
                                @csrf
                                <input type="hidden" name="role_id" value="2">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control @error('username') invalid @enderror" name="username" placeholder="Username">
                                    @error('username')<p class="text-sm text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control @error('password') invalid @enderror" name="password" placeholder="Password">
                                    @error('password')<p class="text-sm text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-danger w-1">Login</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>

</html>