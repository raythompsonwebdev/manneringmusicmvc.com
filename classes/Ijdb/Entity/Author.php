<?php
namespace Ijdb\Entity;

class Author {
	public $id;
	public $username;
	public $email;
	public $password;
	private $reviewsTable;

	public function __construct(\Ninja\DatabaseTable $reviewsTable) {
		$this->reviewsTable = $reviewsTable;
	}

	public function getReviews() {
		
		return $this->reviewsTable->find('authorId', $this->id);
	}

	public function addReviews($review) {

		$review['authorId'] = $this->id;

		$this->reviewsTable->save($review);
	}
}