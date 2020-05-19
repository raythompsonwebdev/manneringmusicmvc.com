<?php
namespace Madb\Entity;

class Review
{
    public $id;
    public $authorId;
    public $reviewdate;
    public $reviewtext;
    private $authorsTable;
    private $author;
    private $reviewCategoriesTable;

    public function __construct(\Mannering\DatabaseTable $authorsTable, \Mannering\DatabaseTable $reviewCategoriesTable)
    {
        $this->authorsTable = $authorsTable;
        $this->reviewCategoriesTable = $reviewCategoriesTable;
    }

    public function getAuthor()
    {
        if (empty($this->author)) {
            $this->author = $this->authorsTable->findById($this->authorId);
        }
        
        return $this->author;
    }

    public function addCategory($categoryId)
    {
        $reviewCat = ['reviewId' => $this->id, 'categoryId' => $categoryId];

        $this->reviewCategoriesTable->save($reviewCat);
    }

    public function hasCategory($categoryId)
    {
        $reviewCategories = $this->reviewCategoriesTable->find('reviewId', $this->id);

        foreach ($reviewCategories as $reviewCategory) {
            if ($reviewCategory->categoryId == $categoryId) {
                return true;
            }
        }
    }

    public function clearCategories()
    {
        $this->reviewCategoriesTable->deleteWhere('reviewId', $this->id);
    }
}
