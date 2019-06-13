<?php
namespace Ijdb\Entity;

class Artist {
	public $id;
	public $artist;
	private $albumsTable;
	private $audioTable;
	

	public function __construct(\Ninja\DatabaseTable $albumsTable, \Ninja\DatabaseTable $audioTable) {
		$this->albumsTable = $albumsTable;
		$this->audioTable = $audioTable;
		
	}

	public function getArtistId(){
					
		return $this->artistid ;
	  
	}
	  
	public function getArtist(){
					
		return $this->artist ;
	  
  	}

	public function getAudioId(){
					
		return $this->audioTable->findById($this->id) ;
	  
  	}

	public function getAlbumId() {
		return $this->albumsTable->findById($this->id);
	}

	
}