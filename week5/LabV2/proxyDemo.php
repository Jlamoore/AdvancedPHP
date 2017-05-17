<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css"/>
    </head>
    <body>
        <style type="text/css">
            textarea {
                width: 500px;
                height: 100px;
            }
            
            textarea[name="results"] {
                 height: 300px;
            }
        </style>
        
        <!-- Input -->
        
        <h1>Rest API Lab</h1>
        
        Verb/HTTP Method:<br />
        <select name="verb">
            <option value="GET">GET</option>
            <option value="POST">POST</option>
            <option value="PUT">PUT</option>
            <option value="DELETE">DELETE</option>
        </select>
        <br />
        <br />
        Resource for endpoint:<br />
        <input name="resource" value="corps" />
        <br />
        <br />
        Data(optional):<br />   
        Corporation Name: <input type="text" name="corp" value="" />
        <br />
        Incorporation Date: <input type="datetime-local" name="incorp_dt" />
        <br />
        Email <input type="email" name="email" value="" />
        <br />
        Owner Name: <input type="text" name="owner" value="" />
        <br />
        Phone: <input type="number" pattern="[0-9]*" maxlength="10" min="7" name="phone">
        <br />
        Location Latitude: <input type="number" pattern="[0-9]*" maxlength="10" min="1" name="lat">
        <br />
        Location Longitude: <input type="number" pattern="[0-9]*" maxlength="10" min="1" name="lon">
        <br />
        <br />
        <button>Make Call</button>
        <h3>Results</h3>
        
        <!-- Output -->
        
        <textarea name="results"></textarea>
        
        <script type="text/javascript">
        
            var callBtn = document.querySelector('button');
            
            callBtn.addEventListener('click', makeCall);
        
            function makeCall() {
                
                // Get fields
                
                var verbfield = document.querySelector('select[name="verb"]');
                var verb = verbfield.options[verbfield.selectedIndex].value;
                var resource = document.querySelector('input[name="resource"]').value;
                var data = {
                    'corp' : document.querySelector('input[name="corp"]').value,
                    'incorp_dt' : document.querySelector('input[name="incorp_dt"]').value,
                    'email' : document.querySelector('input[name="email"]').value,
                    'owner' : document.querySelector('input[name="owner"]').value,
                    'phone' : document.querySelector('input[name="phone"]').value,
                    'location' : document.querySelector('input[name="lat"]').value + ', ' + document.querySelector('input[name="lon"]').value
                };            
                var results = document.querySelector('textarea[name="results"]');

                var xmlhttp = new XMLHttpRequest();

                var url = './api/v1/' + resource;
                
                // Setup request

                xmlhttp.open(verb, url, true);

                // Send request

                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState === 4 ) {

                        console.log(xmlhttp.responseText);
                        results.value = xmlhttp.responseText;
                    } else {
                        // waiting for the call to complete
                    }
                };
                //var username = 'test';
               // xmlhttp.setRequestHeader("Authorization", "Basic " + btoa(username + "
               // "));

                 if ( verb === 'GET' ) {
                      xmlhttp.send(null);
                 } else {
                    xmlhttp.setRequestHeader('Content-type','application/json;charset=UTF-8');
                    xmlhttp.send(JSON.stringify(data));
                }
            }
        </script>       
    </body>
</html>
