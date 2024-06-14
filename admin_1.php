<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رفع مقال جديد</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .upload-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .upload-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        .upload-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-group textarea {
            height: 150px;
        }

        .form-group input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <?php
    #session_start();
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
        #header('Location: admin.php');
        exit;
    }else{
        if(isset($_POST['upload'])){
            file_put_contents($_POST['title'].".php",
            '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المقالة</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
        }
        .author {
            color: #666;
            font-size: 14px;
        }
        .content {
            line-height: 1.6;
            margin-top: 20px;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
    <?php
    include("navbar.php")
    ?>
</head>
<body>
    <div class="container">
        <h1>'.$_POST['title'].'</h1>
        <p class="author">'.$_POST['author'].'</p>
        <div class="content">
            <p>'.$_POST['content'].'</p>
        </div>
    </div>
</body>
</html>'

            ,LOCK_EX);
            file_put_contents("art.txt",$_POST['title'].'.php'."\n",FILE_APPEND);
        }
    }
    ?>
</head>
<body>
    <div class="upload-container">
        <form  method="POST" class="upload-form">
            <h2>رفع مقال جديد</h2>
            <div class="form-group">
                <label for="title">عنوان المقال:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">محتوى المقال:</label>
                <textarea id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <label for="author">اسم المؤلف:</label>
                <input type="text" id="author" name="author" required>
            </div>
            <div class="form-group">
                <input type="submit" value="رفع المقال" name='upload'>
            </div>
        </form>
    </div>
</body>
</html>
