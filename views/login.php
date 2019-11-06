<?php
  $errorMsg="";
  if(isset($_POST["send"])){
    $error=false;
    $loginFlag=false;
    $passwordFlag=false;
    $login=htmlspecialchars ($_POST["login"]);
    $password=htmlspecialchars ($_POST["password"]);
    $MyID;
    $MyAdm;

        include_once "views/sql_include.php";
        $MyData = new mysqli($host, $user, $pass, $database);
    $MyData->query("SET NAMES 'utf8'");
    $result = $MyData->query("SELECT login, id, admin, password FROM users WHERE login = '$login'");
        if($result->num_rows == 0)
        {
            $errorMsg="Неправильний логін, або пароль!";
        } else {
            $row = $result->fetch_assoc();
            $loginFlag=true;
            $MyID=$row["id"];
            $MyAdm=$row["admin"];
            if(password_verify($password, $row['password'])){
                $passwordFlag = true;
            }
        }

    if($passwordFlag==false||$loginFlag==false){
      $error=true;
      $errorMsg="Неправильний логін, або пароль!";
    }
    $MyData->close();

    if($error==false){
      $_SESSION["MyLogin"]=$login;
      $_SESSION["MyID"]=$MyID;
      $_SESSION["MyAdm"]=$MyAdm;
      echo "<script>location.assign('index.php')</script>";
      exit;
    }
  }
?>
<!-- <style>
  label{
    width: 150px;
    display: inline-block;
  }
  form{
        float: left;
    background: rgba(255,255,255,0.7);
    padding: 20px;
    border-radius: 30px;
  }
</style> -->

<form class="form" action="" method="post" name="MyForm" >
  <span><?=$errorMsg?></span>
  <p>
    <!-- <label for="login">Логін:</label> -->
    <input class="registration" name="login" type="text" placeholder="Введіть логін...">
  </p>
  <p>
    <!-- <label for="password">Пароль:</label> -->
    <input class="registration" name="password" type="password" placeholder="Введіть пароль...">
  </p>

  <p>
    <input class="button-sing-up" name="send" type="submit" value="Увійти">
  </p>
</form>