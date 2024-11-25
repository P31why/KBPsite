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
        <br>
            <a href="RegistrationPage.php">Войти</a>
        </br>
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(!empty($_POST['loginA']) && !empty($_POST['passwordA'])){
                try{
                    $connection=new PDO ("mysql:host=127.127.126.25;port=3306;dbname=UsersSite","root","");
                    $login=$_POST['loginA'];
                    $password=$_POST['passwordA'];
                    $query=$connection->prepare('SELECT * FROM UsersKBP WHERE userName = ?');
                    $query->execute([$login]);
                    $user=$query->fetch(PDO::FETCH_ASSOC);
                    if($user){
                        if($password==$user['userPassword']){
                            echo "вы успешно вошли";
                        }
                        else echo "ошибка";
                    }
                    else echo "такого пользователя нет";
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
            else echo "введите данные в поля";
        }

        ?>
    </body>
</html>