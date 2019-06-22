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

	
	//audio
	public function getSongTitle($value){

		return $this->audioTable->findSongTitle($value);
		
	}

	public function getArtist($value){

		return $this->artistsTable->findArtist($value);
		
	}
		
	public function getAudioId(){

		return $this->audioTable->findSongId($this->albumid);

		
	}

	public function getMp3($value){

		return $this->audioTable->findSongMp3($value);
		
		  
	}

	public function getOgg($value){

		return $this->audioTable->findSongOgg($value);
		
		  
	}

	public function getM4a($value){

		return $this->audioTable->findSongM4a($value);
		
		  
	}
  
	

	

	

	
	

	
}