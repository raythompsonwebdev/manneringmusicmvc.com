<?php
namespace Ijdb\Entity;

class Review {
	public $id;
	public $authorId;
	public $reviewdate;
	public $reviewtext;
	private $authorsTable;

	public function __construct(\Ninja\DatabaseTable $authorsTable) {
		$this->authorsTable = $authorsTable;
	}

	public function getAuthor() {
		return $this->authorsTable->findById($this->id);
	}
}