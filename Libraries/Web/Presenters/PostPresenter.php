<?php
namespace Se7enChat\Libraries\Web\Presenters;
use Se7enChat\Boundaries\PostOutputPort;

class PostPresenter implements PostOutputPort
{
	public function outputPost(array $postDetails)
	{
		echo json_encode($postDetails);
	}

	public function outputPosts(array $posts)
	{
		echo json_encode($posts);
	}

	public function outputPostId($id)
	{
		echo json_encode(array('post_id' => $id));
	}
}