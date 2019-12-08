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
  private $reviewsTable;
  private $categoriesTable;
  private $authentication;


  public function __construct(DatabaseTable $albumsTable,DatabaseTable $audioTable,DatabaseTable $artistsTable , DatabaseTable $authorsTable, DatabaseTable $reviewsTable , DatabaseTable $categoriesTable , Authentication $authentication )
  {
      $this->albumsTable = $albumsTable;
      $this->artistsTable = $artistsTable; 
      $this->audioTable = $audioTable;
      $this->authorsTable = $authorsTable;
      $this->reviewsTable = $reviewsTable;               
      $this->categoriesTable = $categoriesTable;
      $this->authentication = $authentication;
  }

  public function reviewslist() {

   

      if (isset($_GET['categories']))
      {
        $category = $this->categoriesTable->findById($_GET['categories']);
  
        $reviews = $category->getReviews();
         
  
      }else
      {
        
        $reviews = $this->reviewsTable->findAll() ;
       
      }	
  
      $title = 'Review list';
  
          $totalReviews = $this->reviewsTable->total();
          
          $author = $this->authentication->getUser();
  
       
      return ['template' => 'reviews.html.php', 
          'title' => $title, 
          'variables' => [
              'totalReviews' => $totalReviews,
                          'reviews' => $reviews,
                          'userId' => $author->authorId ?? null,
              'categories' => $this->categoriesTable->findAll()
            ]
          ];
  }
  
  public function delete() {
  
      $author = $this->authentication->getUser();
  
      $reviews = $this->reviewsTable->findById($_POST['authorId']);
  
      if ($reviews->authorId != $author->authorId && !$author->hasPermission(\Ijdb\Entity\Author::DELETE_JOKES) ) {
        return;
      }
  
      $this->reviewsTable->delete($_POST['authorId']);
  
      header('location: /reviews'); 
  }
      
  public function saveEdit() {

      $author = $this->authentication->getUser();

      $reviews = $_POST['review'];
      $reviews['reviewdate'] = new \DateTime();
      

      $reviewEntity = $author->addReview($reviews);

      $reviewEntity->clearCategories();

      foreach ($_POST['categories'] as $categoryId) {
        $reviewEntity->addCategory($categoryId);
      }


      
      header('location: /reviews'); 
  }
    
  public function edit() {
      
    $author = $this->authentication->getUser();

    if (isset($_GET['reviewsid'])) {
      $reviews = $this->reviewsTable->findById($_GET['reviewsid']);
    }

    $title = 'Edit Music';

    return ['template' => 'editreviews.html.php',
        'title' => $title,
        'variables' => [
                        'reviews' => $reviews ?? null,
                        'userId' => $author->id ?? null
          ]
        ];
  }
      
  ////////////////////////////

  public function home()
  {

      $rapalbums = $this->albumsTable->findByGenre('Hip Hop');
          
      $countryalbums = $this->albumsTable->findByGenre('Country');
      
      $jazzalbums = $this->albumsTable->findByGenre('Jazz');

        
      $title = 'Mannering Music';

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

        
      $title = 'Mannering Music';

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

      $title = 'Mannering Contact';
      
      return ['template' => 'contact.html.php', 'title' => $title];
  }

  public function search()
  {
  
      $title = 'Mannering Search';
      
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

  

                    
      $title = 'Single Albums';
              
      return ['template' => 'singleresult.html.php', 'title' => $title,'variables' =>[
          'singlealbums' => $singlealbums, 
          'singleartist' => $singleartist,
          'singleaudio' => $singleaudio
          
        ]
      ];
  }

       
        
} 
