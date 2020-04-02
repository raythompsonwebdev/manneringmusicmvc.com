<?php
namespace Madb\Entity;

class Audio
{
    public $audioid;
    public $songtitle;
    public $mp3_File;
    public $ogg_File;
    public $m4a_File;
    public $artistId;
    public $albumId;
    private $albumsTable;
    private $artistsTable;

    public function __construct(\Ninja\DatabaseTable $albumsTable, \Ninja\DatabaseTable $artistsTable)
    {
        
        $this->albumsTable = $albumsTable;
        $this->artistsTable = $artistsTable;
    }

    public function getAudioId()
    {

        return $this->audioid;
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
}
