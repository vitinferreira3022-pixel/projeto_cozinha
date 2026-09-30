<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cardápio Especial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-secondary text-white">
    <header class="border-bottom px-3 py-2 d-flex gap-2 align-items-center">
        <h1 class="h5 fw-bold m-0 me-2">Cozinha Virtual</h1>
        <a href="inicio_aluno" class="btn btn-dark btn-sm">INÍCIO</a>
    </header>
    <main class="container text-center py-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="h4 fw-bold mb-4">CARDÁPIO ESPECIAL</h2>
                <div class="text-start">
                    <div class="mb-3">
                        <label for="cafe" class="form-label small mb-0">Café da Manhã</label>
                        <input type="text" id="cafe" class="form-control" placeholder="Mude aqui o alimento">
                    </div>
                    <div class="mb-3">
                        <label for="almoco" class="form-label small mb-0">Almoço</label>
                        <input type="text" id="almoco" class="form-control" placeholder="Mude aqui o alimento">
                    </div>
                    <div class="mb-3">
                        <label for="tarde" class="form-label small mb-0">Café da Tarde</label>
                        <input type="text" id="tarde" class="form-control" placeholder="Mude aqui o alimento">
                    </div>
                </div>
                <button type="button" class="btn btn-dark btn-sm">ENVIAR O PEDIDO</button>
            </div>
        </div>
    </main>
</body>

</html>
