<?php
namespace Madb\Entity;

class Audio
{
    public $id;
    public $songtitle;
    public $mp3_File;
    public $ogg_File;
    public $m4a_File;
    public $artistId;
    public $albumId;
    public $plays;
    private $albumsTable;
    private $artistsTable;

    public function __construct(\Mannering\DatabaseTable $albumsTable, \Mannering\DatabaseTable $artistsTable)
    {
        
        $this->albumsTable = $albumsTable;
        $this->artistsTable = $artistsTable;
    }

    public function getAudioId()
    {

        return $this->id;
    }
        
    public function getArtist()
    {

        return $this->artistsTable->findById($this->artistId);
    }

    public function getAlbum()
    {

        return $this->albumsTable->findById($this->albumId);
    }

    public function getSongTitle()
    {

        return $this->songtitle;
    }

    public function getPlays()
    {

        return $this->$plays;
    }
    
}
