<?php
function filter($post)
{
    if (is_array($post)) {
        return array_map('filter', $post);
    }
    return htmlspecialchars(trim($post));
}

$_POST = array_map('filter', $_POST);

function post($name)
{
    if (isset($_POST[$name])) {
        return $_POST[$name];
    }
}

function isValid()
{
    $errors = '';
    foreach ($_POST as $key => $item) {
        if (isEmpty($key)) {
            $errors .= '* ' . $key . ' alanını doldurunuz <br>';
        };

        if ($key === 'email') {
            if (!filter_var($item, FILTER_VALIDATE_EMAIL)) {
                // invalid emailaddress
                $errors .= '* Lütfen gecerli bir email adresi giriniz <br>';
            }
        }
      
    }
    return $errors;
}

function isEmpty($name)
{
    if (empty($_POST[$name])) {
        return true;
    }
    return false;
}

if (isset($_POST['login'])) {
    echo isValid();
}
if (isset($_POST['register'])) {
    echo isValid();
}


session_start();

if(file_exists('test.txt')){
    $file = fopen('test.txt', 'r');
    $str = fgets($file);
    $ad = explode("<br>",$str);

    echo '<br>'; 
    array_shift($ad);

    $arr= [];
    $i=0;
    print_r($ad);
    foreach ($ad as $key => $value) {
        if ($key%3 == 0)  {
            $arr[$i]['username']=$ad[$key+1];
            $arr[$i]['password']=$ad[$key+2];
            $i++;
        }
    }

    fclose($file);

    print_r($arr);
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        echo "$username";

    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<div style="margin-left: 150px; width: 900px">

    <div style="width: 400px; float: left">
    <h1><a href="login.php">Login</a></h1>
    </div>
    <div style="width: 400px; float: left">
    <h1><a href="register.php">Register</a></h1>        
    </div>
    <div style="margin-left: 200px; width: 400px">
    <h1><a href="logout.php">ÇIKIŞ</a></h1>
    </div>
 

</div>


    



</body>
</html>

