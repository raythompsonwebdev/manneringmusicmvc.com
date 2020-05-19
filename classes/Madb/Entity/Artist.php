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
      
    
    public function getAudioId()
    {
                    
        return $this->audioTable->findById($this->id) ;
    }

    public function getAlbumId()
    {
        return $this->albumsTable->findById($this->id);
    }
}
