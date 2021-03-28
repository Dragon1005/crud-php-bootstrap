<?php

require_once 'config.php';

if (isset($_GET['id'])) {


    $id = $_GET['id'];


    $stmt = $pdo->prepare('SELECT * FROM notes WHERE id=:id');
    $stmt->execute(['id' => $id]);

    while ($row = $stmt->fetch()) {
        $title =  $row->title;
        $specification = $row->specification;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <h2 class=" d-flex justify-content-center mt-5">Edit your note</h2>
    <div class="d-flex justify-content-center">
        <div class="form-grup mt-5">
            <form action="" method="POST">
                <label>Edit your title : </label>
                <input type="text" class="form-control" name="title-updated" value="<?php echo $title; ?>">
                <label class="mt-2">Edit your specification : </label>
                <input type="text" class="form-control mt-1" name="specification-updated" value="<?php echo $specification; ?>">
                <input type="submit" class="btn btn-primary ml-5 mt-3" name="sbmt-updated">
            </form>
        </div>

    </div>

</body>

</html>


<?php

if (isset($_POST['sbmt-updated'])) {

    $title = $_POST['title-updated'];
    $specification = $_POST['specification-updated'];

    $stmt = $pdo->prepare("UPDATE notes SET title=:title, specification=:specification WHERE id=:id");
    $stmt->execute(['title' => $title, 'specification' => $specification, 'id' => $id]);


    header("Location: index.php");
}
