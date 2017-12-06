<?
	require('Headers.php');
	//require('Classes.php');
    require('Object.php');
    require('Pizza.php');
?>

<html>
	<head>
		<title> Tabtabus </title>
		<link rel="stylesheet" type="text/css" href="mysite.css">
	</head>
	<body>
		<?
        $obj = new Object();

        $oPizza = new Pizza(['name' => 'fgdfgdf', 'de']);
        $oPizza
            ->setName('sdsda')
            ->setDescription('asdasd');
        ?>
	</body>
</html>