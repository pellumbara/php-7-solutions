<?php
include '../includes/title.php';
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
// create database connection
$conn = dbConnect('read');
$sql = 'SELECT article_id, title, article
        FROM blog ORDER BY created DESC';
$result = $conn->query($sql);
if (!$result) {
    $error = $conn->error;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Japan Journey<?php if (isset($title)) {echo "&mdash;{$title}";} ?></title>
    <link href="../styles/journey.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<header>
    <h1>Japan Journey </h1>
</header>
<div id="wrapper">
    <?php require '../includes/menu.php'; ?>
    <main>
        <?php
        if (isset($error)) {
            echo "<p>$error</p>";
        } else {
            while ($row = $result->fetch_assoc()) { ?>
                <h2><?= safe($row['title']) ?></h2>
                <p><?= safe(substr($row['article'], 0, strpos($row['article'], PHP_EOL))) ?>
                    <a href="details.php?article_id=<?= $row['article_id'] ?>"> More</a></p>
            <?php }
        }?>
    </main>
    <?php include '../includes/footer.php'; ?>
</div>
</body>
</html>
