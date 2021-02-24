
<script> 
    document.addEventListener("DOMContentLoaded", function(event) {

        let searchBTN = window.document.querySelector('#searchBtn');

        searchBTN.addEventListener('click', function (e){

            e.preventDefault();

            var artistname = document.querySelector("#artist").value;            
            var albumname = document.querySelector("#album").value;
            var genre = document.querySelector("#genre").value; 
            var searchErr = document.querySelector(".search_error");

            if ( artistname == "" && albumname == "" && genre == "")  {         

                searchErr.classList.add('show_error');
                return false;
                            
            }else{

                searchErr.classList.remove('show_error');

            }                             
        
            fetch(`./results.php?artist_name=${artistname}&album=${albumname}&genre=${genre}`, {
                method: 'get',
                headers: {
                "Content-type": "application/x-www-form-urlencoded;charset=UTF-8; charset=UTF-8"
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
            .then(function(data){
                
                window.document.getElementById('results').innerHTML = data;
            })        
            .catch(function(err) {

                console.error('Fetch Error :-S', err);

            });

            //end of fetch function
            return false;

        });  
    });
</script>

<section id="main_text">

    <h1 >Search Page</h1>

    <span class="search_error">Fields cannot be empty. Enter either artistname, album name or select genre</span>
    
    <!--Search Form--> 
    <form id="searchForm" action="">
        <fieldset>
            <legend>Search Here</legend>

            <label for="artist" aria-label="artist_name">Artist name</label>
            <input id="artist" name="artist_name" type="text" placeholder="Artist Name" >
            
            <label for="album" aria-label="album">Album name</label>
            <input id="album" name="album" type="text" title="Album Name"  placeholder="Album Name" >

            <label for="genre" aria-label="genre">Genre</label>
            <select name="genre" id="genre">
                <option value="" disabled selected>Choose Genre</option>
                <option value="Hip Hop">Hip Hop</option>
                <option value="Jazz">Jazz</option>
                <option value="Country">Country</option>
            </select>

            <input id="searchBtn" class="submit" name="submit" type="submit" value="FIND MUSIC" >
        </fieldset>
    </form>       

    <span class="refresh_link">
        <a href="<?php $_SERVER['PHP_SELF']; ?>">Refresh&nbsp;Search&nbsp;Page</a>
    </span>

    <div id="loadingIndicator" style="display: none;">Ajax Loading...</div>

    <div id="results"></div>
    
<br/>
<br/>
</section>



