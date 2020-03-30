(function () {
    angular.module('livemapApp',['ngMap'])
        .config(function($interpolateProvider,$qProvider){
            $interpolateProvider.startSymbol('{[').endSymbol(']}');
            $qProvider.errorOnUnhandledRejections(false);
        })

})();