(function () {
    angular.module('generalApp',[])
        .config(function($interpolateProvider){
            $interpolateProvider.startSymbol('{[').endSymbol(']}');
        })
})();