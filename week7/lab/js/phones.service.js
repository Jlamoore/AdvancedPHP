//This is the logic behind the json data
(function() {
    'use strict';
    angular
            .module('app')
    //Create a new 'factory' or provider name it PhoneService
            .factory('PhonesService', PhonesService);
    
    //dynamically add the contant we created and the http data
    PhonesService.$inject = ['$http', 'REQUEST'];
    
    function PhonesService($http, REQUEST) {
        
        //get the location of the json from the constant
        var url = REQUEST.Phones;
        //create an associative array with the function names
        var service = {
            'getPhones' : getPhones,
            'findPhone' : findPhone
        };
        
        return service;
        
        //get all the phones
        function getPhones() {
            //preform an http request
            return $http.get(url)
                    .then(getPhonesComplete, getPhonesFailed);
            
            //completed do this
            function getPhonesComplete(response) {
                return response.data;
            }
            
            //failed do this
            function getPhonesFailed(error) {
                return [];
            }
        }
        
        //find the specific phone by ID
        function findPhone(id) {
            
            //get th phone list
            return getPhones()
                    .then(function(data) {
                        return findPhoneComplete(data);;
            });
            
            //Got the list, now loop through and find the phone
            function findPhoneComplete(data) {
                var results = {};
                
                angular.forEach(data, function (value, key) {
                    if (!results.length) {
                        if(value.hasOwnProperty('id') && value.id === id) {
                            results = angular.copy(value);;
                        }
                    }
                }, results);
                
                return results;
            }
        }
    }
})();