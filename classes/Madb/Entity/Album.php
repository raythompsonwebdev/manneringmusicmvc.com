<?php
namespace Madb\Entity;

use Mannering\DatabaseTable;

class Album
{
    public $id;
    public $album;
    public $image;
    public $price;
    public $text;
    public $artistId;
    public $genre;
    private $artistsTable;
    private $audioTable;

        
    
    public function __construct(DatabaseTable $artistsTable, DatabaseTable $audioTable)
    {
        
        $this->artistsTable = $artistsTable;
        $this->audioTable = $audioTable;
    }

    public function getAlbumId()
    {

        return $this->id;
    }

    public function getArtistId()
    {
        
        return $this->artistsTable->findById($this->artistId);
    }
      

    public function getSongId()
    {

        return $this->audioTable->findSongId($this->id);
    }
}
