<?php
namespace Ijdb\Entity;

use Ninja\DatabaseTable;

class Category {
	public $categoriesId;
	public $name;
	private $reviewsTable;
	private $reviewsCategoriesTable;

	public function __construct(DatabaseTable $reviewsTable, DatabaseTable $reviewsCategoriesTable) {
		$this->reviewsTable = $reviewsTable;
		$this->reviewsCategoriesTable = $reviewsCategoriesTable;
	}

	public function getReviews() {
		$reviewsCategories = $this->reviewsCategoriesTable->find('categoriesId', $this->categoriesId);

		$reviews = [];

		foreach ($reviewsCategories as $reviewsCategory) {
			$review =  $this->reviewsTable->findById($reviewsCategory->reviewsId);
			if ($review) {
				$reviews[] = $review;
			}			
		}

		return $reviews;
	}
	
}