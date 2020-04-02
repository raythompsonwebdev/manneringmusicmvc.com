
<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>
<script>

    jQuery(document).ready(function() {

        $("#searchBtn ").on('click', function(){
       
            var artistname = $("#artist").val();
            var albumname = $("#album").val();
            var genre = $("#genre").val();
            
            var dataString = 'artist_name='+ artistname + '&album=' + albumname + '&genre=' + genre;

            $.ajax({
                url:  'results.php',
                method: "GET",
                data: dataString,
                dataType: 'html',
                success: function(data) {
                    
                        $("#results").html(data);
                        
                },
                
                error: function(jqxhr, textStatus, error){
                    alert('An error occurred! ' + ( error ? error : jqxhr.status ));
                }
            });
            //end of ajax function
            return false;
        });
        // search click end

    });//end of jquery

</script>

<section id="main_text">

    <h1 >Album Search Page</h1>

    <p>Find your favourite Jazz, Hip Hop and Country music albums from our wide selection using search form below.</p>

    <!--left bar-->
    <aside id="left_bar" role="complementary">

        <h1>Search Here</h1>

        <article id="search_form">

            <form id="searchForm">

                <label for="artist">Artist name</label>
                <input id="artist" name="artist_name" type="text" title="Artist Name"  autofocus placeholder="Artist Name">

                <label for="album">Album name</label>
                <input id="album" name="album" type="text" title="Album Name"  placeholder="Album Name" >


                <label for="genre">Genre</label>

                <select name="genre" id="genre" >
                    <option value=""></option>
                    <option value="Hip Hop">Hip Hop</option>
                    <option value="Jazz">Jazz</option>
                    <option value="Country">Country</option>
                </select>

                <input id="searchBtn" class="submit" name="submit" type="submit" value="FIND MUSIC" >
            </form>

        </article>

    </aside>

    <span class="count">
        <a href="<?php $_SERVER['PHP_SELF']; ?>">Refresh&nbsp;Search&nbsp;Page</a>
    </span>

    <div id="loadingIndicator" style="display: none;">Ajax Loading...</div>

    <div id="results">
 
    </div>
<br/>
<br/>
</section>