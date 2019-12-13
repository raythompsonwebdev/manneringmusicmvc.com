<?php

namespace Ijdb\Controllers;

use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class Music
{
    
    private $albumsTable;
    private $artistsTable;
    private $audioTable;
    private $authorsTable;
    private $reviewTable;
    private $categoryTable;
    private $authentication;


    public function __construct(DatabaseTable $albumsTable, DatabaseTable $audioTable, DatabaseTable $artistsTable, DatabaseTable $authorsTable, DatabaseTable $reviewTable, DatabaseTable $categoryTable, Authentication $authentication)
    {
        $this->albumsTable = $albumsTable;
        $this->artistsTable = $artistsTable;
        $this->audioTable = $audioTable;
        $this->authorsTable = $authorsTable;
        $this->reviewTable = $reviewTable;
        $this->categoryTable = $categoryTable;
        $this->authentication = $authentication;
    }

    public function reviewslist()
    {

        $page = $_GET['page'] ?? 1;

        $offset = ($page-1)*10;

        if (isset($_GET['category'])) {
            $category = $this->categoryTable->findById($_GET['category']);
  
            $reviews = $category->getReviews(10, $offset);
              $totalReviews = $category->getNumReviews();
        } else {
            $reviews = $this->reviewTable->findAll('reviewdate DESC', 10, $offset);
            $totalReviews = $this->reviewTable->total();
        }
  
            $title = 'Mannering Review List';
  
            $totalReviews = $this->reviewTable->total();
            
            $author = $this->authentication->getUser();
  
       
        return ['template' => 'reviews.html.php',
          'title' => $title,
          'variables' => [
              'totalReviews' => $totalReviews,
              'reviews' => $reviews,
              'user' => $author,
              'currentPage' => $page,
              'categories' => $this->categoryTable->findAll(),
              'categoryId' => $_GET['category'] ?? null
            ]
          ];
    }
  
    public function delete()
    {
  
        $author = $this->authentication->getUser();
  
        $review = $this->reviewTable->findById($_POST['id']);
  
        if ($review->authorId != $author->id && !$author->hasPermission(\Ijdb\Entity\Author::DELETE_REVIEWS)) {
            return;
        }
  
        $this->reviewTable->delete($_POST['id']);
  
        header('location: /reviews');
    }
      
    public function saveEdit()
    {

        $author = $this->authentication->getUser();

        $reviews = $_POST['review'];
        $reviews['reviewdate'] = new \DateTime();
      

        $reviewEntity = $author->addReviews($reviews);

        $reviewEntity->clearCategories();

        foreach ($_POST['category'] as $categoryId) {
            $reviewEntity->addCategory($categoryId);
        }
        header('location: /reviews');
    }
    
    public function edit()
    {
      
        $author = $this->authentication->getUser();
        $categories = $this->categoryTable->findAll();

        if (isset($_GET['id'])) {
            $reviews = $this->reviewTable->findById($_GET['id']);
        }

        $title = 'Edit Review';

        return ['template' => 'editreviews.html.php',
        'title' => $title,
        'variables' => [
                        'reviews' => $reviews ?? null,               
                        'user' => $author,
                        'categories' => $categories
          ]
        ];
    }
      
  ////////////////////////////

    public function home()
    {

        $rapalbums = $this->albumsTable->findByGenre('Hip Hop');
          
        $countryalbums = $this->albumsTable->findByGenre('Country');
      
        $jazzalbums = $this->albumsTable->findByGenre('Jazz');

        
        $title = 'Mannering Home Page';

        return ['template' => 'home.html.php',
              'title' => $title,
              'variables' => [
                      'rapalbums' => $rapalbums,
                      'countryalbums' => $countryalbums,
                      'jazzalbums' => $jazzalbums
                  ]
              ];
    }
  
    public function video()
    {
      
        $rapvideos = $this->albumsTable->findVideoByGenre('Hip Hop');
          
        $countryvideos = $this->albumsTable->findVideoByGenre('Country');
      
        $jazzvideos = $this->albumsTable->findVideoByGenre('Jazz');

        
        $title = 'Mannering Video Page';

        return ['template' => 'video.html.php',
              'title' => $title,
              'variables' => [
                      'rapvideos' => $rapvideos,
                      'countryvideos' => $countryvideos,
                      'jazzvideos' => $jazzvideos
                  ]
              ];
    }

    public function contact()
    {

        $title = 'Mannering Contact Page';
      
        return ['template' => 'contact.html.php', 'title' => $title];
    }

    public function search()
    {
  
        $title = 'Mannering Search Page';
      
        return ['template' => 'search.html.php', 'title' => $title];
    }

    public function singleresult()
    {
                                                      
        if (isset($_GET['albumid'])) {
            $singlealbums = $this->albumsTable->findById($_GET['albumid']);
            $singleaudio = $this->audioTable->findSongId($_GET['albumid']);
        }

        if (isset($_GET['artistid'])) {
            $singleartist = $this->artistsTable->findArtistName($_GET['artistid']);
        }

                    
        $title = 'Mannering Album Page';
              
        return ['template' => 'singleresult.html.php', 'title' => $title,'variables' =>[
          'singlealbums' => $singlealbums,
          'singleartist' => $singleartist,
          'singleaudio' => $singleaudio
          
        ]
        ];
    }
}
