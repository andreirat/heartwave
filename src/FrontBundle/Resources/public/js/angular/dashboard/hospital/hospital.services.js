(function () {
    angular.module('hospitalApp')
        .service('hospitalService', ['$http', function ($http) {
            var dev = window.location.href.indexOf("app_dev") > -1 ? "/app_dev.php" : '' ;
            this.getStats = function (callback) {
                $http.get(dev+'/api/hospital/dashboard').then(callback);
            };
            this.getDoctors = function (callback) {
                $http.get(dev+'/api/hospital/doctors').then(callback);
            };
            this.getLiveStats = function (callback) {
                $http.get(dev+'/api/patients/live/stats').then(callback);
            };
            this.getHistoryStats = function (data,callback) {
                $http.post(dev+'/api/patients/history/stats',data).then(callback);
            };
            this.getHeartAlert = function (callback) {
                $http.get(dev+'/api/alerts/heart').then(callback);
            };
            this.getSecondAlert = function (callback) {
                $http.get(dev+'/api/alerts/second').then(callback);
            };
        }])
})();