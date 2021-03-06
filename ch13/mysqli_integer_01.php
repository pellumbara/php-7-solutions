<?php
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
$conn = dbConnect('read');
$getImages = 'SELECT image_id, filename FROM images';
$images = $conn->query($getImages);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta  charset="utf-8">
    <title>MySQLi: Insert Integer in SQL</title>
    <style>
        figure {
            margin: 30px;
            display:block;
        }
        figcaption {
            font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
            font-weight:bold;
            display:inline-block;
            max-width:250px;
            margin:10px;
        }
    </style>
</head>

<body>
<form action="mysqli_integer.php" method="get">
    <select name="image_id">
        <?php while ($row = $images->fetch_assoc()) { ?>
            <option value="<?= $row['image_id'] ?>"
                <?php if (isset($_GET['image_id']) && $_GET['image_id'] == $row['image_id']) {
                    echo 'selected';
                } ?>
                ><?= safe($row['filename']) ?></option>
        <?php } ?>
    </select>
    <input type="submit" name="go" value="Display">
</form>
</body>
</html>