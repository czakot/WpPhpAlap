<nav>
    <?php
        if(isset($_SESSION["user_data"]["right_id"]) && $_SESSION["user_data"]["right_id"] == USER_RIGHT_ID_ADMIN){
            echo '<a href="?menu=felhasznalo">Felhasználók</a>';
        }
    ?>
    <a href="?menu=konyvek">Könyvek</a>
    <?php
        if(isset($_SESSION["user_data"]["right_id"]) && $_SESSION["user_data"]["right_id"] == 1){
            echo '<a href="?menu=szerzok">Szerzők</a>
            <a href="?menu=mufajok">Műfajok</a>';
        }
    ?>
</nav>