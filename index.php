<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.1/dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.1/dist/js/bootstrap.min.js"></script>
    <title>login</title>
   
</head>
<body onselectstart ="return false" ondragstart="return false" oncontextmenu="return false">

    <link rel="stylesheet" href="estilos.css">
    <nav class="navbar navbar-expand-lg navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">[Sistema Escolar]</a>
        </div>
    </nav>

    <div class="container" style="margin-top: -90px; margin-bottom: -100px;">
        <?php
            require_once "conextion.php";
            session_start();

            /*========================================================
            *           Filtrando os dados e validando os dados      *
            =========================================================*/
           
          if(!isset($_POST['access'])){
          }else{
            $user = mysqli_escape_string($conexion, $_POST['userlogin']);
            $pass = mysqli_escape_string($conexion, $_POST['password']);
            $erros = array();
            if(empty($user) || empty($pass)){
                $erros[] = "Por favor preencha todos os campos ";
            }else{
                $sql = "SELECT user FROM USER WHERE user = '$user'";
                $result = mysqli_query($conexion, $sql);
              //fechar a conexão?
                if(mysqli_num_rows($result) > 0){
                    //criptografar
                    $sql = "SELECT * FROM user WHERE  user = '$user' AND pass = '$pass'";
                    $result = mysqli_query($conexion, $sql);
                   //fechar a conexão
                    if(mysqli_num_rows($result) == 1){
                        $dados = mysqli_fetch_array($result);
                        $_SESSION['logado'] = true;
                        $_SESSION['id_user'] = $dados['id'];
                        header('Location: home.php');
                    }else{
                        $erros[] = "Usuário ou Senha inválida";
                    }
                }else{
                    $erros[] = "Usuário inválido";
                }
            }
          }   
        ?>
        <div class="row">
            <div class="col-sm-12 col-md- 12 ">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="box">
                    <h1>Login</h1>
                    <hr>
                    <?php
                        if(!empty($erros)){
                            foreach($erros as $show_error){
                                echo "<span style='color: #f56363'>$show_error </span>";
                            }
                        }else{

                        }
                    ?>
                    <div class="mb-3">
                        <label for="user" class="form-label">User</label>
                        <input type="text" name="userlogin"  class="form-control" autocomplete="off" autocapitalize="off">
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Pass</label>
                        <input type="password" name="password" class="form-control" autocomplete="off" autocapitalize="off">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="check"  class="form-check-input">
                        <label for="check" class="form-check-label">Lembrar de mim</label>
                    </div>

                    <div class="mb-3 center">
                        <button type="submit" name="access" class="btn btn-primary ">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section id="footer" style="height: 1px;">
              <div class="container"> 
                  <hr>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-black">
                    <p class="text-green ml-2">&copy All right Reserved alien Development</p>
                  </div>
                  </hr>
                </div>  
              </div>
      </section>
    
</body>
</html>