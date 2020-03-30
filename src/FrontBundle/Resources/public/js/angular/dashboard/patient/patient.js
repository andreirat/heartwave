(function () {
    angular.module('patientApp',[])
        .config(function($interpolateProvider){
            $interpolateProvider.startSymbol('{[').endSymbol(']}');
        })

})();