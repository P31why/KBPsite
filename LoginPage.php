<!DOCTYPE html>
<html>
    <head>
        <title>Авторизация</title>
    </head>
    <body>
        <h2>Авторизация</h2>
        <form method="POST" action="#" autocomplete="off">
            Логин <input name="loginA" type="text"><br><br>
            Пароль <input name="passwordA" type="text"><br><br>
            <input type="submit" value="Войти">
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['loginA']) && isset($_POST['passwordA'])){
                try{
                    $connection=new PDO ("mysql:host=127.127.126.25;port=3306;dbname=UsersSite","root","");
                    $login=$_POST['loginA'];
                    $password=$_POST['passwordA'];
                    $query="SELECT * FROM UsersKBP WHERE userName='$login' and userPassword='$password'";
                    if($connection->query($query)){
                        echo "Вы успешно вошли!!!";
                    }
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
        }

        ?>
    </body>
</html>