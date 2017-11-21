<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Input Reservation Information</title>
</head>
<body>
    <?php
        $room_no = $_GET["room_number"];
        $reserve_date = $_GET["date"];
    ?>
    <form action="register_info.php?room_number=<?= $room_no ?>&date=<?= $reserve_date ?>" method="post">
        <fieldset>
            <legend>Population</legend>
            <input type="number" name="population" min="1" max="6">
        </fieldset>
        <fieldset>
            <legend>Purpose</legend>
            <textarea name="purpose" rows="5" cols="30"></textarea>
        </fieldset>
        <input type="submit">
    </form>
</body>
</html>