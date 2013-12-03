<?php

namespace app\models;
use lithium\security\Auth;

class User extends \lithium\data\Model {

    protected $_meta = array(
                'name' => null,
                'title' => null,
                'class' => null,
                'source' => 'users',
                'connection' => 'default'
        );

    public $hasMany = array('Contact');

	public $validates = array(
        'username' => array(
            array('notEmpty', 'message' => 'Username is required')
        ),
        'password' => array(
            array('notEmpty', 'message' => 'Password is required')
        ),
    );

    public static function current($request = null) {
        if ($request === false) {
            return Auth::clear('member');
        }
        $data = $request ? Auth::check('member', $request) : Auth::check('member');
        return $data ? static::create($data, array('exists' => true)) : null;
    }
}

User::applyFilter('save', function($self, $params, $chain){

    if (isset($params['data']['password'])){
        $params['data']['password'] 
            = \lithium\security\Password::hash($params['data']['password']);
    }

    return $chain->next($self, $params, $chain);
});

?>
