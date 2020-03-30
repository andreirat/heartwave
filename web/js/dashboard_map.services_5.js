(function () {
    angular.module('livemapApp')
        .service('mapService', ['$http', function ($http) {
            var dev = window.location.href.indexOf("app_dev") > -1 ? "/app_dev.php" : '' ;
            this.getLiveStats = function (callback) {
                $http.get(dev+'/api/patients/live/stats').then(callback);
            };
        }])
})();