<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="{{asset('public/dist')}}/">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Chào Mừng Bạn Đến Coron</h3></div>
                                    <div class="card-body">
                                        <form  role="form" method="post">
                                           @include('errors.note')
                                            <div class="form-group">
                                                <label  class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" value="{{old('email')}}" type="email" name="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label  class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="Remember" class="custom-control-input" id="rememberPasswordCheck" type="checkbox" value="Remember" />
                                                    <label class="custom-control-label"  for="rememberPasswordCheck">Nhớ Tài Khoản</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                               <input type="submit" name="submit" class="btn btn-primary" value="Đăng Nhập">
                                            </div>
                                               {{csrf_field()}}
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Tuấn Tâm IT &copy;</div>
                        \
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
