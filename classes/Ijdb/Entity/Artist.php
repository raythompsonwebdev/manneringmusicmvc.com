<?php
namespace Ijdb\Entity;

class Artist {
	public $artistid;
	public $artist;
	public $genreid;
	private $albumsTable;

	public function __construct(\Ninja\DatabaseTable $albumsTable) {
		$this->albumsTable = $albumsTable;
	}

	
    public function getArtist() {
		return $this->albumsTable->findById($this->artistid);
	}
}