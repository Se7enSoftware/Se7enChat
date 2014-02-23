<?php
namespace Se7enChat\Tests\IntegrationTests\Database\SQLite;
use Se7enChat\Interactors\PostInteractor;
use Se7enChat\Libraries\Database\SQLite\PostData;
use PDO;

class PostInteractorTest extends \PHPUnit_Framework_TestCase
{
    private $interactor;
    private $database;
    private $dbPath;
    private $dbSubstitutePath;

    public function __construct()
    {
        $this->dbPath = CHAT_ROOT . 'Libraries/Database/SQLite/database.db';
        $this->dbCopyPath = CHAT_ROOT . 'Libraries/Database/SQLite/database_backup.db';
        try {
            $this->database = new PDO('sqlite:'.$this->dbPath);
        } catch (\Exception $error) {
            exit ('Database connection error: SQLite.');
        }
    }

    public static function setUpBeforeClass()
    {
        $db = CHAT_ROOT . 'Libraries/Database/SQLite/database.db';
        $copy = CHAT_ROOT . 'Libraries/Database/SQLite/database_backup.db';
        copy($db, $copy);
    }

    public static function tearDownAfterClass()
    {
        $db = CHAT_ROOT . 'Libraries/Database/SQLite/database.db';
        $copy = CHAT_ROOT . 'Libraries/Database/SQLite/database_backup.db';
        unlink($db);
        rename($copy, $db);
    }

    public function setUp()
    {
        $this->interactor = new PostInteractor;
        $this->interactor->setDatabase(new PostData);
        $this->createPostTable();
    }

    public function tearDown()
    {
        $this->dropPostTable();
        unset($this->interactor);
    }

    public function testIsInstanceOfInputPort()
    {
        $this->assertInstanceOf(
            'Se7enChat\Boundaries\PostInputPort',
            $this->interactor
        );
    }

    public function testDoesSavePost()
    {
        $post = $this->getFakeInputPostData(1);
        $this->interactor->savePost($post);
        $this->assertNotEmpty(
            $this->interactor->getPostById(1));
    }

    public function testDoesGetPostById()
    {
        $this->interactor->savePost($this->getFakeInputPostData(1));
        $post = $this->interactor->getPostById(1);
        $this->assertEquals($post['id'], 1);
    }

    public function testDoesGetPostsWithIdGreaterThanThatWhichIsGiven()
    {
        $this->interactor->savePost($this->getFakeInputPostData(1));
        $this->interactor->savePost($this->getFakeInputPostData(2));
        $posts = $this->interactor->getPostsWithIdGreaterThan(1);
        foreach($posts as $post) {
            $this->assertTrue($post['id'] > 1);
        }
    }

    public function testDoesDeletePostById()
    {
        $this->interactor->savePost($this->getFakeInputPostData(1));
        $this->interactor->deletePostById(1);
        $post = $this->interactor->getPostById(1);
        $this->assertTrue($post === false);
    }

    public function getFakeInputPostData($id)
    {
        return array(
            'roomId' => $id,
            'userId' => 1,
            'text' => sprintf('Post %d', $id)
        );
    }

    private function dropPostTable()
    {
        $this->database->exec('DROP TABLE posts');
    }

    private function createPostTable()
    {
        $this->database->exec('
            CREATE TABLE posts (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                room_id INTEGER NOT NULL,
                text TEXT NOT NULL DEFAULT ""
            )'
        );
    }
}
