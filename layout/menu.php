    <nav>
        <div class="topnav" id="myTopnav">
            <a href="index.php">HOME</a>
            <a href="projects.html">PROJECT</a>
            <a href="?action=about">ABOUT</a>
            <!-- <a href="?action=registration">REGISTRATION</a> -->
            <!-- <a href="location.html">LOCATION</a> -->
            <?php
            if(isset($_SESSION["MyID"])){
                // echo "<a href='?action=create_news' class='aaa aaa1'>Додати новину</a> <br> <br>";
                echo "<a href='?action=sessionEnd' >LOG OUT</a>";
                if($_SESSION["MyAdm"] == 1)
                    echo "<p>Ви увійшли під адміном</p>";
                else
                    echo "<p>Ви увійшли під простим юзером</p>";
            }
            else{
                echo "<a href='?action=registration' >REGISTRATION</a>";
                echo "<a href='?action=login' >SIGH UP</a>";
            }
            ?>
            <a id="menu" href="#" class="icon">&#9776;</a>
            <br>
            
        </div>
    </nav>
</header>