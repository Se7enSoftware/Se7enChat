<?php
namespace Se7enChat\src\posts;

/*
 * Basically what we're doing here is abstracting the data layer.
 * This class is called by parts of the system that need post info.
 * It is given a data layer as a parameter, which does the
 * actual work of interacting with whatever persistent storage we use.
 *
 * This allows for two very important things.
 * 1) It makes testing very easy, by allowing us to
 *      use a fake, system memory database.
 *      See Se7enChat/data/test/MemoryDatabase.php
 * 2) And it allows for easy switching of data storage in general.
 *      For instance, at some point we may decide to store posts
 *      in files instead of a database.
 *
 * We call this the Interactor because it is the part that the
 * system interacts with when it needs to manipulate some data.
 */

class PostDataInteractor
{
    private $dataLayer;

    public function __construct(PostDataInterface $dataLayer)
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

    public function getNewPostsAfter($id)
    {
        return $this->dataLayer->getPostsWithIdGreaterThan($id);
    }
}
