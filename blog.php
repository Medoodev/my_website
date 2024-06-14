<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

nav {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}

.navbar {
    list-style-type: none;
    margin: 0;
    padding: 0;
    text-align: center;
}

.navbar li {
    display: inline;
    margin: 0 10px;
}

.navbar li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
}

.navbar li a:hover {
    color: #ffd700;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 0 20px;
}

.card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card h3 {
    margin-top: 0;
    color: #333;
}

.card p {
    color: #666;
}

.card-link {
    display: inline-block;
    margin-top: 10px;
    color: #007bff;
    text-decoration: none;
}

.card-link:hover {
    text-decoration: underline;
}

    </style>
    <?php
    include("navbar.php");
    $lines = file('art.txt');

foreach ($lines as $line) {
    $parts = explode("\n", $line);
    $s=str_replace(".php", "", $parts[0]);
    echo '<div class="card">
        <h3>'.$s.'</h3>
        <a href="'.$parts[0].'" class="card-link">اقرأ المزيد</a>
    </div>';

}

    ?>
</head>
<body>

</body>
</html>
