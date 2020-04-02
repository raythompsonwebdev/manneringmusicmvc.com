<?php
namespace Madb\Entity;

class Author {

	const EDIT_REVIEWS = 1;
	const DELETE_REVIEWS = 2;
	const ADD_CATEGORIES = 4;
	const EDIT_CATEGORIES = 8;
	const REMOVE_CATEGORIES = 16;
	const EDIT_USER_ACCESS = 32;

	public $id;
	public $name;
	public $email;
	public $password;
	private $reviewsTable;

	public function __construct(\Ninja\DatabaseTable $reviewTable) {
		$this->reviewsTable = $reviewTable;
	}

	public function getReviews() {
		return $this->reviewsTable->find('authorId', $this->id);
	}

	public function addReview($review) {
		$review['authorId'] = $this->id;

		return $this->reviewsTable->save($review);
	}

	public function hasPermission($permission) {
		return $this->permissions & $permission;  
	}
}