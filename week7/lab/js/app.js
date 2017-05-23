//this is the 'main hub' of the application.
//This class links together the views and the controllers. 
(function () {
    'use strict';
    angular
            .module('app', ['ngRoute'])
            .config(config);

    config.$inject = ['$routeProvider'];
//this function 'routes' the views
    function config($routeProvider) {
        $routeProvider.
                when('/', {
                    //This is the view to load.
                    templateUrl: 'js/phone-list.template.html',
                    //This is the controller that will be used.
                    controller: 'PhoneListController',
                    //vm will be the variable that the controller is stored to.
                    controllerAs: 'vm'
                }).
                when('/phones/:phoneId', {
                    templateUrl: 'js/phone-detail.template.html',
                    controller: 'PhoneDetailController',
                    controllerAs: 'vm'
                }).
                otherwise({
                    redirectTo: '/'
                });
    }

})();