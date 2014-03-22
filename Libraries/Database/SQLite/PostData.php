<?php
namespace Se7enChat\Libraries\Database\SQLite;
use Se7enChat\Gateways\PostDataGateway;
use PDO;

class PostData implements PostDataGateway
{
    private $database;

    public function __construct()
    {
        try {
            $this->database = new PDO('sqlite:' . __DIR__ . '/database.sqlite3');
        } catch (\Exception $error) {
            exit ('Database connection error: SQLite.');
        }
    }

    public function savePost(array $postInfo)
    {
        $sql = '
            INSERT INTO posts (user_id, room_id, text)
            VALUES (:user_id, :room_id, :text)';
        $transaction = $this->database->prepare($sql);
        $transaction->bindParam(':user_id', $postInfo['user_id'], PDO::PARAM_INT);
        $transaction->bindParam(':room_id', $postInfo['room_id'], PDO::PARAM_INT);
        $transaction->bindParam(':text', $postInfo['text'], PDO::PARAM_STR);
        $result = $transaction->execute();
        $transaction->closeCursor();
    }

    public function deletePostById($id)
    {
        $statement = $this->database->prepare('
            DELETE FROM posts
            WHERE id = :id'
        );
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();
    }

    public function getPostById($id)
    {
        $sql = '
            SELECT id, user_id, room_id, text
            FROM posts
            WHERE id = :id';
        $transaction = $this->database->prepare($sql);
        $transaction->bindParam(':id', $id, PDO::PARAM_INT);
        $transaction->execute();
        $post = $transaction->fetch(PDO::FETCH_ASSOC);
        $transaction->closeCursor();

        return $post;
    }

    public function getLastPostId()
    {
        $sql = '
            SELECT id
            FROM posts
            ORDER BY id DESC
            LIMIT 1';
        $transaction = $this->database->prepare($sql);
        $transaction->execute();
        $post_id = $transaction->fetch(PDO::FETCH_ASSOC);
        $transaction->closeCursor();

        return (int) $post_id['id'];
    }

    public function getPostsWithIdGreaterThan($id)
    {
        $statement = $this->database->prepare('
            SELECT post.id, post.user_id, user.name, post.room_id, post.text
            FROM posts AS post
            JOIN users AS user
            ON post.user_id = user.id
            WHERE post.id > :id'
        );
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        $values = array();
        foreach ($posts as $post) {
            $values[] = array(
                'post_id' => (int) $post['id'],
                'user_id' => (int) $post['user_id'],
                'user_name' => $post['name'],
                'room_id' => (int) $post['room_id'],
                'text' => $post['text']
            );
        }
        return $values;
    }
}
