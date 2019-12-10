<?php
namespace Ijdb\Entity;

class Review
{
    public $reviewsId;
    public $authorId;
    public $reviewdate;
    public $reviewtext;
    private $authorsTable;
    private $author;
    private $reviewsCategoriesTable;

    public function __construct(\Ninja\DatabaseTable $authorsTable, \Ninja\DatabaseTable $reviewsCategoriesTable)
    {
        $this->authorsTable = $authorsTable;
        $this->reviewsCategoriesTable = $reviewsCategoriesTable;
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
        $reviewsCat = ['reviewsId' => $this->reviewsId, 'categoriesId' => $categoryId];

        $this->reviewsCategoriesTable->save($reviewsCat);
    }

    public function hasCategory($categoryId)
    {
        $reviewsCategories = $this->reviewsCategoriesTable->find('reviewsId', $this->reviewsId);

        foreach ($reviewsCategories as $reviewsCategory) {
            if ($reviewsCategory->categoryId == $categoryId) {
                return true;
            }
        }
    }

    public function clearCategories()
    {
        $this->reviewsCategoriesTable->deleteWhere('reviewsId', $this->reviewsId);
    }
}
