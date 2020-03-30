(function () {
    angular.module('alertApp')
        .controller('alertCtrl',['$scope','$http','alertService','$timeout',
            function($scope,$http,alertService,$timeout) {
            var inst = $('[data-remodal-id=modal]').remodal();
            /**
             * Trigger alert 1
             */
            $scope.alert1 = function () {
                alertService.getHeartAlert(function (response) {
                    $timeout(function () {
                        $scope.heartAlert = response.data;
                        $scope.$apply();
                    });
                    inst.open();

                })
            };
            $scope.alert1();

            /**
             * Trigger alert 2
             */
            $scope.alert2 = function () {
                alertService.getSecondAlert(function (response) {
                    $scope.alert1 = response.data;
                })
            }


        }]);

})();