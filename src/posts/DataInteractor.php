<?php
namespace Se7enChat\src\posts;

class DataInteractor
{
    private $dataLayer;

    public function __construct(DataInterface $dataLayer)
    {
        $this->dataLayer = $dataLayer;
    }

    public function savePost(Post $post)
    {
        $saved = $this->dataLayer->savePost($post);
        return $saved;
    }

    public function getPostById($id)
    {
        return $this->dataLayer->getPostById($id);
    }

    public function deletePost($id)
    {
        return $this->dataLayer->deletePost($id);
    }
}
