<?php

namespace Madb\Controllers;
use \Mannering\DatabaseTable;

class Music
{
    
    private $albumsTable;
    private $artistsTable;
    private $audioTable;
    

    public function __construct(DatabaseTable $albumsTable, DatabaseTable $audioTable, DatabaseTable $artistsTable)
    {
        $this->albumsTable = $albumsTable;
        $this->artistsTable = $artistsTable;
        $this->audioTable = $audioTable;
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
        }

        if (isset($_GET['artistid']) || isset($_GET['albumid'])) {
            $singleartist = $this->artistsTable->findArtistName($_GET['artistid']);
            $singleaudio = $this->audioTable->findSongId($_GET['artistid']);
           
        }

                    
        $title = 'Mannering Album Page';
              
        return ['template' => 'singleresult.html.php', 'title' => $title,'variables' =>[
          'singlealbums' => $singlealbums,
          'singleartist' => $singleartist,
          'singleaudio' => $singleaudio
          
        ]
        ];
    }

    public function artist()    {

        if (isset($_GET['albumid'])) {
            $singlealbums = $this->albumsTable->findById($_GET['albumid']);            
        }
               

        if (isset($_GET['artistid'])) {
            $singleartist = $this->artistsTable->findArtistName($_GET['artistid']);      

            $singleaudio = $this->artistsTable->findArtistSongs($_GET['artistid']);
            
            
        }

                    
        $title = 'Mannering Album Page';
              
        return ['template' => 'artist.html.php', 'title' => $title,'variables' =>[
          'singlealbums' => $singlealbums,
          'singleartist' => $singleartist,
          'singleaudio' => $singleaudio
          
        ]
        ];
    }
}
