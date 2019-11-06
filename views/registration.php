<?php
$errorF = false;
$errorLogin = $errorPassword = $errorPassword1 = $errorEmail = $lgError = "";

if(!empty($_POST)) {
    if(empty($_POST["login"])){
        $errorLogin="Потрібно ввести ім'я";
        $errorF = true;
    } else {
        if(!preg_match("/^[-_0-9a-zA-Zа-яА-Я]{4,}$/", $_POST["login"])) {
            $errorLogin ="Не менше 4 літер, може містити лише латинські та кириличні літери (великі та малі), цифри, нижнє підкреслення та дефіс";
            $errorF = true;
        }
    }

    if(empty($_POST["password"])){
        $errorPassword="Потрібно ввести пароль";
        $errorF = true;
    } else {
        if(!preg_match("/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,})$/", $_POST["password"])) {
            $errorPassword="Не менше 7 літер, обов’язково має містити великі та малі літери, а також цифри";
            $errorF = true;
        }
    }

    if(empty($_POST["repeat_password"])) {
        $errorPassword1="Потрібно повторити пароль";
        $errorF = true;
    } else {
        if ($_POST["password"]!=$_POST["repeat_password"]) {
            $errorPassword1="Паролі не співпадають.";
            $errorF = true;
        }
    }

    if(empty($_POST["email"])){
        $errorEmail="Потрібно ввести email";
        $errorF = true;
    } else {
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errorEmail="Некоректно введено email";
            $errorF = true;
        }
    }

    if(empty($_POST["language"])){
        $lgError="Без вибраної мови ти не ввійдеш.";
        $errorF = true;
    }

    if ($errorF == false){
        $login=$_POST["login"];
        $password=$_POST["password"];
        $pass_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $email=$_POST["email"];
        $lang=$_POST["language"];
        //---------MySQL-----------
        include_once "views/sql_include.php";
        $MyData = new mysqli($host, $user, $pass, $database);
        $MyData->query("SET NAMES 'utf8'");
        $MyData->query("INSERT INTO `users` (`login`, `password`, `email`, `language`) VALUES ('$login', '$pass_hash', '$email', '$lang')");
        $MyData->close();
        //-------------------------
        echo "<p class = 'done'>Ви успішно зареєструвались. <br> <a href='?action=main'>На головну.</a></p>";
        include_once 'layout/footer.php';
        exit();
    }


}


?>
<main>
    <form class=form action="" method="POST">
    <label><input type="text" name="login" class="registration" placeholder="Login" id="login" value=""> </label>
        <span> <?php echo $errorLogin;?>*</span>
        <br><br>
            
        <label><input type="password" name="password" class="registration" placeholder="Password" id="password" value=""> </label>
            <span>* <?php echo $errorPassword;?></span>
            <br><br> 

        <label><input type="password" name="repeat_password" class="registration" placeholder="Repeated Password" id="reapeatedPassword" value=""> </label> 
            <span>* <?php echo $errorPassword1;?></span>
            <br><br>

        <label><input type="email" name="email" class="registration" placeholder="E-mail" id="e-mail"> </label>  
        <span>* <?php echo $errorEmail;?></span>
        <br><br> 

        <select name="language" id="language">
            <option value='0'>Оберіть мову</option>
            <?php
                $language = fopen("Language.txt","r");
                $twoLiter = fopen("TwoLiter.txt","r");
                while(! feof($language)){
                   echo"<option value='".fgets($twoLiter)."'>".fgets($language)."</option><br/>";
                }
                fclose($language);
                fclose($twoLiter);
            ?>
        </select>
        <span> <?php echo $lgError;?></span>
        <br><br>
        <input type="submit" value="Sign up" class="button-sing-up">
        <div class="easy"></div>
    </form>
</main>
