(function () {
    angular.module('homepageApp')
        .service('homepageService', ['$http', function ($http) {
            var dev = window.location.href.indexOf("app_dev") > -1 ? "/app_dev.php" : '' ;
        }])
})();