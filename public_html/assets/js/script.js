var currentPlaylist = [];
var audioElement;


function Audio() {

	this.currentlyPlaying;
	
	this.audio = document.createElement('audio');
	
	
	this.setTrack = function(track) {

		this.currentlyPlaying = track[0].mp3_File;
		this.audio.src = track[0].mp3_File;

	}

	this.pause = function() {

		this.audio.pause();

	}


	this.play = function() {
		 
				
		this.audio.play();
								
				
	}

}


