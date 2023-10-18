<?php
require_once "bdd.php";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM plats";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $plats = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $err) {
    die("Erreur de connexion : " . $err->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu du Restaurant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        nav {
            background-color: #333;
            color: white;
            padding: 10px 0;
            width: 100%;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .container {
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        body {
            background-image: url('https://img.freepik.com/vecteurs-libre/fond-monochrome-blanc-style-papier_52683-66443.jpg?w=996&t=st=1697590126~exp=1697590726~hmac=516fc3dc341bcf53d66c479e01a8d081f29207f9ee64bbb90c2ae5955246cf1b');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <h1>BIENVENUE DANS MON RESTAURANT</h1>
    <nav>
        <a href="/tutu">Accueil</a>
        <a href="/contacte">Contact</a>
        <a href="/reservation">Réservation</a>
    </nav>
    <div class="container">
        <?php
            echo "<h2>Menu de restaurant</h2>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Nom</th><th>Description</th><th>Prix</th></tr>";
            foreach ($plats as $plat) {
                echo "<tr>";
                echo "<td>" . $plat['id'] . "</td>";
                echo "<td>" . $plat['nom'] . "</td>";
                echo "<td>" . $plat['description'] . "</td>";
                echo "<td>" . $plat['prix'] . "</td>";
                echo "<td><img src='" . $plat['colomn'] . "' alt='Image plat' style='max-width: 200px; max-height: 200px;'></td>";
                echo "</tr>";
            }
            echo "</table>";    
        ?>
    </div>
    <footer>
        <p>Merci pour votre visite!</p>
    </footer>
</body>

</html>
