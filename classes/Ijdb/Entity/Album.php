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
	private $audioTable;
	
	
	public function __construct(\Ninja\DatabaseTable $audioTable ) {
		
		$this->audioTable = $audioTable;
				
	}

	public function getSongId(){

		return $this->audioTable->findById($this->albumid);

		
	  }
	
	

	
}