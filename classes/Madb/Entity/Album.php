<?php
namespace Madb\Entity;

class Album
{
    public $albumid;
    public $album;
    public $image;
    public $price;
    public $text;
    public $artistId;
    public $genre;
    private $artistsTable;
    private $audioTable;

        
    
    public function __construct(\Mannering\DatabaseTable $artistsTable, \Mannering\DatabaseTable $audioTable)
    {
        
        $this->artistsTable = $artistsTable;
        $this->audioTable = $audioTable;
    }

    public function getAlbumId()
    {

        return $this->albumid;
    }

    public function getArtistId()
    {
        
        return $this->artistsTable->findById($this->artistId);
    }

    public function getArtistName()
    {

        return $this->artistsTable->findById($this->artistId);
    }

    

    public function getSongId()
    {

        return $this->audioTable->findSongId($this->albumId);
    }
}
