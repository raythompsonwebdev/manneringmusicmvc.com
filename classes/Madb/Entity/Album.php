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
    
    //artist class
    public function getArtistId()
    {
        
        return $this->artistsTable->findById($this->artistId);
    }

    //audio class
    public function getSongId()
    {
        return $this->audioTable->findById($this->id);
    }

    //audio class
    public function getNumberOfSongs()
    {        
        return $this->audioTable->total('albumId', $this->id);
    }
    
}
