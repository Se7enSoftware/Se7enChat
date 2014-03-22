<?php
namespace Se7enChat\Tests\Libraries\Web\Presenters;
use Se7enChat\Libraries\Web\Presenters\PostPresenter;

class PostPresenterTest extends \PHPUnit_Framework_TestCase
{
	private $presenter;

    public function setUp()
    {
        $this->presenter = new PostPresenter;
    }

    public function tearDown()
    {
        unset($this->presenter);
    }

    public function testIsInstanceOfOutputPort()
    {
    	$this->assertInstanceOf(
    		'Se7enChat\Boundaries\PostOutputPort',
    		$this->presenter);
    }

    public function testOutputsSinglePostJSON()
    {
    	$this->presenter->outputPost($this->getPostArray());
        $this->expectOutputString($this->getPostJSON());
    }

    public function testOutputsMultiplePostsAsJSON()
    {
        $postArray = array(
            $this->getPostArray(),
            $this->getPostArray()
        );
        $this->presenter->outputPosts($postArray);
        $this->expectOutputString(json_encode($postArray));
    }

    public function testOuputsPostId()
    {
        $this->presenter->outputPostId(1);
        $this->expectOutputString(json_encode(array('post_id' => 1)));
    }

    private function getPostArray()
    {
        return array(
            'id' => 1,
            'room_id' => 1,
            'user_id' => 1,
            'text' => 'New post.'
        );
    }

    private function getPostJSON()
    {
    	return json_encode($this->getPostArray());
    }
}
