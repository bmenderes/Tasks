
<?php 
include 'index.php';


?>

<div style="margin-left: 250px; width: 400px">
<form action="" method="post">
            Username(email): <input type="text" name="email" value="<?php echo post('email'); ?>" placeholder="Email ">
            <br>
            Password : <input type="password" name="password">
            <br>
            <input type="hidden" name="login" value="1">
            <button type="submit">Login
         
            </button>
        </form>

        <?php
        $error = '';

        if (isset($_POST['login'])) {
          


        
            $username = $_POST['email'];
            $password = $_POST['password'];

           /*  if(in_array($username,$arr1) && in_array($password,$arr2)) {
               echo 'kullanıcı vardır.';

            } */
        
            if (!$username || !$password) {
                $error = 'Lütfen kullanıcı adı yada şifre giriniz';
            } elseif (!in_array($username,$arr1)) {
                $error = 'Lütfen kullanıcı adınızı kontrol ediniz';
            } elseif (!in_array($password,$arr2)) {
                $error = 'Lütfen şifrenizi kontrol ediniz';
            } else {

                foreach ($arr as $item) {
                    if($item['username']===$username && $item['password']===$password){
                        return true;
                    }
                }
                $_SESSION['username'] = $username;
                // header('Location:index.php');
                echo "$username";
                echo '<br>';
                echo 'Lütfen bekleyiniz.Yönlendiriliyorsunuz...';
                header("Refresh:2; url=index.php");
            }
        
        }
        echo $error;
        
        ?>

</div>        
