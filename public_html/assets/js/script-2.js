let currentPlaylist = [];
let shufflePlaylist = [];
let tempPlaylist = [];
let audioElement;
let mouseDown = false;
let currentIndex = 0;
let repeat = false;
let shuffle = false;

//Format current time and duration
function formatTime(seconds) {
  seconds = Math.round(seconds);
  var minutes = Math.floor(seconds / 60);
  // Remaining seconds
  seconds = Math.floor(seconds % 60);
  // Add leading Zeros
  minutes = minutes >= 10 ? minutes : '0' + minutes;
  seconds = seconds >= 10 ? seconds : '0' + seconds;
  return minutes + ':' + seconds;
}

// Updates Progress of song playing
function updateTimeProgressBar(audio) {
  document.querySelector('div.current_time').textContent = formatTime(
    audio.currentTime
  );
  document.querySelector('div.duration').textContent = formatTime(
    audio.duration - audio.currentTime
  );
  var progress = (audio.currentTime / audio.duration) * 100;
  document.querySelector('.progress .play_progress').style.width =
    progress + '%';
}

// Display bar to display volume level //
function updateVolumeProgressBar(audio) {
  var volume = audio.volume * 100;
  document.querySelector('div.audio_volume div.volume').style.width =
    volume + '%';
}

//hook up to play button on artist page
// function firstSong() {
// 	setTrack(tempPlaylist[0], tempPlaylist, true);

// }

// Audio Class
class Audio {
  constructor(currentlyPlaying, audio) {
    this.currentlyPlaying;
    this.audio = document.createElement('audio');
  }



  //audio = document.createElement('audio');
  // //goes to next song when current song finished
  // this.audio.addEventListener('ended', () => {
  //   nextSong();
  // });

  // // Can Play //
  // this.audio.addEventListener('canplay', function () {
  //   var duration = formatTime(this.duration);
  //   document.querySelector('div.current_time').textContent = duration;
  // });
  // // Time Display Update //
  // this.audio.addEventListener('timeupdate', function () {
  //   if (this.duration) {
  //     updateTimeProgressBar(this);
  //   }
  // });

  // // Volume Change //
  // this.audio.addEventListener('volumechange', function () {
  //   updateVolumeProgressBar(this);
  // });

  // Set Track //
  setTrack(track) {
    this.currentlyPlaying = track;
    return (this.audio.src = track[0].mp3_File);
  }

  // Pause //
  pause() {
    return this.audio.pause();
  }

  // Play//
  play() {
    return this.audio.play();
  }

  // Progress Bar and Volume Bar Drag
  setTime(seconds) {
    return (this.audio.currentTime = seconds);
  }
}
