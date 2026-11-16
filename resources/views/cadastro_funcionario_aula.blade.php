<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Login</title> 
</head>
<body>
    <h3 class="text-center">Cadastro de Funcionário</h3>
    <div class="row mt-3 justify-content-center d-flex">
        <div class="col-6 row">
            <div class="mb-3 col-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control form-control-sm" id="nome" placeholder="Escreva aqui...">
            </div>

            <div class="mb-3 col-6">
                <label for="email2" class="form-label">Email</label>
                <input type="email" class="form-control form-control-sm" id="email2" placeholder="Escreva aqui...">
            </div>
            <div class="mb-3 col-6">
                <label for="senha2" class="form-label">Senha</label>
                <input type="password" class="form-control form-control-sm" id="senha2" placeholder="Escreva aqui...">
            </div>
            <div class="mb-3 col-6">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control form-control-sm" id="cpf" placeholder="Escreva aqui...">
            </div>
            <div class="mb-3 col-6">
                <label for="nif" class="form-label">NIF</label>
                <input type="text" class="form-control form-control-sm" id="nif" placeholder="Escreva aqui...">
            </div>
            <div class="mb-3 col-6">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control form-control-sm" id="data_nascimento">
            </div>
            
            <div class="mb-3 col-6">
                <label for="telefone" class="form-label">Usuário</label>
                <select class="form-control form-control-sm" id="usuario" name="usuario">
                @foreach ($funcionarios as $f)
                    <option value="{{ $f->id }}">{{ $f->nome }}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3 col-6">
                <button type="button"class="btn btn-dark btn-sm mt-2" id="cadastrar">Cadastrar</button>
            </div>
        </div>
    </div>
</body>
</html>