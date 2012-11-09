<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Mendelevium - Web Interface</title>
    <link rel="stylesheet" href="static/css/reset.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="static/css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="static/css/main.css" type="text/css" media="screen" charset="utf-8">
</head>
<body>
    <header>
        <div class="container">
            <a href="/" alt="overview"><h1>Md - log php engine</h1></a>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="/" alt="overview">overview</a></li>
                        <li><a href="/" alt="about">about</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="body">
    	<?php
    		require '../core/Mendelevium.php';
    		$Mendelevium = new Mendelevium('lifeGood');
    		$Mendelevium->log("user deleted");
		?>
    	<br>
 		<table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th class="job-id-col">ID</th>
                    <th> Log Message </th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach($Mendelevium->getAll() as $a => $b){ ?>
                <tr>
                    <td><?php echo $a; ?></td>
                    <td><?php echo $b; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>


    </div>
<footer>
        <div class="cell">
            <a href="http://github.com/inazagi/mendelevium" alt="Mendelevium, a PHP Log Engine">powered by Mendelevium</a>
        </div>
</footer>

</body>
</html>