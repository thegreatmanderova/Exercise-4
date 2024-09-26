<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions</title>
    <link rel="stylesheet" type="text/css" href="exercise.css">
</head>
<body>
<?php
    if (!file_exists('fruits.txt')) {
        file_put_contents('fruits.txt', '');
    }

    $fruits = file_get_contents('fruits.txt');
    $fruits = explode("\n", $fruits);

function addFruit($fruit) {
    global $fruits;
    $fruits[] = $fruit;
    file_put_contents('fruits.txt', implode("\n", $fruits));
}

// Checks the form if it has been submitted.
    if (isset($_POST['submit'])) {
        $newFruit = trim($_POST['fruit']);

         if (!empty($newFruit)) {
            addFruit($newFruit);
        } else {
            $error = "Please enter a fruit name.";
        }
}
?>

<h2>Hello <?php echo $_GET["fname"]; echo " "; echo $_GET["lname"];?>!</h2>
<h1>Welcome To My Fruit Site</h1>
    <ul>
        <?php foreach ($fruits as $fruit) { ?>
            <li><?php echo $fruit; ?></li>
        <?php } ?>
    </ul>

    <!-- POST METHOD -->
    <form action="" method="post" class="arciaga">
        <input type="text" name="fruit" placeholder="Enter a new fruit">
        <input type="submit" name="submit" value="Add Fruit">
        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
    </form>

</body>
</html>