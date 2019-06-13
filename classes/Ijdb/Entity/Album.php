<?php
namespace Ijdb\Entity;

class Album {
	public $albumid;
	public $album;
	public $image;
    public $price;
    public $text;
    public $artistid;
    public $genre;
	private $artistsTable;
	private $audioTable;
		
	
	public function __construct(\Ninja\DatabaseTable $artistsTable, \Ninja\DatabaseTable $audioTable) {
		
		$this->artistsTable = $artistsTable;
		$this->audioTable = $audioTable;
						
	}


	public function getAlbumId(){

		return $this->albumid;

		
	}

	public function getArtistId(){

		return $this->artistsTable->findById($this->artistid);
	
	}

	public function getSongTitle($value){

		return $this->audioTable->findSongTitle($value);
		
	}

	public function getAlbum(){

		return $this->album;
	
	}
		
	
	public function getAudioId(){

		return $this->audioTable->findSongId($this->artistid);

		
	}

	

	
	

	
}