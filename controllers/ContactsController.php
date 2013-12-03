<?php

namespace app\controllers;

use app\models\Contact;
use app\models\User;
use lithium\action\DispatchException;

class ContactsController extends \lithium\action\Controller {

    public function dashboard() {
        $contact = Contact::create();
        $contacts = Contact::all(array('conditions' => array('user_id' => User::current()->id)));
        $states = Contact::stateOptions();
		if (($this->request->data) && $contact->save($this->request->data)) {
			return $this->redirect(array('Contacts::dashboard'));
		}
        return compact('contacts', 'contact', 'states');
    }

	public function edit() {
		$contact = Contact::find($this->request->id);
        $states = Contact::stateOptions();

		if (!$contact) {
			return $this->redirect('Contacts::dashboard');
		}
		if (($this->request->data) && $contact->save($this->request->data)) {
			return $this->redirect(array('Contacts::dashboard'));
		}
		return compact('contact', 'states');
	}

	public function delete() {
		if (!$this->request->is('post') && !$this->request->is('delete')) {
			$msg = "Contacts::delete can only be called with http:post or http:delete.";
			throw new DispatchException($msg);
		}
		$contact = Contact::find($this->request->data['id']);
        if ($contact->user_id == User::current()->id)
            $contact->delete();
		return $this->redirect('Contacts::dashboard');
	}
}

?>
