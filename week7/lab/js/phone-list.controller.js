////This class is the controller or the logic to the list view
(function() {
    
    'use strict';
    angular
            .module('app')
     //add the controller to the 'module', call it PhoneListController
            .controller('PhoneListController', PhoneListController);
    //dynamically add the and PhoneService to the controller
    PhoneListController.$inject = ['PhonesService'];
    
    function PhoneListController(PhonesService) {
        //used on the view
        var vm = this;
        //create an empty array of phones
        vm.phones = [];
        
        activate();
        
        function activate() {}
        //get the phone from the service then add the phones to the array
        PhonesService.getPhones().then(function(response) {
            vm.phones = response;
        });
    }
    
})();