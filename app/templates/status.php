<!DOCTYPE html>
<html>
<body>
    <div class="container">
        <p><?php echo $status ?></p>
    </div>

    <form action="/statuses/<?= $id ?>" method="POST">
		<input type="hidden" name="_method" value="DELETE">
		<input type="submit" value="Delete">
	</form>
    
</body>
</html>
