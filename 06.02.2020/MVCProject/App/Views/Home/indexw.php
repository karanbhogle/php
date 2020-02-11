<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>It's a View File</title>
</head>
<body>

<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        echo "Hello, ".htmlspecialchars($_POST['txtName']);
    }
?>
    <h1>Welcome</h1>
    <form action="#" method="POST">
        Enter Name:
            <input type="text" name="txtName"><br>
        <input type="submit" value="Submit" name="btnSubmit">
    </form>

    <h3>Hello, 
        <?php echo htmlspecialchars($name); ?>
    </h3>
    <ul>
        <?php foreach($colors as $color):?>
            <li><?php echo htmlspecialchars($color); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>