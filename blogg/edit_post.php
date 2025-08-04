<?php
require_once 'BlogModel.php';

$blogModel = new BlogModel();

// Handle POST request for updating the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $blogModel->updatePost($id, $title, $content);

    header('Location: index.php');
    exit();
}

// Handle GET request to display the form with existing data
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = $blogModel->getPostById($id);
    
    if (!$post) {
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Post</title>
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.3/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Bootstrap 5.3.2 (Latest) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- Bootstrap 5.2.3 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style></style>
</head>

<body style="background: url('edixx.jpg') no-repeat center center fixed; background-size: cover;">
    <div class="heading m-1 " style="color: Orange; display: flex; justify-content: center;">
        <h1>Update Blog Post</h1>
    </div>
    <br><br>

    <div class="container m-7 border border-3 blur-background" style="display: flex; justify-content: center; max-width: 418px; height: 283px;">
    <form action="update_post.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($post['id']); ?>">
        <label for="title"  style="color: Orange; margin: 2px;"><h3>Title:</h3></label>
        <input  type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
        <br><br>
        <label for="content" style="color: Orange;  margin: 2px;"><h3>Content:</h3></label>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea>
        <br><br>
        <div class="button m-2"> <button type="submit" class="btn btn-outline-warning " >Update Post</button></div>
    
       
    </form>
    </div>
</body>

</html> 