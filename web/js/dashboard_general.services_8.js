(function () {
    angular.module('generalApp')
        .service('generalService', ['$http', function ($http) {
            var dev = window.location.href.indexOf("app_dev") > -1 ? "/app_dev.php" : '' ;
            this.getInfo = function (callback) {
                $http.get(dev+'/api/users/info').then(callback);
            };
        }])
})();