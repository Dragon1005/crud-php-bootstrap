    <?php

    require_once 'config.php';
    require_once 'create.php';
    require_once 'delete.php';

    $sql = $pdo->query('SELECT * FROM notes');

    $notes = false;

    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['msg'])) : ?>
        <div class="alert alert-<?= $_SESSION['msg-type']; ?>"> <?php echo $_SESSION['msg']; ?>
        </div>
        <?php unset($_SESSION['msg']); ?>
    <?php endif; ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Project CRUD</title>
    </head>

    <body>
        <div class="container">
            <h1>Simple PHP CRUD with Bootstrap</h1>
            <?php while ($row = $sql->fetch()) : ?>
                <?php $notes = true; ?>
                <div class="container bg-light mt-5 p-1">
                    <h2 class="d-flex justify-content-center mt-5 text-info">Note nr: <?php echo $row->id; ?></h2>
                    <table>
                        <tr><?php echo "<b>Title: </b>" . $row->title . '<br>'; ?></tr>
                        <tr><?php echo "<b>Specification: </b>" . $row->specification . '<br>'; ?></tr>
                        <a class="btn btn-info mr-2" href="edit.php?id=<?php echo $row->id; ?>">Edit</a>
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $row->id; ?>">Delete</a>
                        <form action="edit.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                        </form>
                        <?php echo '<hr>'; ?>
                    </table>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <form action="index.php" method="POST">
                <div class="form-grup">
                    <label>Enter your title :</label>
                    <input type="text" name="title" class="form-control">
                    <label>Enter your specification :</label>
                    <input type="text" name="specification" class="form-control">
                    <input type="submit" name="sbmt" class="btn btn-primary mt-1">
                </div>
            </form>
        </div>
    </body>

    </html>