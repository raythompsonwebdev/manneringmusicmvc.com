<?php
namespace Ijdb\Entity;

class Audio {
	public $audioid;
	public $songtitle;
	public $mp3_File;
  public $ogg_File;
  public $m4a_File;
  public $artistid;
  public $albumid;
  private $albumsTable;
  private $artistsTable;

	public function __construct(\Ninja\DatabaseTable $albumsTable, \Ninja\DatabaseTable $artistsTable ) {
        
        $this->albumsTable = $albumsTable;
        $this->artistsTable = $artistsTable;
                
  }

    public function getAudioId(){

      return $this->audioid;
		
    }
        
    public function getArtist() {

      return $this->artistsTable->findById($this->artistid);

    }

    public function getAlbum() {

	  	return $this->albumsTable->findById($this->albumid);
    }

    public function getSongTitle(){

      return $this->songtitle;
              
    }
            
   

   

        
    
    
}