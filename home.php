<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <script src="materialize/js/materialize.min.js"></script>
    <title>home</title>
    <?php
        require_once "conextion.php";
        session_start();
        if(!$_SESSION['logado']):
            header('Location: index.php');
        endif;
        $id = $_SESSION['id_user'];
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($conexion, $sql );
        $dados = mysqli_fetch_array($result);
    ?>
</head>
<body  ondragstart="return false" oncontextmenu="return false">
    <?php
        include_once "includes/navbar.php";
    ?>
    <div class="row">
        <div class="col s12 m6 push-m3 ">
            <h3 class="light">clientes</h3>
            <table class="striped">
                <thead>
                    <tr>
                        <th>Nome:</th>
                        <th>Sobrenome:</th>
                        <th>Email:</th>
                        <th>Idade:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sulamita</td>
                        <td>Miguel</td>
                        <td>sulamita@gmail.com</td>
                        <td>19</td>
                        <td> <a href="" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                        <td> <a href="" class="btn-floating red"><i class="material-icons">delete</i></a></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <a href="" class="btn ">Adicionar Clientes</a>
        </div>
    </div>
    <?php
        include_once "includes/footer.php";
    ?>
</body>
</html>