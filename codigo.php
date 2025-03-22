<?php
// Inclui as informações do banco de dados
include("/var/www/inc/dbinfo.inc");

// Verifica se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Se houver um envio de formulário (POST), processa os dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $numero_camisa = $_POST["numero_camisa"];
    $time = $_POST["time"];
    $posicao = $_POST["posicao"];
    $idade = $_POST["idade"];

    // Query para inserir o jogador
    $sql = "INSERT INTO jogadores (nome, numero_camisa, time, posicao, idade) 
            VALUES ('$nome', '$numero_camisa', '$time', '$posicao', '$idade')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Jogador cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Erro: " . $conn->error . "</p>";
    }
}

// Consulta a tabela de jogadores
$result = $conn->query("SELECT * FROM jogadores");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Jogadores</title>
</head>
<body>

<h2>Cadastrar Jogador</h2>
<form method="POST">
    Nome: <input type="text" name="nome" required><br><br>
    Número da Camisa: <input type="number" name="numero_camisa" required><br><br>
    Time: <input type="text" name="time" required><br><br>
    Posição: 
    <select name="posicao">
        <option value="Goleiro">Goleiro</option>
        <option value="Zagueiro">Zagueiro</option>
        <option value="Meio-campista">Meio-campista</option>
        <option value="Atacante">Atacante</option>
    </select><br><br>
    Idade: <input type="number" name="idade" required><br><br>
    <input type="submit" value="Cadastrar">
</form>

<h2>Lista de Jogadores</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Número da Camisa</th>
        <th>Time</th>
        <th>Posição</th>
        <th>Idade</th>
    </tr>
    
    <?php 
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['numero_camisa']}</td>
                    <td>{$row['time']}</td>
                    <td>{$row['posicao']}</td>
                    <td>{$row['idade']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Nenhum jogador cadastrado.</td></tr>";
    }
    ?>
</table>

</body>
</html>

