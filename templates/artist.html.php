<script src='assets/js/script.js'></script>

<?php

$array = array();

foreach ($singleaudio as $value) {

	array_push($array, $value);
}
$jsonArray = json_encode($array, JSON_UNESCAPED_SLASHES);

?>

<script>
	document.addEventListener("DOMContentLoaded", () => {

		//create seprate playlists for shuffle
		let newPlaylist = <?php echo $jsonArray; ?>;
		audioElement = new Audio(); //instance of audio class
		setTrack(newPlaylist[0], newPlaylist, false); //audio class func
		//update volume add full width
		audioElement.updateVolumeProgressBar(audioElement.audio); //audio class func

		let prevHighlight = document.querySelector('.audio-controls');
		let progressBar = document.querySelector('.play-progress');
		let volumeControl = document.querySelector('#volume');
		let playControl = document.querySelector('#play-button');
		let pauseControl = document.querySelector('#pause-button');

		prevHighlight.addEventListener("mousedown touchstart mousemove touchmove", function(e) {
			e.preventDefault();
		});

		progressBar.addEventListener("mousedown", function(e) {
			mouseDown = true;
		});

		progressBar.addEventListener("mousemove", function(e) {
			if (mouseDown == true) {
				//Set time of song, depending on position of mouse using timeFromOffset function below
				timeFromOffset(e, this);
			}
		});

		progressBar.addEventListener("mouseup", function(e) {
			timeFromOffset(e, this);
		});


		volumeControl.addEventListener('mousedown', function() {
			mouseDown = true;
		});

		volumeControl.addEventListener('change', (e) => {
			//if (mouseDown == true) {

			let percentage = e.target.value / 100; //this = div.audio_volume input.volume

			//limits volume range to bewteen 0 and 1
			if (percentage >= e.target.min && percentage <= e.target.max) {
				audioElement.audio.volume = percentage;
			}
			//}
		});

		document.addEventListener('mouseup', function() {
			mouseDown = false;
		});

	});

	//access to player buttons using keyboard
	window.addEventListener("keydown", function(e) {

		console.log(`KeyboardEvent: key='${event.key}' | code='${event.code}'`);
		if (event.key === 'Enter') {
			playSong();
		}

		if (event.key === 'Shift') {
			pauseSong();
		}

		if (event.key === 'ArrowLeft') {
			prevSong();
		}

		if (event.key === 'ArrowRight') {
			nextSong();
		}

	}, true);

	//us mouse to drag progress bar and change audio position
	function timeFromOffset(mouse, progressBar) {
		let percentage = mouse.offsetX / $(progressBar).width() * 100;
		let seconds = audioElement.audio.duration * (percentage / 100);
		audioElement.setTime(seconds); //audio class func
	}

	//skip to previous song
	function prevSong() {
		if (audioElement.audio.currentTime >= 3 || currentIndex == 0) {
			audioElement.setTime(0);
		} else {
			currentIndex = currentIndex - 1;
			setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
		}
	}

	//skip to next song
	function nextSong() {
		//shuffle
		if (repeat == true) {
			audioElement.setTime(0);
			playSong();
			return;
		}

		if (currentIndex == currentPlaylist.length - 1) {
			currentIndex = 0;
		} else {
			currentIndex++;
		}
		//shuffle
		var trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
		setTrack(trackToPlay, currentPlaylist, true);
	}

	//repeat button need repeat button added
	function setRepeat() {
		repeat = !repeat;
		//using font awesome instead of image
		imageName = repeat ? "green" : "red";
		document.querySelector(".fa-repeat").style.color = imageName;
	}

	//set mute button
	function setMute() {
		audioElement.audio.muted = !audioElement.audio.muted;
		var imageName = audioElement.audio.muted ? "green" : "red";
		document.querySelector(".fa-volume-up").style.color = imageName;
	}

	//set shuffle
	function setShuffle() {
		shuffle = !shuffle;
		var imageName = shuffle ? "green" : "red";
		document.querySelector(".fa-random").style.color = imageName;

		if (shuffle == true) {
			//Randomize playlist
			shuffleArray(shufflePlaylist);
			currentIndex = shufflePlaylist.indexOf(audioElement.currentlyPlaying.id);
		} else {
			//shuffle has been deactivated
			//go back to regular playlist
			currentIndex = currentPlaylist.indexOf(audioElement.currentlyPlaying.id);
		}
	}

	//shuffle array function from stackoverflow
	function shuffleArray(a) {
		var j, x, i;
		for (i = a.length; i; i--) {
			j = Math.floor(Math.random() * i);
			x = a[i - 1];
			a[i - 1] = a[j];
			a[j] = x;
		}
	}

	//Set Audio tracks to to be played in tracklist
	function setTrack(trackId, newPlaylist, play) {

		if (newPlaylist != currentPlaylist) {
			currentPlaylist = newPlaylist;
			//add shuffle
			shufflePlaylist = currentPlaylist.slice();
			shuffleArray(shufflePlaylist);
		}

		//create tracklist index
		currentIndex = currentPlaylist.indexOf(trackId);

		pauseSong();

		//get tracks from database
		let url = 'helpers/getSongJson.php';
		let formData = new FormData();
		formData.append("songId", trackId);

		fetch(url, {
			method: 'POST',
			body: formData

		}).then(function(response) {

			return response.text();

		}).then(function(body) {

			let track = JSON.parse(body);

			if (track[0] != null) {

				// console.log(track[0].songtitle);

				document.querySelector(".artist-track-name").textContent = `Track Name : ${track[0].songtitle}`;
				audioElement.setTrack(track);

			} else {
				document.querySelector(".artist-track-name").textContent = "No Tracks Available";
			}

			if (play == true) {
				playSong();
			}

		}).catch(function(err) {
			console.error('Fetch Error :-S', err);
		});

	}


	//Play song
	function playSong() {

		//track plays function needs ajax file updatePlays.php
		if (audioElement.audio.currentTime == 0) {
			//get tracks from database
			let url = 'helpers/updatePlays.php';
			let formData = new FormData();
			// console.log(audioElement.currentlyPlaying);
			formData.append("songId", audioElement.currentlyPlaying[0].id);
			fetch(url, {
				method: 'POST',
				body: formData


			}).then(function(response) {

				return response.text();


			}).catch(function(err) {
				console.error('Fetch Error :-S', err);
			});

		}

		document.querySelector('#play-button').style.display = "none";;
		document.querySelector('#pause-button').style.display = "block";
		audioElement.play();
	}

	//Pause Song
	function pauseSong() {

		document.querySelector('#play-button').style.display = "block";
		document.querySelector('#pause-button').style.display = "none";
		audioElement.pause();
	}
