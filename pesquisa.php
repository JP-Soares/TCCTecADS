<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="assets/img/icon.png" type="image/x-icon">

        <link rel="stylesheet" href="assets/style/stylePesquisa.css" />
        <link rel="stylesheet" href="assets/style/btnVoltar.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agdasima&family=M+PLUS+Rounded+1c:wght@900&family=Mitr:wght@300&display=swap" rel="stylesheet">

        <title>HelpOlder||Pesquisa</title>
    </head>
    <body>

        <a class="btnVoltar" onclick="goBack();"><img class="imgBtnVoltar" src="assets/img/voltar.png" /></a>

        <h1>Pesquisa</h1>
        <div class="container-pesquisa">
            <form name="" method="POST" action="">

                <input type="text" name="nome" placeholder="Buscar por nome"/><br><br>
                <input type="text" name="cidade" placeholder="Buscar por cidade"/><br><br>
                <select id="estado" name="estado">
                            <option value="null">Buscar por estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                </select><br><br>

                <label>Turnos:</label><br>
                <label>Manhã</label><input type="checkbox" value="m" name="turno[]" /><br>
                <label>Tarde</label><input type="checkbox" value="t" name="turno[]" /><br>
                <label>Noite</label><input type="checkbox" value="n" name="turno[]" /><br>

                <button type="submit">Buscar!</button>

            </form>
        </div>

        <script src="assets/js/btnVoltar.js"></script>
    </body>
</html>

<?php
// Inclua o arquivo de conexão com o banco de dados
include_once("assets/php/conexao.php");

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recupere os valores do formulário
    $nome = isset($_POST['nome']) ? mysqli_real_escape_string($con, $_POST['nome']) : '';
    $cidade = isset($_POST['cidade']) ? mysqli_real_escape_string($con, $_POST['cidade']) : '';
    $estado = isset($_POST['estado']) ? mysqli_real_escape_string($con, $_POST['estado']) : '';
    $turno = isset($_POST['turno']) ? $_POST['turno'] : [];

    // Construa a consulta SQL usando DISTINCT para selecionar registros únicos
    $sql = "SELECT DISTINCT cuidador.id_cuidador, cuidador.nome, cuidador.email, cuidador.estado, cuidador.cidade 
    FROM cuidador 
    INNER JOIN agenda ON cuidador.id_cuidador = agenda.id_cuidador 
    LEFT JOIN consulta ON cuidador.id_cuidador = consulta.id_cuidador
    WHERE consulta.id_agenda IS NULL";


    if (!empty($nome)) {
        $sql .= " AND cuidador.nome LIKE '%$nome%'";
    }

    if (!empty($cidade)) {
        $sql .= " AND cuidador.cidade = '$cidade'";
    }

    if (!empty($estado) && $estado != 'null') {
        $sql .= " AND cuidador.estado = '$estado'";
    }

    if (!empty($turno)) {
        $turnoArray = implode("', '", $turno);
        $sql .= " AND agenda.turno IN ('$turnoArray')";
    }

    // Execute a consulta SQL
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($dadosUsuario = mysqli_fetch_assoc($result)) {
            $nome = $dadosUsuario['nome'];
            $email = $dadosUsuario['email'];
            $estado = $dadosUsuario['estado'];
            $cidade = $dadosUsuario['cidade'];
            $cuidadorId = $dadosUsuario['id_cuidador'];
            ?>
            <!-- Exibe os dados do cuidador --> 
            <div>
                <p>Nome: <?php echo $nome; ?></p>
                <p>E-mail: <?php echo $email; ?></p>
                <p>Estado: <?php echo $estado; ?></p>
                <p>Cidade: <?php echo $cidade; ?></p>
                <p><a href="perfilBusca.php?idCuidador=<?php echo $cuidadorId; ?>">Contratar!</a></p><br><br>
            </div>
            <?php
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
}
?>