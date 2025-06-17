<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <form method="POST" id="formCadastro">
        <input type="text" name="nome" id="" placeholder="nome">
        <br>
        <input type="number" name="idade" id="" placeholder="idade">
        <br>
        <input type="email" name="email" id="" placeholder="email">
        <br>
        
        <button name="REQUEST_METHOD" type="submit">CADASTRAR</button>
    </form>

    <div id="listaUsuarios">
        <?php include 'busca-usuario.php'; ?>
    </div>
</body>

<script src="cadastrar.js"></script>
<script src="carregarLista.js"></script>
</html>