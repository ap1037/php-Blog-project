<?php
require_once 'BlogModel.php';

$blogModel = new BlogModel();

// Handle GET request to display the post
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
    <title><?php echo htmlspecialchars($post['title']); ?> - Blog Post</title>
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.3/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .post-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .post-title {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .post-content {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            margin: 20px 0;
            line-height: 1.6;
            font-size: 16px;
        }
        .post-meta {
            background-color: #e9ecef;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
        }
        .action-buttons {
            margin-top: 30px;
        }
        .btn-custom {
            margin: 0 5px;
            padding: 10px 20px;
            font-weight: bold;
        }
    </style>
</head>

<body style="background: url('view.jpg') no-repeat center center fixed; background-size: cover;">
    <div class="heading m-1" style="color: black; display: flex; justify-content: center;">
        <h1>View Blog Post</h1>
    </div>
    <br><br>

    <div class="container m-7 blur-background" style="display: flex; justify-content: center; align-items: center; max-width: 800px; border: 5px solid #dee2e6; border-radius: 0.25rem; margin: 0 auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="post-container">
            <div class="text-center mb-4">
                <i class="fa fa-file-text-o" style="font-size: 48px; color: #3498db;"></i>
                <h2 class="post-title mt-3"><?php echo htmlspecialchars($post['title']); ?></h2>
            </div>
            
            <div class="post-meta">
                <div class="row">
                    <div class="col-md-6">
                        <i class="fa fa-calendar"></i> <strong>Created:</strong> <?php echo $post['created_at']; ?>
                    </div>
                    <div class="col-md-6">
                        <i class="fa fa-hashtag"></i> <strong>Post ID:</strong> #<?php echo $post['id']; ?>
                    </div>
                </div>
            </div>
            
            <div class="post-content">
                <h4><i class="fa fa-align-left"></i> Content:</h4>
                <hr>
                <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
            </div>
            
            <div class="action-buttons text-center">
                <a href="index.php" class="btn btn-primary btn-custom">
                    <i class="fa fa-home"></i> Back to Blog
                </a>
                <a href="edit_post.php?id=<?php echo $post['id']; ?>" class="btn btn-warning btn-custom">
                    <i class="fa fa-edit"></i> Edit Post
                </a>
                <a href="delete_post.php?id=<?php echo $post['id']; ?>" class="btn btn-danger btn-custom">
                    <i class="fa fa-trash"></i> Delete Post
                </a>
            </div>
        </div>
    </div>
</body>

</html> 