<?php
namespace Se7enChat\Interactors;
use Se7enChat\Entities\Post;
use Se7enChat\Gateways\PostDataGateway;
use Se7enChat\Gateways\UserDataGateway;

class PostDataInteractor
{
    private $dataLayer;
    private $userInteractor;

    public function __construct(
        PostDataGateway $postDataLayer, UserDataGateway $userDataLayer)
    {
        $this->dataLayer = $postDataLayer;
        $this->userInteractor = new UserDataInteractor($userDataLayer);
    }

    public function savePost(Post $post)
    {
        $postData = $this->constructPostArray($post);
        $isSaved = $this->dataLayer->savePost($postData);
        return $isSaved;
    }

    public function getPostById($id)
    {
        return $this->constructPostObject(
            $this->dataLayer->getPostById($id));
    }

    public function deletePost($id)
    {
        return $this->dataLayer->deletePost($id);
    }

    public function getNewPostsAfter($id)
    {
        $newPosts = $this->dataLayer->getPostsWithIdGreaterThan($id);
        $postObjects = array();
        foreach ($newPosts as $post) {
            $postObjects[] = $this->constructPostObject($post);
        }
        return $postObjects;
    }

    private function constructPostArray(Post $post)
    {
        return array(
            'id' => $post->getId(),
            'roomId' => $post->getRoomid(),
            'userId' => $post->getUser()->getId(),
            'text' => $post->getText()
        );
    }

    private function constructPostObject(array $postArray)
    {
        return new Post(
            $postArray['id'],
            $postArray['roomId'],
            $this->userInteractor->getUserFromId(
                $postArray['userId']),
            $postArray['text']
        );
    }
}
