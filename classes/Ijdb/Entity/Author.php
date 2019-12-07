<?php
namespace Ijdb\Entity;

class Author {



	public $authorId;
	public $username;
	public $email;
	public $password;
	private $reviewsTable;

	public function __construct(\Ninja\DatabaseTable $reviewsTable) {
		$this->reviewsTable = $reviewsTable;
	}

	public function getReviews() {
		
		return $this->reviewsTable->find('authorId', $this->authorId);
	}

	public function addReviews($review) {

		$review['authorId'] = $this->authorId;

		return $this->reviewsTable->save($review);
	}
}