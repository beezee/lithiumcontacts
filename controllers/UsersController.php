<?php

namespace app\controllers;

use app\models\User;
use lithium\security\Auth;
use lithium\action\DispatchException;

class UsersController extends \lithium\action\Controller {

	public function add() {
		$user = User::create();

		if (($this->request->data) && $user->save($this->request->data)) {
            Auth::set('member', array('id' => $user->id));
			return $this->redirect(array('Contacts::dashboard'));
		}
		return compact('user');
	}

    public function login() {
        $authFailed = false;
        if (Auth::check('member', $this->request)){
			return $this->redirect(array('Contacts::dashboard'));
        }
        if ($this->request->data){
            $authFailed = true;
        }
        return compact('authFailed');
    }

    public function logout() {
        Auth::clear('member');
        return $this->redirect('/');
    }

}

?>
