<?php
namespace Ijdb\Entity;

use Ninja\DatabaseTable;

class Category
{
    public $categoriesId;
    public $name;
    private $reviewsTable;
    private $reviewsCategoriesTable;

    public function __construct(DatabaseTable $reviewsTable, DatabaseTable $reviewsCategoriesTable)
    {
        $this->reviewsTable = $reviewsTable;
        $this->reviewsCategoriesTable = $reviewsCategoriesTable;
    }

    public function getReviews($limit = null, $offset = null)
    {
        $reviewsCategories = $this->reviewsCategoriesTable->find('categoriesId', $this->categoriesId, null, $limit, $offset);

        $reviews = [];

        foreach ($reviewsCategories as $reviewsCategory) {
            $review =  $this->reviewsTable->findById($reviewsCategory->reviewsId);
            if ($review) {
                $reviews[] = $review;
            }
        }

        usort($reviews, [$this, 'sortReviews']);

        return $reviews;
    }

    public function getNumReviews()
    {
        return $this->reviewsCategoriesTable->total('categoryId', $this->categoriesId);
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
