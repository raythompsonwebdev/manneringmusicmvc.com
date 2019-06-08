<?php
namespace Ijdb\Entity;

class Audio {
	public $audioid;
	public $songtitle;
	public $mp3File;
  public $oggFile;
  public $mp4File;
  public $artistid;
  public $albumid;
  private $albumsTable;
  private $artistsTable;

	public function __construct(\Ninja\DatabaseTable $albumsTable, \Ninja\DatabaseTable $artistsTable ) {
        
        $this->albumsTable = $albumsTable;
        $this->artistsTable = $artistsTable;
        
        
  }

  public function getSongId(){
		
		return $this->albumsTable->findById($this->albumid);
		
	  }

    
    
	  public function getAlbum() {
		return $this->albumsTable->findById($this->albumid);
    }

    public function getArtist() {
		return $this->artistsTable->findById($this->artistid);
    }
    
    
}