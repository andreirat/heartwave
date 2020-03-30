(function () {
    angular.module('livemapApp')
        .service('mapService', ['$http', function ($http) {
            var dev = window.location.href.indexOf("app_dev") > -1 ? "/app_dev.php" : '' ;
            this.getLiveStats = function (callback) {
                $http.get(dev+'/api/patients/live/stats').then(callback);
            };
            this.getFromDevice = function (callback) {
                $http.get('http://10.1.0.2:8080/api/live').then(callback);
            };
            this.getDemo = function (callback) {
                $http.get('http://10.1.0.2:8080/api/demo').then(callback);
            };
        }])
})();