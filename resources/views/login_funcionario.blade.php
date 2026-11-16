<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"
        integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/js/login.js')
</head>

<body class="bg-secondary text-white">
    <header class="border-bottom px-3 py-2 d-flex gap-2 align-items-center">
        <h1 class="h5 fw-bold m-0 me-2">Cozinha Virtual</h1>
        <a href="inicio" class="btn btn-dark btn-sm">INÍCIO</a>
        <a href="cadastro_funcionario" class="btn btn-dark btn-sm">CADASTRAR</a>
    </header>
    <main class="container text-center py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="h4 fw-bold mb-4">ENTRAR</h2>
                <div class="text-start">
                    <div class="mb-3">
                        <label for="email" class="form-label small mb-0">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Escreva aqui...">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label small mb-0">Senha</label>
                        <input type="password" id="senha" class="form-control" placeholder="Escreva aqui...">
                    </div>
                </div>
                <a id="entrar" class="btn btn-dark btn-sm">ENTRAR</a>
            </div>
        </div>
    </main>
</body>

</html>
