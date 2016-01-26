<!DOCTYPE html>
<html>
<body>
    <div class="container">
		<?php 
		for($i=0 ; $i<count($statuses) ; $i++) 
			echo "<p>".$statuses[$i]."\n</p>";
		?>
    </div>
</body>
</html>
