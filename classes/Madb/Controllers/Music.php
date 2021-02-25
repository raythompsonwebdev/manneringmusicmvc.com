<?php

namespace Madb\Controllers;

//import database table class
use \Mannering\DatabaseTable;

class Music
{

    private $albumsTable;
    private $artistsTable;
    private $audioTable;
    private $videosTable;


    public function __construct(DatabaseTable $albumsTable, DatabaseTable $artistsTable, DatabaseTable $audioTable, DatabaseTable $videosTable)
    {
        $this->albumsTable = $albumsTable;
        $this->artistsTable = $artistsTable;
        $this->audioTable = $audioTable;
        $this->videosTable = $videosTable;
    }



    public function home()
    {

        $rapalbums = $this->albumsTable->find('genre', 'Hip Hop', 'Rand()', 5, null);

        $countryalbums = $this->albumsTable->find('genre', 'Country', 'Rand()', 5, null);

        $jazzalbums = $this->albumsTable->find('genre', 'Jazz', 'Rand()', 5, null);


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

    /**
     * album page
     * @return object $rapvideos returns object with all hip hop videos fields
     * @return object $countryvideos returns object with all country videos fields
     * @return object $jazzvideos returns object with all jazz video fields
     * @return object $title returns object with page title
     *
     * */
    public function video()
    {

        $rapvideos = $this->videosTable->find('video_genre', 'Hip Hop');

        $countryvideos = $this->videosTable->find('video_genre', 'Country');

        $jazzvideos = $this->videosTable->find('video_genre', 'Jazz');


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
    /**
     * album page
     * @return object $singlealbums returns object with all album fields
     * @return object $singleartist returns object with all artist fields
     * @return object $singleaudio returns object audio fields related to album
     * @return object $title returns object with page title
     *
     * */
    public function singleresult()
    {

        if (isset($_GET['albumid'])) {
            $singlealbums = $this->albumsTable->findById($_GET['albumid']);
            $singleaudio = $this->audioTable->findAlbumSongs($_GET['albumid']);
        }

        if (isset($_GET['artistid'])) {
            $singleartist = $this->artistsTable->findById($_GET['artistid']);
        }


        $title = 'Mannering Album Page';

        return ['template' => 'singleresult.html.php', 'title' => $title,'variables' =>[
          'singlealbums' => $singlealbums,
          'singleartist' => $singleartist,
          'singleaudio' => $singleaudio
        ]
        ];
    }
    /**
     * artist page
     * @return object $singlealbums returns object with albums relating to artist
     * @return object $singleartist returns object with all artist fields
     * @return object $singleaudio returns object audio fields related to artist
     * @return object $title returns object with page title
     *
     * */
    public function artist()
    {

        if (isset($_GET['artistid'])) {
                        $singleartist = $this->artistsTable->findById($_GET['artistid']);
                        $singleaudio = $this->audioTable->findArtistSongs($_GET['artistid']);
                        $singlealbums = $this->albumsTable->findArtistAlbums($_GET['artistid']);
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
