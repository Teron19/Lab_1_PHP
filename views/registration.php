<main>
    <form class="form">                            
        <label><input type="text" name="name" class="registration" placeholder="Login" id="login"> </label>
        <label><input type="text" name="name" class="registration" placeholder="Password" id="password"> </label> 
        <label><input type="text" name="name" class="registration" placeholder="password" id="login"> </label> 
        <label><input type="text" name="name" class="registration" placeholder="E-mail" id="login"> </label> 
        <label><input type="text" name="name" class="registration" placeholder="Login" id="login"> </label> 
        <select class="registration">
            <option>Оберіть мову</option>
            <?php
                $lg = include("top.php");
                echo "<H2>...Основная часть...</H2>";
            ?>
            <option><?php $lg ?></option>
        </select>
        <input type="submit" value="Sign up" class="button-sing-up">
        <div class="easy"></div>
    </form>
</main>