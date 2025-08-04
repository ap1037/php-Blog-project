<?php
require_once 'BlogModel.php';

$blogModel = new BlogModel();
$posts = $blogModel->getPosts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog System</title>
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        
    </style>
</head>

<body style="background: url('abb.jpg') no-repeat center center fixed; background-size: cover;">
    <div class="heading" style="color: #ff5b02; display: flex; justify-content: center; background-color: #f5dcdc; height: 70px;">
        <h1>Welcome to the Blogs Site</h1>
    </div>
    <div class="button m-2"><button  type="button" class="btn btn-outline-info "><a href="create_post.php">Create New Post</a></button></div>
    <div class="content m-2">
        <h2>Blog Posts</h2>
    </div>
    <div class="post m-1" style=" display: flex; justify-content: flex-start; max-width: 90%;">
         <ul style="list-style: none; padding: 5px;">
        <?php 
        $postCount = count($posts);
        foreach ($posts as $index => $post): 
            $contentLength = strlen($post['content']);
            $lineWidth = min(max($contentLength * 2, 200), 200); // Scale width based on content length, min 200px, max 800px
        ?>
            <li style="margin-bottom: 30px; padding: 20px; background-color: rgba(255, 255, 255, 0.9); border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                <h3><a href="view_post.php?id=<?php echo $post['id']; ?>" style="color: #2c3e50; text-decoration: none;"><?php echo htmlspecialchars($post['title']); ?></a></h3>
                <p style="color: #555; margin: 15px 0;"><?php echo htmlspecialchars(substr($post['content'], 0, 100)); ?>...</p>
                <div style="margin-top: 15px;">
                    <a href="edit_post.php?id=<?php echo $post['id']; ?>" style="color: #f39c12; text-decoration: none; margin-right: 15px;"><i class="fa fa-edit"></i> Edit</a>
                    <a href="delete_post.php?id=<?php echo $post['id']; ?>" style="color: #e74c3c; text-decoration: none;"><i class="fa fa-trash"></i> Delete</a>
                </div>
            </li>
            <?php if ($index < $postCount - 1): ?>
                <hr style="width: <?php echo $lineWidth; ?>px; height: 3px; background: linear-gradient(90deg, #3498db, #e74c3c, #f39c12); border: none; border-radius: 2px; margin: 40px auto; opacity: 0.8;">
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    </div>
   
</body>

</html>