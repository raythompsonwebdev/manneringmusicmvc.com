<?php

namespace Ijdb\Controllers;

use \Ninja\DatabaseTable;

class Music
{
    private $artistsTable;
    private $albumsTable;

    public function __construct(DatabaseTable $albumsTable, DatabaseTable $artistsTable)
    {
        $this->albumsTable = $albumsTable;
        $this->artistsTable = $artistsTable;
    }

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
