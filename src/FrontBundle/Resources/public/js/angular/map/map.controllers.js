(function () {
    angular.module('livemapApp')
        .controller('livemapCtrl',['$scope','$http','NgMap','mapService','$timeout',
            function($scope,$http,NgMap, mapService, $timeout) {
            console.log('map');
            var vm = this;
            $scope.image = {
                url: '/bundles/front/images/icons/pin.png',
                size: [20, 32],
                origin: [0,0],
                anchor: [0, 32]
            };
            $scope.shape = {
                coords: [1, 1, 1, 20, 18, 20, 18 , 1],
                type: 'poly'
            };
            $scope.patients = [
                ['Bondi Beach', -33.890542, 151.274856, 4],
                ['Coogee Beach', -33.923036, 151.259052, 5],
                ['Cronulla Beach', -34.028249, 151.157507, 3],
                ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
                ['Maroubra Beach', -33.950198, 151.259302, 1]
            ];
            NgMap.getMap().then(function(map) {
               vm.map = map;

            });

            vm.showDetail = function (e, p) {
                vm.getFromDevice();
                vm.p = p;
                vm.map.showInfoWindow('foo-iw',this);
            };

            vm.hideDetail = function () {
                vm.map.hideInfoWindow('foo-iw');
            };

            /**
             * Query for patients details
             */
            $scope.getLiveStats = function () {
                mapService.getLiveStats(function (response) {
                    $scope.patients = response.data;
                })
            };
            $scope.getLiveStats();

            vm.getFromDevice = function () {
                mapService.getFromDevice(function (response) {
                    vm.liveStat = response.data;
                })
            };

            var inst = $('[data-remodal-id=modal]').remodal();

            vm.getDemo = function () {
                mapService.getDemo(function (response) {
                    vm.demoalert = response.data.data;
                    inst.open();
                })
            };
            $timeout(function () {
                vm.getDemo();
            },5000)
        }]);

})();