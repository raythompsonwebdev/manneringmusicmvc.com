<?php
namespace Madb\Entity;

class Artist
{
    public $id;
    public $artist_name;
    private $albumsTable;
    private $audioTable;
    

    public function __construct(\Mannering\DatabaseTable $audioTable, \Mannering\DatabaseTable $albumsTable)
    {
        $this->albumsTable = $albumsTable;
        $this->audioTable = $audioTable;
    }

    public function getArtistId()
    {
                    
        return $this->id ;
    }

    public function getName()
    {                    
        return $this->$artist_name;
    }

    //audio class
    public function getAudioId()
    {
        return $this->audioTable->findById($this->id) ;
    }
    //album class
    public function getAlbumId()
    {
        return $this->albumsTable->findById($this->id);
    }

    //audio class
    public function getSongId()
    {
        return $this->audioTable->findById($this->id);
    }

    //audio class
    public function getNumOfSongs()
    {        
        return $this->audioTable->total('artistId', $this->id);
    }

    
}
