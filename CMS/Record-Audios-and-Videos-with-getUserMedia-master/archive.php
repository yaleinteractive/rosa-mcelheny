<html>
<body>
	<?php

    include "connect.php";

    $sql = "SELECT id FROM files ORDER BY id DESC";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		
	}

?>
</body>
</html>

