var application = angular.module('Se7enChat', ['ngAnimate']);

application.service('postService', function($http)
{
    this.posts = [];

    this.getPostById = function(id)
    {
        return $http.post('./index.php?post=get', {post_id: id}).success(
            function(response)
            {
                console.log(response);
            }
        );
    }

    this.savePost = function(info)
    {
        $http.post('./index.php?post=add', info).success(
            function(response)
            {
                console.log(response);
            }
        );
    }
});

application.controller('PostsController', function ($scope, $http, postService)
{
    $scope.posts = postService.posts;

    $scope.addPost = function()
    {
        var messageText = $scope.postText;
        $scope.posts.push({
            userName: user_name,
            timestamp: '9:06:57',
            body: messageText
        });
        $scope.postText = '';
        postService.savePost({
            user_id: user_id,
            room_id: 1,
            text: messageText
        });
    }
});
