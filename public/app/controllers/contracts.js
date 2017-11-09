app.controller("contractsCtrl",function ($scope,$http) {
    var baseUrl = "/minuut/public";
    $scope.setContractId=function ($id) {
        $scope.contract_id=$id;
    }
    var loadContracts = function () {

        $http.get("/web/api/moderator/contract/index").then(function (response) {
            $scope.contracts = response.data;
        })
    };
    $scope.deleteContract=function($id) {
        alert($id)
        var idData={"id": $id};
        var deleteRoute=baseUrl+"/web/api/moderator/contract/delete";
        $http({
            method:"post",
            url:deleteRoute,
            data: idData
        }).then(function (data,status,headers,config) {
            console.log(data.data);
            loadContracts()


        });

    };

    loadContracts();
});