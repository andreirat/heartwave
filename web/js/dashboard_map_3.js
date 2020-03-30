(function () {
    angular.module('livemapApp',['ngMap'])
        .config(function($interpolateProvider){
            $interpolateProvider.startSymbol('{[').endSymbol(']}');
        })
})();