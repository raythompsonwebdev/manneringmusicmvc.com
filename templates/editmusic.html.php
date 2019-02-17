<form action="" method="post">
	<input type="hidden" name="music[id]" value="<?=$music['id'] ?? ''?>">
    <label for="musictext">Type your joke here:</label>
    <textarea id="musictext" name="music[text]" rows="3" cols="40"><?=$music['text'] ?? ''?></textarea>
    <input type="submit" name="submit" value="Save">
</form>