<?php
namespace Se7enChat\Boundaries;

interface PostOutputPort
{
	public function outputPost(array $postDetails);
	public function outputPosts(array $posts);
}