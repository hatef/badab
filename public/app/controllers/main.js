app.controller("mainctrl",function($scope,$http){
    $http.get('api/articles').then(function (response) {
        $scope.articles=response.data;
    })

});


