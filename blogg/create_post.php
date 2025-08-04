<?php
require_once 'BlogModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $blogModel = new BlogModel();
    $blogModel->createPost($title, $content);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create New Post</title>
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style></style>
</head>

<body style="background: url('newuser.jpg') no-repeat center center fixed; background-size: cover;">
    <div class="heading m-1 " style="color: Orange; display: flex; justify-content: center;">
        <h1>Create New Blog Post</h1>
    </div>
    <form action="create_post.php" method="POST">
        <label for="title"  style="color: Orange; margin: 2px;"><h3>Title:</h3></label>
        <input type="text" id="title" name="title" required>
        <br><br>
        <label for="content" style="color: Orange;  margin: 2px;"><h3>Content:</h3></label>
        <textarea id="content" name="content" required></textarea>
        <br><br>
        <div class="button m-2"> <button type="submit" class="btn btn-outline-warning " >Create Post</button></div>
    
       
    </form>
</body>

</html>