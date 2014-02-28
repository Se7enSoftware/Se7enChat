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
            VALUES (:userId, :roomId, :text)';
        $transaction = $this->database->prepare($sql);
        $transaction->bindParam(':userId', $postInfo['userId'], PDO::PARAM_INT);
        $transaction->bindParam(':roomId', $postInfo['roomId'], PDO::PARAM_INT);
        $transaction->bindParam(':text', $postInfo['text'], PDO::PARAM_STR);
        $transaction->execute();
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

    public function getPostsWithIdGreaterThan($id)
    {
        $statement = $this->database->prepare('
            SELECT id, user_id, room_id, text
            FROM posts
            WHERE id > :id'
        );
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $posts;
    }
}
