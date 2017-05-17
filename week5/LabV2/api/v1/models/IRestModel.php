<?php

/**
 *
 * @author GFORTI, 
 */
interface IRestModel {
    function getAll();
    function get($id); 
    function post($serverData);
    function put($serverData, $id);
    function delete($id);
}
