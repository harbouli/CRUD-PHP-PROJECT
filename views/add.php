<?php
$pdo = new PDO('mysql: host= localhost ; dbname=crud_db', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




$erorrs = [];
$firstname = '';
$lastname = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];

  if (empty($firstname)) :
    $erorrs[] = 'Please Enter Your Firstname';

  elseif (empty($lastname)) :
    $erorrs[] = 'Please Enter Your lastname';

  elseif (empty($email)) :
    $erorrs[] = 'Please Enter Your email';
  elseif (empty($erorrs)) :


    $statemnt = $pdo->prepare("INSERT INTO crud_tb (firstname , lastname , email) VALUES (:firstname , :lastname , :email)");


    $statemnt->bindValue(':firstname', $firstname);
    $statemnt->bindValue(':lastname', $lastname);
    $statemnt->bindValue(':email', $email);

    $statemnt->execute();
    header("location: index.php");
  endif;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/styles.css">
  <title>CRUD</title>
</head>

<body>

  <form action="" method="post">
    <input type="text" placeholder="Firstname" name="firstname" value="<?php echo $firstname ?>">
    <input type="text" placeholder="Lastname" name="lastname" value="<?php echo $lastname ?>">
    <input type="email" placeholder="Email Address" name="email" value="<?php echo $email ?>">
    <input type="submit" value="Add">
  </form>

  <style>
    .err {
      background: #ea5353;
      padding: 20px;
      text-align: center;
      font-size: 18px;
      color: white;
      width: 50%;
      margin: 40px auto;
      font-weight: bold;
      border-radius: 10px;
    }
  </style>
  <?php if (!empty($erorrs)) : ?>
    <div class="err">
      <?php echo $erorrs[0] ?>
    </div>
  <?php endif ?>
</body>

</html>