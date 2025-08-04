<?php
require_once 'db.php';

class BlogModel {
    public function createPost($title, $content) {
        global $pdo;
        $sql = "INSERT INTO posts (title, content) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $content]);
    }

    public function getPosts() {
        global $pdo;
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById($id) {
        global $pdo;
        $sql = "SELECT * FROM posts WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePost($id, $title, $content) {
        global $pdo;
        $sql = "UPDATE posts SET title = ?, content = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $content, $id]);
    }

    public function deletePost($id) {
        global $pdo;
        $sql = "DELETE FROM posts WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}
?>