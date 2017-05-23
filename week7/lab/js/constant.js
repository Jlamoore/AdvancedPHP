//As the name would suggest, this class is for constant values. 
//we always want the value of REQUEST to be the location of the phones json
(function() {
    'use strict'
    
    angular
            .module('app')
    // add REQUEST as a constant
            .constant("REQUEST", {
                'Phones' : './data/phones.json'
    });
})();