<!DOCTYPE html>
<html>
    <head>
        <title>Регестрация</title>
    </head>
    <body>
        <h2>Регестрация</h2>
        <form method="POST" action="#" autocomplete="off">
            Логин (Ваше имя)<input name="loginR" type="text"><br><br>
            Пароль <input name="passwordR" type="text"><br><br>
            <input type="submit" value="Зарегестрироватиься">
        </form>
        <br>
            <a href="LoginPage.php">Войти</a>
        </br>
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['loginR']) && isset($_POST['passwordR'])){
                    try{
                        $connection=new PDO ("mysql:host=127.127.126.25;port=3306;dbname=UsersSite","root","");
                        $name=$_POST['loginR'];
                        $name=strip_tags($name);
                        $password=$_POST['passwordR'];
                        $password=strip_tags($password);
                        $query="INSERT INTO UsersKBP (userName,userPassword)VALUES('$name','$password')";
                        $connection->exec($query);
                        echo "Вы успешно зарегестрировались!!!";
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
            }
        ?>
    </body>
</html>