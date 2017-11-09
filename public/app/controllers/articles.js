app.controller("articlesCtrl",function ($scope,$http) {
    var baseUrl="/";
    var loadArticles=function () {

        $http.get("/web/api/articles").then(function (response) {
            $scope.articles=response.data;
        })
    };
    $scope.setPostId=function($id) {
        $scope.post_id=$id;
    };
    $scope.deleteArticle=function($id) {
        var idData={"id":$id};
        var deleteRoute=laroute.route("deleteProperty");
        $http({
            method:"post",
            url:deleteRoute,
            data: idData
        }).then(function (data,status,headers,config) {
            console.log(data.data);
            loadArticles()


        });

    };


    loadArticles();
});