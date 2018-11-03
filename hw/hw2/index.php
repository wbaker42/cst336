<html>
    <head>
		<title>Home</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div>
            <img id = 'logo' src="img/cityLogo.png" alt='logo' title='logo'>
            <form action="randomPlan.php" method="post">
                <h2>Start Station:</h2>
                <input type="text" id="start" name="start" placeholder="Enter Start Station..."><br>
                <h2>Maximum Station: </h2>
                <input type="text" id="max" name="max" placeholder="Enter Maximum Station..."><br><br>
                <input type="submit" value="Generate Random Plan">
            </form>
        </div>
    </body>
</html>