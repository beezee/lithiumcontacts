<?php

use lithium\storage\Session;

use lithium\security\Auth;

Session::config(array(
    'default' => array('adapter' => 'Php')
));

Auth::config(array(
    'member' => array(
        'adapter' => 'Form',
        'model' => 'User',
        'fields' => array('username', 'password')
    )
));
?>
