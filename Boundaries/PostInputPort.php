<?php
namespace Se7enChat\Boundaries;
use Se7enChat\Interactors\DependencyContracts\PostDependencyContract;

interface PostInputPort
{
	public function setDependencies(PostDependencyContract $dependencies);
    public function savePost(array $post);
    public function deletePostById($id);
    public function getPostById($id);
    public function getLastPostId();
    public function getPostsWithIdGreaterThan($id);
}
