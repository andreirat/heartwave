(function () {
    angular.module('homepageApp',[])
        .config(function($interpolateProvider){
            $interpolateProvider.startSymbol('{[').endSymbol(']}');
        })

})();