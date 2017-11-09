app.controller("usersCtrl",function ($scope,$http) {
    var loadData=function () {
        $http.get("/web/api/users/index/1").then(function (response) {
            $scope.users=response.data;
        });
    };

    $scope.setUserId=function($id) {
        $scope.user_id=$id;
    };
    $scope.delete=function ($id) {

        var idData={"id":$id};
        $http({
            method:"post",
            url:'/web/api/users/delete',
            data: idData
        }).then(function (data,status,headers,config) {
            console.log(data.data);
            loadData()
        });

    };

    $scope.upgrade=function ($id,$role) {

        var idData={"id":$id,"role":$role};
        $http({
            method:"post",
            url:'/web/api/users/upgrade',
            data: idData
        }).then(function (data,status,headers,config) {
            console.log(data.data);

            loadData()
        });
    };
    loadData();

});