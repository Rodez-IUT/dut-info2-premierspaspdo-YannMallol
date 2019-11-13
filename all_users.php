<!DOCTYPE html>
<html lang="fr">
  <head>
		<meta charset="utf-8">
		<title>Activité 2</title>
		<!-- Lien vers mon CSS -->
		<!--<link href="css/monStyle.css" rel="stylesheet"> -->
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		
		<!-- Police Font Awesome pour les icônes -->
		<link href="fontawesome-free-5.10.2-web/css/all.css" rel="stylesheet">
		
   </head>

    <body>
		<table>
			<tr> 
				<th> ID </th>
				<th> Username </th>
				<th> Email </th>
				<th> Status </th>
			</tr>
			<?php 
				$host = 'localhost';
				$port = "3306";
				$db   = 'my_activities';
				$user = 'root';
				$pass = 'root';
				$charset = 'utf8mb4';
				$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
				$options = [
					PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES   => false,
					];
				
				try {
					$pdo = new PDO($dsn, $user, $pass, $options);
				} catch (PDOException $e) {
					throw new PDOException($e->getMessage(), (int)$e->getCode());
				} 
				
				$stmt = $pdo->query('SELECT * FROM users JOIN status ON status_id = status.id ORDER BY username'); 
				
				while ($row = $stmt->fetch())
				{
					echo "<tr>"."<td>".$row['id'] ."</td><td>".$row['username']."</td><td>".$row['email']."</td>";
					echo "<td>".$row['name']."</td>"."</tr>";
				}
				
				   
			?>
		</table>
	  
	</body>
</html>