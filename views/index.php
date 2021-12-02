<?php

$pdo = new PDO('mysql: host= localhost ; dbname=crud_db', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statemnt  = $pdo->prepare("SELECT * FROM crud_tb ORDER BY created_at DESC");
$statemnt->execute();
$users = $statemnt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">

        <div class="table">

            <div class="row header">
                <div class="cell">
                    Firstname
                </div>
                <div class="cell">
                    Lastname
                </div>
                <div class="cell">
                    Email
                </div>
                <div class="cell">
                    Ation
                </div>
            </div>
            <?php foreach ($users as $user) :  ?>

                <div class="row">
                    <div class="cell">
                        <?php echo $user['firstname']; ?>
                    </div>
                    <div class="cell">
                        <?php echo $user['lastname']; ?>
                    </div>
                    <div class="cell">
                        <?php echo $user['email']; ?>
                    </div>
                    <div class="cell">
                        <a href="" class="edit">Edit</a>
                        <a class="delete" href="delete.php?id=<?php echo $user['id'] ?>">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <a href="./add.php" class="add">Add User</a>
</body>

</html>