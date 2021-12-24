<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>

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
    updateVolumeProgressBar(audioElement.audio); //audio class func

		let prevHighlight = document.querySelector('div.audio_controls');
    let progressBar = document.querySelector('div.progress div.play_progress');
    let volumeControl = document.querySelector('div.audio_volume div.volume');

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

    volumeControl.addEventListener('mousemove', function() {
        if (mouseDown == true) {
					let percentage = e.offsetX / this.clientWidth; //this = div.audio_volume div.volume
            //limits volume range to bewteen 0 and 1
            if (percentage >= 0 && percentage <= 1) {
                audioElement.audio.volume = percentage;
            }
        }
    });

    volumeControl.addEventListener('mouseup', function(e) {



			let percentage = e.offsetX / this.clientWidth; //this = div.audio_volume div.volume

        if (percentage >= 0 && percentage <= 1) {
            audioElement.audio.volume = percentage;
        }
    });

    document.addEventListener('mouseup', function() {
        mouseDown = false;
    });

});



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
    document.querySelector("i.fa-repeat").style.color = imageName;
}

//set mute button
function setMute() {
    audioElement.audio.muted = !audioElement.audio.muted;
    var imageName = audioElement.audio.muted ? "green" : "red";
    document.querySelector("i.fa-volume-up").style.color = imageName;
}

//set shuffle
function setShuffle() {
    shuffle = !shuffle;
    var imageName = shuffle ? "green" : "red";
    document.querySelector("i.fa-random").style.color = imageName;

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
        // shufflePlaylist = currentPlaylist.slice();
        // shuffleArray(shufflePlaylist);
    }

    //create tracklist index
    currentIndex = currentPlaylist.indexOf(trackId);

    pauseSong();

    //get tracks from database
    let url = 'getSongJson.php';
    let formData = new FormData();
    formData.append("songId", trackId);

    fetch(url, {
        method: 'POST',
        body: formData

    }).then(function(response) {

        return response.text();

    }).then(function(body) {

        var track = JSON.parse(body);

        if (track[0] != null) {
            document.querySelector("div.audio_controls h1.trackName").textContent = track[0].songtitle;
            audioElement.setTrack(track);

        } else {
            document.querySelector("div.audio_controls h1.trackName").textContent = "No Tracks Available";
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
        let url = 'updatePlays.php';
        let formData = new FormData();
        formData.append("songId", audioElement.currentlyPlaying.id);

        fetch(url, {
            method: 'POST',
            body: formData

        }).then(function(response) {

					console.log(response);

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

<section id="main_text" class="group">

  <h1>Artist</h1>

  <div id="results">

    <div class="product-box-large">

          <h1><?= $singleartist->artist_name; ?></h1>
          <!-- <button id="artist_btn" onclick="firstSong()">Play</button> -->
          <!--Audio Controls-->
          <div class="audio_controls">

            <h1 class="trackName"></h1>

            <div class="audiocntrl_containers">

                <div id="shuffle-button" role="button" tabindex="0" class="player-button shuffle" onclick="setShuffle()">
                    <i class="fa fa-random" aria-hidden="true" title="shuffle"></i>
                </div>

                <div id="play-button" role="button" tabindex="0" class="player-button play" onclick="playSong()">
                    <i class="fa fa-play" aria-hidden="true" title="play"></i>
                </div>

                <div id="pause-button" role="button" tabindex="0" class="player-button pause" style="display: none;"
                    onclick="pauseSong()">
                    <i class="fa fa-pause" aria-hidden="true" title="pause"></i>
                </div>

                <div role="button" tabindex="0" class="player-button previous" onclick="prevSong()">
                    <i class="fa fa-step-backward" aria-hidden="true" title="previous"></i>
                </div>

                <div role="button" tabindex="0" class="player-button next" onclick="nextSong()">
                    <i class="fa fa-step-forward" aria-hidden="true" title="next"></i>
                </div>

                <div role="button" tabindex="0" class="player-button repeat" onclick="setRepeat()">
                    <i class="fa fa-repeat" aria-hidden="true" title="repeat"></i>
                </div>



                <!--add onclick="setMute() to change volume icon. need to add volume icon-->
                <div class="audio_volume">
                    <div class="VolumeBg">
                        <div class="volume"></div>
                        <!--<input type="range" class="volume" title="volume" min="0" max="1" step="0.1" value="1">-->
                    </div>
                    <div class="VolumeImg" onclick="setMute()" role="button" tabindex="0">
                        <i class="fa fa-volume-up" aria-hidden="true" title="mute"></i>
                    </div>
                </div>
            </div>
            <div class="audiocntrl_containers">
                <div class="current_time">00:00</div>
                <div class="progress">
                    <div class="play_progress"></div>
                </div>
                <div class="duration">00:00</div>
            </div>

          </div>
          <h2>Artist Tracks </h2>
          <br />
          <br />
          <!--Audio Playlist-->
          <ul class="audio-tracklist">
            <?php
              $i = 1;
              foreach ($singleaudio as $songId) :
                echo "<li>
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
            var tempSongIds = '<?= json_encode($songId[0]); ?>';
            tempPlaylist = JSON.parse(tempSongIds);
          </script>

    </div>

    <h2> Other Albums</h2>

    <?php foreach ($singlealbums as $value) : ?>
    <div class="product-box">
      <figure class="product-info">
        <a href="/singleresult?artistid=<?= $value->artistId ?>&albumid=<?= $value->id ?>">
          <img src="/assets/databasepics/WEBP/<?= $value->image ?>" alt="Album-Cover-Image" />
        </a>
        <figcaption>
          <ul class="product-box-info">
            <li><?= $value->album ?></li>
            <li><?= $value->genre ?></li>
          </ul>
        </figcaption>
      </figure>
    </div>
    <?php endforeach; ?>

  </div>
  <br />
</section>
