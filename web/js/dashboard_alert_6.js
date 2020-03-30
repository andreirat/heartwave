(function () {
    angular.module('alertApp',['hospitalApp'])
        .config(function($interpolateProvider){
            $interpolateProvider.startSymbol('{[').endSymbol(']}');
        })
})();