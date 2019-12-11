<?php
namespace Ijdb\Entity;

class Author
{

    const EDIT_REVIEWS = 1;
    const DELETE_REVIEWS = 2;
    const ADD_CATEGORIES = 4;
    const EDIT_CATEGORIES = 8;
    const REMOVE_CATEGORIES = 16;
    const EDIT_USER_ACCESS = 32;

    public $authorId;
    public $username;
    public $email;
    public $password;
    private $reviewsTable;

    public function __construct(\Ninja\DatabaseTable $reviewsTable)
    {
        $this->reviewsTable = $reviewsTable;
    }

    public function getReviews()
    {
        
        return $this->reviewsTable->find('authorId', $this->authorId);
    }

    public function addReviews($review)
    {

        $review['authorId'] = $this->authorId;

        return $this->reviewsTable->save($review);
    }

    public function hasPermission($permission)
    {
        return $this->permissions & $permission;
    }
}
