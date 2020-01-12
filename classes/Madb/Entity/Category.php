<?php
namespace Madb\Entity;

use Ninja\DatabaseTable;

class Category {
	public $id;
	public $name;
	private $reviewsTable;
	private $reviewCategoriesTable;

	public function __construct(DatabaseTable $reviewsTable, DatabaseTable $reviewCategoriesTable) {
		$this->reviewsTable = $reviewsTable;
		$this->reviewCategoriesTable = $reviewCategoriesTable;
	}

	public function getReviews($limit = null, $offset = null) {
		$reviewCategories = $this->reviewCategoriesTable->find('categoryId', $this->id, null, $limit, $offset);

		$reviews = [];

		foreach ($reviewCategories as $reviewCategory) {
			$review =  $this->reviewsTable->findById($reviewCategory->reviewId);
			if ($review) {
				$reviews[] = $review;
			}			
		}

		usort($reviews, [$this, 'sortReviews']);

		return $reviews;
	}

	public function getNumReviews() {
		return $this->reviewCategoriesTable->total('categoryId', $this->id);
	}

	private function sortReviews($a, $b) {
		$aDate = new \DateTime($a->reviewdate);
		$bDate = new \DateTime($b->reviewdate);

		if ($aDate->getTimestamp() == $bDate->getTimestamp()) {
			return 0;
		}

		return $aDate->getTimestamp() < $bDate->getTimestamp() ? -1 : 1;
	}
}