application.service('postService', function()
{
    this.posts = [
        {
            userName: "Guy 1",
            timestamp: "9:06:57",
            body: "Lorem ipsum dolor sit amet, consectetur adipiscing elit."
        },
        {
            userName: "Guy 2",
            timestamp: "9:06:57",
            body: "Lorem ipsum dolor sit amet, consectetur adipiscing elit."
        },
        {
            userName: "Guy 1",
            timestamp: "9:06:57",
            body: "Lorem ipsum dolor sit amet, consectetur adipiscing elit."
        },
        {
            userName: "Guy 2",
            timestamp: "9:06:57",
            body: "Lorem ipsum dolor sit amet, consectetur adipiscing elit."
        }
    ]
});

function PostsController($scope, postService)
{
    $scope.posts = postService.posts;

    $scope.addPost = function()
    {
        $scope.posts.push({
            userName: userName,
            timestamp: '9:06:57',
            body: $scope.postText
        });
        $scope.postText = '';
    }
}
