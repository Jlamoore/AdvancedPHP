//This class is the controller or the logic to the detail view
(function() {
    
    'use strict';
    angular
            .module('app')
    //add the controller to the 'module', call it PhoneDetailController
            .controller('PhoneDetailController', PhoneDetailController);
    //dynamically add the routeParamaters and PhoneService to the controller.
    PhoneDetailController.$inject = ['$routeParams', 'PhonesService'];
    
    //contruct the controller
    function PhoneDetailController($routeParams, PhonesService) {
        //used on the view
        var vm = this;
        //grab the id from $routeParams
        //the specifc phone
        vm.phone = {};
        //the id of the phone from the params
        var id = $routeParams.phoneId;
        
        activate();
        
        function activate() {
            //get the specific phone from the service by the id and set it to the phone variable
            PhonesService.findPhone(id).then(function(response) {
                vm.phone = response;
            });
        }
        
    }
})();