<script src='assets/js/script.js'></script>

<?php
$array = array();
foreach ($singleaudio as $value) {
	array_push($array, $value[0]);
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

    let prevHighlight = document.querySelector('div.audio_controls');
    let progressBar = document.querySelector('div.progress div.play_progress');
    let volumeControl = document.querySelector('input#volume');

    let playControl = document.querySelector('#play-button');
    let pauseControl = document.querySelector('#pause-button');



    prevHighlight.addEventListener("mousedown touchstart mousemove touchmove", (e) => {
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

    // volumeControl.addEventListener('mousedown', function() {
    //     mouseDown = true;
    // });

    volumeControl.addEventListener('change', (e) => {
        //if (mouseDown == true) {
        console.log(e.target.value);
        let percentage = e.target.value / 100; //this = div.audio_volume input.volume
        console.log(percentage)
        //limits volume range to bewteen 0 and 1
        if (percentage >= e.target.min && percentage <= e.target.max) {
            audioElement.audio.volume = percentage;
        }
        //}
    });

    document.addEventListener('mouseup', function() {
        mouseDown = false;
    });

    //us mouse to drag progress bar and change audio position
    function timeFromOffset(mouse, progressBar) {
        let percentage = mouse.offsetX / progressBar.clientWidth * 100;
        let seconds = audioElement.audio.duration * (percentage / 100);
        audioElement.setTime(seconds); //audio class func
    }

});



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
    let trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
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
    let imageName = audioElement.audio.muted ? "green" : "red";
    document.querySelector("i.fa-volume-up").style.color = imageName;
}

//set shuffle
function setShuffle() {
    shuffle = !shuffle;
    let imageName = shuffle ? "green" : "red";
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
    let j, x, i;
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
        let track = JSON.parse(body);
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
            body: formData,
            //mode: 'cors', // no-cors, *cors, same-origin
            // headers: {

            //     'Content-Type': 'application/x-www-form-urlencoded',
            // },
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

<section id="main_text" class="group">

    <h1>Albums</h1>

    <div id="results">

        <div class="product-box-large">

            <figure class="product-info">

                <a href="/artist?albumid=<?= $singlealbums->id ?? '' ?>&artistid=<?= $singlealbums->artistId ?? '' ?>"
                    title="Go artist page">
                    <img src="assets/databasepics/WEBP/<?= $singlealbums->image; ?>" alt="Album-Cover-Image" />
                </a>

                <figcaption>

                    <ul class="product-box-info">
                        <li>
                            <span>Artist </span>
                            <span><?= $singleartist->artist_name; ?></span>
                        </li>
                        <li>
                            <span>Album</span>
                            <span><?= $singlealbums->album; ?></span>
                        </li>
                        <li>
                            <span>Genre</span>
                            <span><?= $singlealbums->genre; ?></span>
                        </li>
                        <li>
                            <span>Price</span>
                            <span><?= $singlealbums->price; ?></span>
                        </li>
                        <li>
                            <span></span>
                            <span><a href="/review/edit">Add Review</a></span>
                        </li>

                    </ul>

                </figcaption>

            </figure>

            <!--Audio Controls-->
            <div class="audio_controls">

                <h1 class="trackName"></h1>

                <div class="audiocntrl_containers">

                    <div role="button" tabindex="0" class="player-button shuffle" onclick="setShuffle()">
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
                            <!-- <div class="volume"></div> -->
                            <input type="range" min="0" max="100" value="100" class="volume" id="volume"
                                title="volume" />
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
            <h2><?= $singlealbums->getNumberOfSongs(); ?> Songs</span></h2>
            <br />

            <!--Audio Playlist-->
            <ul class="audio-tracklist">
                <?php

				$songIdArray = $singleaudio;

				$i = 1;

				foreach ($songIdArray as $songId) :
					//songId value from value of $singleaudio variable
					echo "<li>
                  <span class=\"tracknum\">Track " . $i . " : </span>
                  <span class=\"trackname\">" . $songId[1] . "</span>
                  <span class=\"trackbtn\" onclick='setTrack(\"" . $songId[0] . "\", tempPlaylist, true)'><i class=\"fa fa-play\" aria-hidden=\"true\"></i> </span>
                  <span class=\"trackplays\">$songId[7] plays </span>
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
        <div>
            <div>



























                <br />
</section>