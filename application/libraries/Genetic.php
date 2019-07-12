<?php

if (!defined('BASEPATH')) exit('No se permite el acceso directo al script');

class Genetic
{
    function validate_data($data)
    {
        $error = 0;
        foreach ($data as $dt) {
            $error += ($dt == '') ? 1 : 0;
        }
        return ($error > 0) ? false : true;
    }
}
