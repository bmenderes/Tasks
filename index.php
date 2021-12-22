<!DOCTYPE html>
<html lang="en">

<?php
  require_once('vendor/autoload.php');

  use Stichoza\GoogleTranslate\GoogleTranslate;
?>

<style> 
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #555;
  outline: none;
}

input[type=text]:focus {
  background-color: lightblue;
}


input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}

</style>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Google Translate</title>
</head>

<body>

  <h1 style="color: blue">Google Translate Denemesi</h1>
  <form method="post">
    <label for="translate">Kaynak Dilini Giriniz : </label>
    <br>
    <input  type="text" name="source" value="
              <?php if (isset($_POST['source'])) {
                echo trim($_POST['source']);
              } ?>">
    <br>
    <br>
    <label for="translate">Hedef Dili Giriniz : </label>
    <br>
    <input  type="text" name="target" value="
              <?php if (isset($_POST['target'])) {
                echo trim($_POST['target']);
              } ?>">
    <br>
    <br>
    <label for="translate">Cevirilcek Metni Giriniz : </label>
    <br>
    <input type="text" name="translate" value="
              <?php if (isset($_POST['translate'])) {
                echo trim($_POST['translate']);
              } ?>">
              <br>
              <br>
    <input type="submit" name="submit" value="submit">
  </form>


  <?php


  $source= isset($_POST['source']) ? trim($_POST['source']) : '';
  $target= isset($_POST['target']) ? trim($_POST['target']) : '';  
  $translate= isset($_POST['translate']) ? trim($_POST['translate']) : '';

 

  $tr = new GoogleTranslate(); 
 

  ?>

  <h2 style="color:brown"><?php   echo $tr->setSource($source)->setTarget($target)->translate($translate); ?></h2>



</body>

</html>