</script>

<section id="main-section" class="group">

	<h2>Artist</h2>

	<div id="results-container">

		<div class="results-large">
			<!-- <button id="artist_btn" onclick="firstSong()">Play</button> -->


			<figure class="artist-bio">
				<img src="/assets/databasepics/jpg/<?= $singleartist->artist_image ?>" class="artist-bio-image" width="150" height="150" alt="artist-bio-image">
				<figcaption class="artist-bio-caption">
					<h3 class="artist-bio-name"><?= $singleartist->artist_name; ?></h3>
					<p class="artist-bio-text"><?= $singleartist->artist_text; ?></p>
				</figcaption>
			</figure>

			<!--Audio Controls-->
			<div class="audio-controls">
				<div class="audiocntrl-container">

					<button class="audio-player-btn shuffle" onclick="setShuffle()" aria-label="shuffle track button">
						<i class="fa fa-random" aria-hidden="true" title="shuffle"></i>
					</button>

					<button id="play-button" class="audio-player-btn play" onclick="playSong()" aria-label="play button">
						<i class="fa fa-play" aria-hidden="true" title="play"></i>
					</button>

					<button id="pause-button" class="audio-player-btn pause" style="display: none;" onclick="pauseSong()" aria-label="pause button">
						<i class="fa fa-pause" aria-hidden="true" title="pause"></i>
					</button>

					<button class="audio-player-btn previous" onclick="prevSong()" aria-label="previous track button">
						<i class="fa fa-step-backward" aria-hidden="true" title="previous"></i>
					</button>

					<button class="audio-player-btn next" onclick="nextSong()" aria-label="next track button">
						<i class="fa fa-step-forward" aria-hidden="true" title="next"></i>
					</button>

					<button class="audio-player-btn repeat" onclick="setRepeat()" aria-label="repeat track button">
						<i class="fa fa-repeat" aria-hidden="true" title="repeat"></i>
					</button>

					<!--add onclick="setMute() to change volume icon. need to add volume icon-->
					<div class="audio-volume">
						<div class="volume-bg">
							<input type="range" min="0" max="100" value="100" class="volume" id="volume" title="volume" aria-label="volume" />
						</div>
						<button id="volume-mute" onclick="setMute()" aria-label="mute button">
							<i class="fa fa-volume-up" aria-hidden="true" title="mute"></i>
						</button>
					</div>
				</div>
				<div class="audiocntrl-container">
					<div class="current-time" aria-label="current length of track in minutes and seconds">00:00</div>
					<div class="audio-progress">
						<div class="play-progress"></div>
					</div>
					<div class="duration" aria-label="current length of track in minutes and seconds left to play">00:00
					</div>
				</div>
				<h4 class="artist-track-name"></h4>
			</div>


			<h4>Artist Tracks </h4>
			<!--Audio Playlist-->
			<ul class="audio-tracklist">
				<?php
				$i = 1;
				foreach ($singleaudio as $songId) :
					echo "<li class=\"audio-tracklist-item\">
                        <span class=\"tracknum\">Track " . $i . " : </span>
                        <span class=\"trackname\">" . $songId[1] . "</span>
                        <span class=\"trackbtn\" onclick='setTrack(\"" . $songId[0] . "\", tempPlaylist, true)'><i class=\"fa fa-play\" aria-hidden=\"true\"></i> </span>
                        <span class=\"trackplays\">plays</span>
                      </li>";
					$i = $i + 1;
				endforeach;
				?>
			</ul>
			<!--Temporary Play List-->
			<script>
				//songId value from value of $singleaudio variable
				let tempSongIds = '<?= json_encode($songId[0]); ?>';
				tempPlaylist = JSON.parse(tempSongIds);
			</script>

		</div>

		<h2 id="other-header"> Other Albums</h2>

		<?php foreach ($singlealbums as $value) : ?>
			<div class="other-results">
				<figure class="other-results-info">
					<a href="/singleresult?artistid=<?= $value->artistId ?>&albumid=<?= $value->id ?>" class="other-result-link">
						<img src="/assets/databasepics/WEBP/<?= $value->image ?>" width="150" height="150" class="other-result-img" alt="<?= $value->album ?>" />
					</a>
					<figcaption class="other-results-text">

						<h3 class="other-results-name"><?= $value->album ?></h5>
							<h4 class="other-results-genre"><?= $value->genre ?></h6>

					</figcaption>
				</figure>
			</div>
		<?php endforeach; ?>

	</div>








	<br />

</section>