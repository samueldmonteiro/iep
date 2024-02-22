<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Acesso Admin IEP</title>
        @vite('resources/styles/admin/styles.css')
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Acesso IEP</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="{{route('admin.login')}}">
                                            @csrf
                                            @if($errors->all())
                                                <div class="alert text-center alert-danger">{{$errors->all()[0]}}</div>
                                            @endif
                                            <div class="form-floating mb-3">
                                                <input name="username" class="form-control" id="username" type="text" placeholder="name@example.com" value="{{old('username')}}"/>
                                                <label for="inputEmail">Nome de Usuário</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="password" class="form-control" id="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Senha</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Acessar</button>
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
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">IEP</div>
                            <div>
                                <a href="{{route('front.index')}}">Home</a>
                                &middot;
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        @vite('resources/js/admin/admin.js')
    </body>
</html>
