var application = angular.module('Se7enChat', ['ngAnimate']);

application.service('postService', function($http)
{
    this.getPostById = function(id)
    {
        return $http.post('./index.php?post=get', {post_id: id}).success(
            function(response)
            {
                // Do something here.
            }
        );
    }

    this.savePost = function(info)
    {
        $http.post('./index.php?post=add', info);
    }

    this.getLastPostId = function()
    {
        return $http.get('./index.php?post=getLastId');
    }

    this.getPostsWithIdGreaterThan = function(id)
    {
        return $http.post('./index.php?post=getGreaterThan', {post_id: id});
    }
});

application.controller('PostsController', function ($scope, $http, postService)
{
    $scope.posts = [];
    $scope.lastPostId = 0;

    $scope.addPost = function()
    {
        $scope.pushPost({
            user_name: user_name,
            timestamp: $scope.getTime(),
            text: $scope.postText
        });
        $scope.lastPostId += 1;
        $scope.savePost();
        $scope.clearInputField();
    }

    $scope.savePost = function()
    {
        postService.savePost({
            user_id: user_id,
            room_id: 1,
            text: $scope.postText
        });
    }

    $scope.start = function()
    {
        postService.getLastPostId().success(
            function(response)
            {
                $scope.lastPostId = response.post_id;
            }
        ).then(
            function()
            {
                setInterval($scope.controlLoop, 2000);
            }
        );
    }

    $scope.controlLoop = function()
    {
        var newPosts = postService.getPostsWithIdGreaterThan($scope.lastPostId);
        newPosts.success(function(response)
        {
            if(response.length != 0) {
                $scope.pushMultiplePosts(response);
            }
        });
    }

    $scope.pushMultiplePosts = function(posts)
    {
        for(i = 0; i < posts.length; ++i) {
            $scope.pushPost(posts[i]);
            $scope.lastPostId = posts[i].post_id;
        }
    }

    $scope.pushPost = function(post)
    {
        $scope.posts.push({
            user_name: post.user_name,
            timestamp: $scope.getTime(),
            body: post.text
        });
    }

    $scope.getTime = function()
    {
        time = new Date;
        return time.getHours() +
            ':' + time.getMinutes() +
            ':' + time.getSeconds();
    }

    $scope.clearInputField = function()
    {
        $scope.postText = '';
    }

    angular.element(document).ready(function()
    {
        $scope.start();
    });
});
