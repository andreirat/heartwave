(function () {
    angular.module('hospitalApp')
        .controller('hospitalCtrl',['$scope','$rootScope','$http','hospitalService', 'NgMap',
            function($scope,$rootScope,$http,hospitalService, NgMap) {
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
                NgMap.getMap().then(function(map) {
                    vm.map = map;
                });
                vm.showDetail = function (e, p) {
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
                    hospitalService.getLiveStats(function (response) {
                        $scope.patients = response.data;
                    })
                };
                $scope.getLiveStats();

            // /**
            //  * Query for hospital doctors
            //  */
            // $scope.getHospitalStats = function () {
            //     hospitalService.getStats(function (response) {
            //         $scope.stats = response.data;
            //     })
            // };

                /**
                 * Query for hospital doctors
                 */
            $scope.getHospitalDoctors = function () {
              hospitalService.getDoctors(function (response) {
                  $scope.doctors = response.data.doctors;
                  $scope.stats = response.data.stats;
              })
            };


            $scope.getPatientHistoryStats = function (p) {
              hospitalService.getHistoryStats({'patient': p},function (response) {

              })
            };

            $scope.getPatientHistoryStats(1);
            // $scope.getHospitalStats();
            $scope.getHospitalDoctors();

                Highcharts.chart('container', {
                    chart: {
                        type: 'areaspline'
                    },
                    title: {
                        text: ''
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'left',
                        verticalAlign: 'top',
                        x: 150,
                        y: 100,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor: '#FFFFFF'
                    },
                    xAxis: {
                        categories: [
                            'Monday',
                            'Tuesday',
                            'Wednesday',
                            'Thursday',
                            'Friday',
                            'Saturday',
                            'Sunday'
                        ]
                    },
                    yAxis: {
                        title: {
                            text: 'Week stats'
                        }
                    },
                    tooltip: {
                        shared: true,
                        valueSuffix: ' '
                    },
                    credits: {
                        enabled: false
                    },
                    plotOptions: {
                        areaspline: {
                            fillOpacity: 0.5
                        }
                    },
                    series: [{
                        name: 'Patients',
                        data: [3, 4, 3, 5, 4, 10, 12]
                    },
                        {
                            name: 'Surgeries',
                            color: '#9ddb18',
                            data: [7, 2, 5, 2, 8, 29, 2]
                        }]
                });



            }])
         .controller('docCtrl',['$scope','$rootScope','$http','hospitalService', 'NgMap',
        function($scope,$rootScope,$http,hospitalService, NgMap) {

            /**
             * Query for hospital doctors
             */
            $scope.getHospitalDoctors = function () {
                hospitalService.getDoctors(function (response) {
                    $scope.doctors = response.data;
                })
            };
            $scope.getHospitalDoctors();


        }]);


})();