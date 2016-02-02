<!DOCTYPE html>
<html>
<body>
	
	<div class="container_add">
		<form action="/statuses" method="POST">
		<label for="username">Username:</label>
		<input type="text" name="username">

		<label for="message">Message:</label>
		<textarea name="message"></textarea>

		<input type="submit" value="Tweet!">
		</form>
	</div>
	
	
    <div class="container_list">
		<?php 
		for($i=0 ; $i<count($statuses) ; $i++) 
			echo "<p>".$statuses[$i]."\n</p>";
		?>
    </div>
    
    

</body>
</html>
