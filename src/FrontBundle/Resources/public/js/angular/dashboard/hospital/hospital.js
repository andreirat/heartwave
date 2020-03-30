(function () {
    angular.module('hospitalApp',['ngMap'])
        .config(function($interpolateProvider){
            $interpolateProvider.startSymbol('{[').endSymbol(']}');
        })

})();