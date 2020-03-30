(function () {
    angular.module('generalApp')
        .controller('generalCtrl',['$scope','$http','generalService','$rootScope',
            function($scope,$http,generalService,$rootScope) {

            $scope.getUserInfo = function () {
                generalService.getInfo(function (response) {
                    $rootScope.user = response.data;
                })
            };
            $scope.getUserInfo();

        }]);

})();