<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HelpOlder||AgednaPessoal</title>
    </head>
    <body>
    <button onclick="goBack();">Voltar</button>
        <div id="container-agenda">
            <form id="form" name="" method="POST" action="assets/php/cadastrarAgenda.php">
                <h1>Faça sua programação semanal</h1>

                <table border="1">
                    <tr>
                        <td><p>Domingo</p></td>
                        <td><p>Segunda-Feira</p></td>
                        <td><p>Terça-Feira</p></td>
                        <td><p>Quarta-Feira</p></td>
                        <td><p>Quinta-Feira</p></td>
                        <td><p>Sexta-Feira</p></td>
                        <td><p>Sábado</p></td>
                    </tr>

                    <tr>
                        <td><label>Manhã<label><input type="checkbox" /><br><label>Tarde<label><input type="checkbox" /><br><label>Noite<label><input type="checkbox" /></td>
                        <td><label>Manhã<label><input type="checkbox" /><br><label>Tarde<label><input type="checkbox" /><br><label>Noite<label><input type="checkbox" /></td>
                        <td><label>Manhã<label><input type="checkbox" /><br><label>Tarde<label><input type="checkbox" /><br><label>Noite<label><input type="checkbox" /></td>
                        <td><label>Manhã<label><input type="checkbox" /><br><label>Tarde<label><input type="checkbox" /><br><label>Noite<label><input type="checkbox" /></td>
                        <td><label>Manhã<label><input type="checkbox" /><br><label>Tarde<label><input type="checkbox" /><br><label>Noite<label><input type="checkbox" /></td>
                        <td><label>Manhã<label><input type="checkbox" /><br><label>Tarde<label><input type="checkbox" /><br><label>Noite<label><input type="checkbox" /></td>
                        <td><label>Manhã<label><input type="checkbox" /><br><label>Tarde<label><input type="checkbox" /><br><label>Noite<label><input type="checkbox" /></td>
                    </tr>

                </table><br><br>
                
                <button id="btnEnviar" type="submit">Confirmar!</button>

            </form>
        </div>

        <script src="assets/js/btnVoltar.js"></script>

    </body>
</html>