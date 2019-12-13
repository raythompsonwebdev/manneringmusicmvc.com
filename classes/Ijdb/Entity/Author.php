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

    public $id;
    public $username;
    public $email;
    public $password;
    private $reviewTable;

    public function __construct(\Ninja\DatabaseTable $reviewTable)
    {
        $this->reviewTable = $reviewTable;
    }

    public function getReviews()
    {
        
        return $this->reviewTable->find('authorId', $this->id);
    }

    public function addReviews($review)
    {

        $review['authorId'] = $this->id;

        return $this->reviewTable->save($review);
    }

    public function hasPermission($permission)
    {
        return $this->permissions & $permission;
    }
}
