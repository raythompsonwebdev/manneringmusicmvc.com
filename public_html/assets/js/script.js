var currentPlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;

//Format current time and duration
function formatTime(seconds) {
	var seconds = Math.round(seconds);
	var minutes = Math.floor(seconds / 60);
	// Remaining seconds
	seconds = Math.floor(seconds % 60);
	// Add leading Zeros
	minutes = (minutes >= 10) ? minutes : "0" + minutes;
	seconds = (seconds >= 10) ? seconds : "0" + seconds;
	return minutes + ":" + seconds;
}

// Display current time and duration =============================//
function updateTimeProgressBar(audio) {

	$('div.current_time').text(formatTime(audio.currentTime));

	$("div.duration").text(formatTime(audio.duration - audio.currentTime));

	var progress = audio.currentTime / audio.duration * 100;

	$(".progress .play_progress").css("width", progress + "%");
}

// Volume ============================//
function updateVolumeProgressBar(audio) {
	var volume = audio.volume * 100;
	$("div.audio_volume div.volume").css("width", volume + "%");
}


// Audio Class
function Audio() {

	this.currentlyPlaying;
	
	this.audio = document.createElement('audio');


	this.audio.addEventListener("ended", function() {
		nextSong();
	});
	
	// Time Duration =============================//
	this.audio.addEventListener("canplay", function(){

		var duration = formatTime(this.duration);

		$('div.current_time').text(duration);

		
		
	});
	
	// Time Display =============================//
	this.audio.addEventListener("timeupdate", function () {
		if(this.duration) {
			updateTimeProgressBar(this);
		}
	});

	// Volume ============================//
	this.audio.addEventListener("volumechange", function() {
		updateVolumeProgressBar(this);
	});
					
	// Set Track ============================//
	this.setTrack = function(track) {

		this.currentlyPlaying = track[0].mp3_File;

		this.audio.src = track[0].mp3_File;

	}

	// Pause ============================//
	this.pause = function() {

		this.audio.pause();

	}

	// Play ============================//
	this.play = function() {

		 		
		this.audio.play();
								
				
	}

	// Progress Bar and Volume Bar Drag ============================//
	this.setTime = function(seconds) {
		this.audio.currentTime = seconds;
	}

}


