<?php require 'header.php'; ?>

<form action="index.php?op=<?= $operation ?>" method="post">

    <label for="name">ID:</label><br>
    <input type="text" id="id" name="id" value="<?= htmlentities($id)?>" readonly><br>

    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?= htmlentities($name)?>"><br>

    <label for="phone">phone:</label><br>
    <input type="text" id="phone" name="phone" value="<?= htmlentities($phone)?>"><br>

    <label for="email">email:</label><br>
    <input type="text" id="email" name="email" value="<?= htmlentities($email)?>"><br>

    <label for="location">location:</label><br>
    <input type="text" id="location" name="location" value="<?= htmlentities($location)?>"><br><br>

    <input type="submit" name="submit">
</form>

<?php require 'footer.php'; ?>