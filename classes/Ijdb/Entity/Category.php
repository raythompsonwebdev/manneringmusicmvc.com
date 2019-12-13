<?php
namespace Ijdb\Entity;

use Ninja\DatabaseTable;

class Category
{
    public $id;
    public $name;
    private $reviewTable;
    private $reviewCategoriesTable;

    public function __construct(DatabaseTable $reviewTable, DatabaseTable $reviewCategoriesTable)
    {
        $this->reviewTable = $reviewTable;
        $this->reviewCategoriesTable = $reviewCategoriesTable;
    }

    public function getReviews($limit = null, $offset = null)
    {
        $reviewCategories = $this->reviewCategoriesTable->find('categoryId', $this->id, null, $limit, $offset);

        $reviews = [];

        foreach ($reviewCategories as $reviewCategory) {
            $review =  $this->reviewTable->findById($reviewCategory->reviewId);
            if ($review) {
                $reviews[] = $review;
            }
        }

        usort($reviews, [$this, 'sortReviews']);

        return $reviews;
    }

    public function getNumReviews()
    {
        return $this->reviewCategoriesTable->total('categoryId', $this->id);
    }

    private function sortReviews($a, $b)
    {
        $aDate = new \DateTime($a->reviewdate);
        $bDate = new \DateTime($b->reviewdate);

        if ($aDate->getTimestamp() == $bDate->getTimestamp()) {
            return 0;
        }

        return $aDate->getTimestamp() < $bDate->getTimestamp() ? -1 : 1;
    }
}
