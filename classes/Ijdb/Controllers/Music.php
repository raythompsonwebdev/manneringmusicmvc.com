<?php

namespace Ijdb\Controllers;

use \Ninja\DatabaseTable;
use \Ninja\Authentication;

class Music
{
    private $authorsTable;
    private $reviewsTable;
    private $albumsTable;
    private $artistsTable;
    private $audioTable;
  

    public function __construct(DatabaseTable $albumsTable, DatabaseTable $authorsTable, DatabaseTable $reviewsTable, DatabaseTable $artistsTable, DatabaseTable $audioTable,  Authentication $authentication )
    {
        $this->albumsTable = $albumsTable;
        $this->reviewsTable = $reviewsTable;
        $this->authorsTable = $authorsTable;
        $this->artistsTable = $artistsTable;
        $this->audioTable = $audioTable;
        $this->authentication = $authentication;
    }

    public function reviews() {

		$result = $this->reviewsTable->findAll();

		$reviews = [];
		foreach ($result as $review) {

			$author = $this->authorsTable->findById($review->reviewsid);

			$reviews[] = [
				'reviewsid' => $review->reviewsid,
				'reviewtext' => $review->reviewtext,
				'reviewdate' => $review->reviewdate,
				'name' => $author->username,
                'email' => $author->email,
                'authorId' => $author->id
			];

		}


		$title = 'Review list';

        $totalReviews = $this->reviewsTable->total();
        
        $author = $this->authentication->getUser();

		ob_start();

		include  __DIR__ . '/../../templates/';

		$output = ob_get_clean();

		return ['template' => 'reviews.html.php', 
				'title' => $title, 
				'variables' => [
						'totalReviews' => $totalReviews,
                        'reviews' => $reviews,
                        'userId' => $author->id ?? null
					]
				];
	}

    public function delete() {

        $author = $this->authentication->getUser();

		$reviews = $this->reviewsTable->findById($_POST['id']);

		if ($reviews->authorid != $author->id) {
			return;
		}

		$this->reviewsTable->delete($_POST['authorid']);

		header('location: /reviews'); 
    }
    
	public function saveEdit() {

        $author = $this->authentication->getUser();

		$reviews = $_POST['review'];
		$reviews['reviewdate'] = new \DateTime();
		

		$author->addReview($reviews);
		
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

        $rap = $this->albumsTable->findByGenre('Hip Hop');

       
        $rapalbums = [];
                
        foreach ($rap as $rapalbum) {

            $artist = $this->artistsTable->findById($rapalbum->albumid);
                
            $rapalbums[] = [
                'albumid' => $rapalbum ->albumid,
                'album' => $rapalbum ->album,
                'image' => $rapalbum ->image,
                'price' => $rapalbum ->price,
                'text' => $rapalbum ->text,
                'artist' => $artist ->artist
            ];
        }



        $country = $this->albumsTable->findByGenre('Country');

        $countryalbums = [];
        
        foreach ($country as $countryalbum) {

            $artist = $this->artistsTable->findById($countryalbum->artistid);
            
            $countryalbums[] = [
                'albumid' => $countryalbum->albumid,
                'album' => $countryalbum->album,
                'image' => $countryalbum->image,
                'price' => $countryalbum->price,
                'text' => $countryalbum->text,
                'artist' => $artist->artist
            ];
        }

        $jazz = $this->albumsTable->findByGenre('Jazz');

        $jazzalbums = [];
        
        foreach ($jazz as $jazzalbum) {

            $artist = $this->artistsTable->findById($jazzalbum->artistid);
           
            $jazzalbums[] = [
                'albumid' => $jazzalbum->albumid,
                'album' => $jazzalbum->album,
                'image' => $jazzalbum->image,
                'price' => $jazzalbum->price,
                'text' => $jazzalbum->text,
                'artist' => $artist->artist
            ];
        }
        
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

    public function audio()
    {

        $rap = $this->albumsTable->findByGenre('Hip Hop');

        $rapalbums = [];
        
        foreach ($rap as $rapalbum) {

            $artist = $this->artistsTable->findById($rapalbum['artistid']);
            $song = $this->audioTable->findById($rapalbum['artistid']);
                            
            $rapalbums[] = [
                'albumid' => $rapalbum['albumid'],
                'album' => $rapalbum['album'],
                'image' => $rapalbum['image'],
                'text' => $rapalbum['text'],
                'artist' => $artist['artist'],
                'songtitle' => $song['songtitle'],
                'songMp3' => $song['mp3-files'],
                'songOgg' => $song['ogg-files'],
                'songMp4' => $song['mp4-files']

            ];
        }

        $country = $this->albumsTable->findByGenre('Country');

        $countryalbums = [];
        
        foreach ($country as $countryalbum) {

            $artist = $this->artistsTable->findById($countryalbum['artistid']);
            
            $countryalbums[] = [
                'albumid' => $countryalbum['albumid'],
                'album' => $countryalbum['album'],
                'image' => $countryalbum['image'],
                'text' => $countryalbum['text'],
                'artist' => $artist['artist']
            ];
        }

        $jazz = $this->albumsTable->findByGenre('Jazz');

        $jazzalbums = [];
        
        foreach ($jazz as $jazzalbum) {

            $artist = $this->artistsTable->findById($jazzalbum['artistid']);
            
            $jazzalbums[] = [
                'albumid' => $jazzalbum['albumid'],
                'album' => $jazzalbum['album'],
                'image' => $jazzalbum['image'],
                'text' => $jazzalbum['text'],
                'artist' => $artist['artist']
            ];
        }
        
        $title = 'Mannering Audio';

        return ['template' => 'audio.html.php',
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
        
        $title = 'Mannering Video';
        
        return ['template' => 'video.html.php', 'title' => $title];
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
            $singleartist = $this->artistsTable->findById($_GET['albumid']);
            $singleaudio = $this->audioTable->findById($_GET['albumid']);
                                       
        }

        

        
        $title = 'Cart';
                
        return ['template' => 'singleresult.html.php', 'title' => $title,'variables' =>[
            'singlealbums' => $singlealbums, 
            'singleartist' => $singleartist,
            'singleaudio' => $singleaudio
            
            
         ]
        ];
    }

       
        
} 
