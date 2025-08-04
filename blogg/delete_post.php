<?php
require_once 'BlogModel.php';

$blogModel = new BlogModel();

// Handle POST request for deleting the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    
    // Delete the post
    $blogModel->deletePost($id);
    
    // Redirect back to index page
    header('Location: index.php');
    exit();
}

// Handle GET request to display the confirmation form
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
    <title>Delete Post</title>
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.3/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .delete-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .post-preview {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
        }
        .warning-text {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>

<body style="background: url('del.jpg') no-repeat center center fixed; background-size: cover;">
    <div class="heading m-1" style="color: red; display: flex; justify-content: center;">
        <h1>Delete Blog Post</h1>
    </div>
    <br><br>

    <div class="container m-7 blur-background" style="display: flex; justify-content: center; align-items: center; max-width: 600px; border: 5px solid #dee2e6; border-radius: 0.25rem; margin: 0 auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="delete-container">
            <div class="text-center mb-4">
                <i class="fa fa-exclamation-triangle" style="font-size: 48px; color: #dc3545;"></i>
                <h2 class="warning-text mt-3">Confirm Deletion</h2>
            </div>
            
            <div class="alert alert-danger" role="alert">
                <strong>Warning:</strong> This action cannot be undone. The post will be permanently deleted.
            </div>
            
            <div class="post-preview">
                <h4>Post to be deleted:</h4>
                <h5><?php echo htmlspecialchars($post['title']); ?></h5>
                <p><?php echo htmlspecialchars(substr($post['content'], 0, 200)); ?>...</p>
                <small class="text-muted">Created: <?php echo $post['created_at']; ?></small>
            </div>
            
            <form action="delete_post.php" method="POST" class="text-center">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($post['id']); ?>">
                
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-danger btn-lg mr-3">
                        <i class="fa fa-trash"></i> Delete Post
                    </button>
                    <a href="index.php" class="btn btn-secondary btn-lg">
                        <i class="fa fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html> 