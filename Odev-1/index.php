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
/*empty('');      // true
empty('0');     // true
empty(0);       // true
empty(null);    // true
empty([]);      // true
empty(false);   // true
empty('false'); // false
empty('true');  // false*/

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
        <h2>Login</h2>
        <form action="" method="post">
            Username(email): <input type="text" name="email" value="<?php echo post('email'); ?>" placeholder="Email ">
            <br>
            Password : <input type="password" name="password">
            <br>
            <input type="hidden" name="login" value="1">
            <button type="submit">Login</button>
        </form>
    </div>

    <div style="width: 400px; float: left">
        <h2>Register</h2>
        <form action="" method="post">
            Name Surname: <input type="text" name="nameSurname" value="<?php echo post('nameSurname'); ?>">
            <br>
            Username(Email): <input type="text" name="username" value="<?php echo post('username'); ?>">
            <br>
            Password : <input type="password" name="password">
            <br>
            Password again : <input type="password" name="confirm_password">
            <br>
            <input type="hidden" name="register" value="2">
            <button type="submit">Register</button>
        </form>
    </div>
</div>


</body>
</html>

