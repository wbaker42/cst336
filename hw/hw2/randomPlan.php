<html>
    <head>
		<title>Random Plan</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
<body>
    
    <nav>
        <a href="index.php">Back</a>
    </nav>
    
    <h1>Random Plan</h1>
<?php
       generatePlan(inputToInteger($_POST["start"]), inputToInteger($_POST['max']));
       integerToStation(3500);
?>
    
</body>
</html>
