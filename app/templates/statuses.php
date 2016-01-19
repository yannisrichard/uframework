<?php
    $statuses = $parameters['status'];
?>
<!DOCTYPE html>
<html>
<body>
    <div class="container">
		<?php 
		for($i=0 ; $i<$statuses.count() ; $i++) 
			echo "<p>".$statuses[i]."</p>";
		?>
    </div>
</body>
</html>
