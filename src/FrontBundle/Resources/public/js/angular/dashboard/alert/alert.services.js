(function () {
    angular.module('alertApp')
        .service('alertService', ['$http', function ($http) {
            var dev = window.location.href.indexOf("app_dev") > -1 ? "/app_dev.php" : '' ;
            this.getHeartAlert = function (callback) {
                $http.get(dev+'/api/alerts/heart').then(callback);
            };
            this.getSecondAlert = function (callback) {
                $http.get(dev+'/api/alerts/second').then(callback);
            };
        }])
})();