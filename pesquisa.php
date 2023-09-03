<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||Pesquisa</title>
    </head>
    <body>

        <h1>Pesquisa</h1>
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

    </body>
</html>

<?php
    include_once("assets/php/conexao.php");

    $sql = "SELECT id_cuidador FROM cuidador INNER JOIN agenda ON cuidador.id_cuidador = agenda.id_cuidador WHERE 1";

    if (!empty($nome)) {
        $sql .= " AND nome LIKE '%$nome%'";
    }

    if (!empty($cidade)) {
        $sql .= " AND cidade = '$cidade'";
    }

    if (!empty($estado)) {
        $sql .= " AND estado = '$estado'";
    }

    if (!empty($turno)) {
        $turnoArray = implode("', '", $_POST['turno']);
        $sql .= " AND agenda.turno IN ('$turnoArray')";
    }

    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $id = array();
        while ($dadosUsuario = mysqli_fetch_assoc($result)) {
            $id[] = $dadosUsuario['id_cuidador'];
        }
        foreach ($id as $cuidadorId) {
            $sqlDados = mysqli_query($con, "SELECT nome, email, estado, cidade FROM cuidador WHERE id_cuidador='$cuidadorId'");
            while ($dadosUsuario = mysqli_fetch_assoc($sqlDados)) {
                $nome = $dadosUsuario['nome'];
                $email = $dadosUsuario['email'];
                $estado = $dadosUsuario['estado'];
                $cidade = $dadosUsuario['cidade'];
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
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
?>