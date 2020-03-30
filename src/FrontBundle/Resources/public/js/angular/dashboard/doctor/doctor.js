(function () {
    angular.module('doctorApp',[])
        .config(function($interpolateProvider){
            $interpolateProvider.startSymbol('{[').endSymbol(']}');
        })
})();