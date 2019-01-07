<?php
namespace Ijdb\Controllers;
use \Ninja\DatabaseTable;

class Register {
	
	private $usersTable;

	public function __construct(DatabaseTable $usersTable) {
		$this->usersTable = $usersTable;
	}

	public function registrationForm() {
		return ['template' => 'register.html.php', 
				'title' => 'Register an account'];
	}


	public function success() {
		return ['template' => 'registersuccess.html.php', 
			'title' => 'Registration Successful'];
	}

	public function registerUser() {
		$users = $_POST['users'];

		$this->usersTable->save($users);

		header('Location: /users/success');
	}
}