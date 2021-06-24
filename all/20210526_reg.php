
<html>
<body>
    <div>Szia <?php echo $user; ?></div>
    <form action='' method='post'>
    Name: <input type='text' name='name'><br>
    E-mail: <input type='text' name='email'><br>
    <input type='submit' value='Regisztrálok'>
    </form>

</body>
</html>


<?php

$user=$_POST['name'];

?>