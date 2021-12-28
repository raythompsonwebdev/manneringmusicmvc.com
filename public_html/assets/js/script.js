// eslint-disable-next-line no-unused-vars
// eslint-disable-next-line prefer-const
let currentPlaylist = [];
// eslint-disable-next-line no-unused-vars
// eslint-disable-next-line prefer-const
let shufflePlaylist = [];
// eslint-disable-next-line prefer-const
let tempPlaylist = [];
// eslint-disable-next-line no-unused-vars
// eslint-disable-next-line prefer-const
let audioElement;
// eslint-disable-next-line no-unused-vars
// eslint-disable-next-line prefer-const
let mouseDown = false;
// eslint-disable-next-line no-unused-vars
// eslint-disable-next-line prefer-const
let currentIndex = 0;
// eslint-disable-next-line no-unused-vars
// eslint-disable-next-line prefer-const
let repeat = false;
// eslint-disable-next-line no-unused-vars
// eslint-disable-next-line prefer-const
let shuffle = false;

// hook up to play button on artist page
// eslint-disable-next-line no-unused-vars
const firstSong = () => {
  // eslint-disable-next-line no-undef
  setTrack(tempPlaylist[0], tempPlaylist, true);
};

// Audio Class
// eslint-disable-next-line no-unused-vars
class Audio {
  constructor() {
    // eslint-disable-next-line no-unused-expressions
    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    // Format current time and duration
    this.formatTime = (seconds) => {
      let secondsRound = Math.round(seconds);
      let minutes = Math.floor(seconds / 60);
      // Remaining seconds

      secondsRound = Math.floor(seconds % 60);
      // Add leading Zeros
      minutes = minutes >= 10 ? minutes : `0${minutes}`;

      const secondsFinal =
        secondsRound >= 10 ? secondsRound : `0${secondsRound}`;
      return `${minutes}:${secondsFinal}`;
    };

    // goes to next song when current song finished
    this.audio.addEventListener('ended', () => {
      // eslint-disable-next-line no-undef
      nextSong();
    });

    // Can Play //
    this.audio.addEventListener('canplay', (e) => {
      const durations = this.formatTime(e.target.duration);
      document.querySelector('div.current_time').textContent = durations;
    });

    // Updates Progress of song playing
    this.updateTimeProgressBar = (audio) => {
      document.querySelector('div.current_time').textContent = this.formatTime(
        audio.currentTime
      );
      document.querySelector('div.duration').textContent = this.formatTime(
        audio.duration - audio.currentTime
      );
      const progress = (audio.currentTime / audio.duration) * 100;
      document.querySelector(
        '.progress .play_progress'
      ).style.width = `${progress}%`;
    };

    // Display bar to display volume level //
    this.updateVolumeProgressBar = (audio) => {
      const volume = audio.volume * 100;
      document.querySelector(
        'div.audio_volume div.volume'
      ).style.width = `${volume}%`;
    };

    // Time Display Update //
    this.audio.addEventListener('timeupdate', (e) => {
      if (e.target.duration) {
        this.updateTimeProgressBar(e.target);
      }
    });
    // Volume Change //
    this.audio.addEventListener('volumechange', (e) => {
      this.updateVolumeProgressBar(e.target);
    });
  }

  // Set Track //
  setTrack(track) {
    this.currentlyPlaying = track;
    this.audio.src = track[0].mp3_File;
  }

  // Pause //
  pause() {
    this.audio.pause();
  }

  // Play//
  play() {
    this.audio.play();
  }

  // Progress Bar and Volume Bar Drag
  setTime(seconds) {
    this.audio.currentTime = seconds;
  }
}
