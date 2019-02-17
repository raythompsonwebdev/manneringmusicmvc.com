<?php

namespace Ijdb\Controllers;

use \Ninja\DatabaseTable;

class Music
{
    private $authorsTable;
    private $artistsTable;
    private $albumsTable;

    public function __construct(DatabaseTable $albumsTable, DatabaseTable $artistsTable, DatabaseTable $authorsTable )
    {
        $this->albumsTable = $albumsTable;
        $this->artistsTable = $artistsTable;
        $this->authorsTable = $authorsTable;
    }

    public function list() {

		$result = $this->albumsTable->findAll();

        $musics = [];
        
		foreach ($result as $music) {

            $artist = $this->artistsTable->findById($music['artistid']);

			$author = $this->authorsTable->findById($music['id']);
			            
            $musics[] = [
                'albumid' => $music['albumid'],
                'album' => $music['album'],
                'image' => $music['image'],
                'price' => $music['price'],
                'text' => $music['text'],
                'artist' => $artist['artist'],
                'name' => $author['name'],
				'email' => $author['email']
            ];

		}


		$title = 'Music list';

		$totalMusic = $this->artistsTable->total();

		ob_start();

		include  __DIR__ . '/../../templates/';

		$output = ob_get_clean();

		return ['template' => 'musics.html.php', 
				'title' => $title, 
				'variables' => [
						'totalMusic' => $totalMusic,
						'musics' => $musics
					]
				];
    }

    public function delete() {

		$this->albumsTable->delete($_POST['albumid']);

		header('location: /list'); 
	}

	public function saveEdit() {
		$music = $_POST['music'];
		//$joke['jokedate'] = new \DateTime();
		$music['id'] = 1;

		$this->albumsTable->save($music);
		
		header('location: /list'); 
	}

	public function edit() {
        
		if (isset($_GET['id'])) {

			$music = $this->albumsTable->findById($_GET['id']);
		}

		$title = 'Edit Music';

		return ['template' => 'editmusic.html.php',
				'title' => $title,
				'variables' => [
						'music' => $music ?? null
					]
				];
    }
    
    
    
    ////////////////////////////

    public function home()
    {

        $rap = $this->albumsTable->findByGenre('Hip Hop');

        $rapalbums = [];
        
        foreach ($rap as $rapalbum) {
            $artist = $this->artistsTable->findById($rapalbum['artistid']);

            $rapalbums[] = [
                'albumid' => $rapalbum['albumid'],
                'album' => $rapalbum['album'],
                'image' => $rapalbum['image'],
                'price' => $rapalbum['price'],
                'text' => $rapalbum['text'],
                'artist' => $artist['artist']
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
                'price' => $countryalbum['price'],
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
                'price' => $jazzalbum['price'],
                'text' => $jazzalbum['text'],
                'artist' => $artist['artist']
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

            $rapalbums[] = [
                'albumid' => $rapalbum['albumid'],
                'album' => $rapalbum['album'],
                'image' => $rapalbum['image'],
                'text' => $rapalbum['text'],
                'artist' => $artist['artist']
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

    public function addtocart()
    {

        if (isset($_GET['albumid'])) {
            $singlealbums = $this->albumsTable->findById($_GET['albumid']);
        }
                        
        $title = 'Cart';
                
        return ['template' => 'addtocart.html.php', 'title' => $title,'variables' =>[
            'singlealbums' => $singlealbums]
        ];
    }
}
