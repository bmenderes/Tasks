
<?php 
include 'index.php';


?>

<div style="margin-left: 250px; width: 400px">

        <form action="" method="POST">
        Name Surname: <input type="text" name="nameSurname" value="<?php echo post('nameSurname'); ?>">
         <br>
        Username(Email): <input type="email" name="username" value="<?php echo post('username'); ?>">
        <br>
        Password : <input type="password" name="password">
            <br>
        Password again : <input type="password" name="confirm_password">
        <br>
        <input type="hidden" name="register" value="2">
        <button type="submit">Register
        </button>
            <?php    
          /*   echo '<br>';
            echo $_POST['password'];
            echo '<br>';
            echo $_POST['confirm_password']; */
            
            if (isset($_POST['register'])){
                if($_POST['password'] === $_POST['confirm_password']){
                    $file = fopen('test.txt', 'a+');
                    fwrite($file,'<br>'. $_POST['nameSurname'].'<br>');
                    fwrite($file, $_POST['username'].'<br>');
                    fwrite($file, $_POST['password']).'<br>';
                    fclose($file);
                    echo '<br>';
                    echo 'Sistem kaydınız yapılıyor lütfen bekleyiniz...';
                    header("Refresh:2; url=index.php");
                }
                    if($_POST['password'] !== $_POST['confirm_password']){
                        echo '<br>';
                        echo '* Hatalı şifre girişi.. <br>';
            
                }

            
            }

           /*      if (isset($_POST['register'])){
                $file = fopen('test.txt', 'a+');
            fwrite($file,'<br>'. $_POST['nameSurname'].'<br>');
            fwrite($file, $_POST['username'].'<br>');
            fwrite($file, $_POST['password']).'<br>';
            fclose($file);
            echo '<br>';
            echo 'Sistem kaydınız yapılıyor lütfen bekleyiniz...';
            header("Refresh:2; url=index.php");
            }
 */

   ?>       
            
    </form>
    </div>