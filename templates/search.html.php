<script>
	document.addEventListener("DOMContentLoaded", function(event) {

		let searchBTN = window.document.querySelector('#search-btn');

		searchBTN.addEventListener('click', function(e) {
			e.preventDefault();
			var artistname = document.querySelector("#artist").value;
			var albumname = document.querySelector("#album").value;
			var genre = document.querySelector("#genre").value;
			var searchErr = document.querySelector(".search-error");

			if (artistname == "" && albumname == "" && genre == "") {
				searchErr.classList.add('show-error');
				return false;
			} else {
				searchErr.classList.remove('show-error');
			}

			fetch(`./results.php?artist_name=${artistname}&album=${albumname}&genre=${genre}`, {
					method: 'get',
					headers: {
						"Content-type": "application/x-www-form-urlencoded;charset=UTF-8;"
					}
				})
				.then(function(response) {

					if (response.status !== 200) {
						alert('Looks like there was a problem. Status Code: ' +
							response.status);
					}

					return response.text()

					// Examine the text in the response

				})
				.then(function(data) {

					window.document.getElementById('results-container').innerHTML = data;
				})
				.catch(function(err) {

					console.error('Fetch Error :-S', err);

				});

			//end of fetch function
			return false;

		});
	});
</script>

<section id="main-section">

	<h2>Search Page</h2>

	<span class="search-error">Fields cannot be empty. Enter either artistname, album name or select genre</span>

	<!--Search Form-->
	<form id="mannering-search" action="">
		<fieldset>
			<legend>Album Search</legend>

			<label for="artist_name" aria-label="artist-name" class="search-label">Artist name</label>
			<input id="artist" name="artist_name" type="text" placeholder="Enter artist name.">

			<label for="album" aria-label="album" class="search-label"> Album name</label>
			<input id="album" name="album" type="text" placeholder="Enter album name.">

			<label for="genre" aria-label="genre" class="search-label">Genre</label>
			<select name="genre" id="genre">
				<option value="" disabled selected>Choose Genre</option>
				<option value="Hip Hop">Hip Hop</option>
				<option value="Jazz">Jazz</option>
				<option value="Country">Country</option>
			</select>

			<input id="search-btn" class="submit" name="submit" type="submit" value="FIND ALBUM">
		</fieldset>
	</form>

	<span class="refresh-page-link">
		<a href="<?php $_SERVER['PHP_SELF']; ?>">Refresh&nbsp;Search&nbsp;Page</a>
	</span>

	<div id="loadingIndicator" style="display: none;">Ajax Loading...</div>

	<div id="results-container"></div>

	<br />
	<br />
</section>
