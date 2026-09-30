<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-secondary text-white">
    <header class="border-bottom px-3 py-2 d-flex gap-2 align-items-center">
        <h1 class="h5 fw-bold m-0 me-2">Cozinha Virtual</h1>
        <a href="inicio" class="btn btn-dark btn-sm">INÍCIO</a>
        <a href="login_aluno" class="btn btn-dark btn-sm">ENTRAR</a>
    </header>
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h1 class="h1 fw-bold">CADASTRAR</h1>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="nome" class="form-label small mb-0">Nome</label>
                    <input type="text" id="nome" class="form-control" placeholder="Escreva aqui...">
                </div>
                <div class="mb-3">
                    <label for="data_nascimento" class="form-label small mb-0">Data de Nascimento</label>
                    <input type="date" id="data_nascimento" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label small mb-0">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Escreva aqui...">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label small mb-0">Senha</label>
                    <input type="password" id="senha" class="form-control" placeholder="Escreva aqui...">
                </div>
                <div class="mb-3">
                    <label for="cpf" class="form-label small mb-0">CPF</label>
                    <input type="text" id="cpf" class="form-control" placeholder="Escreva aqui...">
                </div>
                <div class="mb-3">
                    <label for="nif" class="form-label small mb-0">NIF</label>
                    <input type="text" id="nif" class="form-control" placeholder="Escreva aqui...">
                </div>
                <div class="text-center"><a href="inicio_funcionario" class="btn btn-dark btn-sm">ENTRAR</a></div>
            </div>
        </div>
    </main>
</body>

</html>
