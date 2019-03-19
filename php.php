<body>
	<?php
		$row = exec('dir',$output,$error);
		while(list(,$row) = each($output)){
			echo $row, "<BR>\n";
		}
		if($error){
			echo "Error : $error<BR>\n";
			exit;
			}
		echo getcwd();
		echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
	?>
</body>
