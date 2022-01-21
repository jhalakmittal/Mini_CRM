<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="{{asset('public')}}/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                     <div class="card-body">

                                        @if(Session::has('msg'))
                                        <p class="text-danger">{{session('msg')}}</p>
                                        @endif
                                        @if($errors->any())
                                            @foreach($errors->all() as $error)
                                            <p class="text-danger">{{$error}}</p>
                                            @endforeach
                                        @endif
                                        <form method="post" action="{{url('admin/login')}}">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="xyz@abc.com" />
                                                <label for="inputEmail">Email ID</label>
                                            </div>
                                 
                                            <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password"/>
                        <label for="inputPassword">Password</label>
                        
                    </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                                <input type="submit" class="btn btn-primary" value="Login"/>
                                            </div>
                                        </form>
                                    
                 <!-- <form action=" {{ url('admin/login')}} " method="post">
                @csrf

                @if(Session::get('fail'))
                    <div class="alert alert-danger" role="alert"> 
                     {{ Session::get('fail') }} 
                    </div>
                @endif
                    <div class="form-group form-floating mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Email"/>
                        <label for="inputEmail">Email</label>
                        @error('email')
                      <div class="alert alert-danger" role="alert"> 
                     {{ $message }} 
                    </div> 
                    @enderror
                    </div>
                    <div class="form-group form-floating mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password"/>
                        <label for="inputPassword">Password</label>
                        @error('password')
                      <div class="alert alert-danger" role="alert"> 
                     {{ $message }} 
                    </div> 
                    @enderror
                    </div>
                    <div class="form-group form-floating mb-3">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form> -->
                </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Rees 2021</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('public')}}/js/scripts.js"></script>
    </body>
</html>
