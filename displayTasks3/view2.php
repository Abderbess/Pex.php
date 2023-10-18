<?php
require_once "bdd.php";

$delete_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_POST['delete'];

        $query = "DELETE FROM reservations WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $delete_message = "Réservation supprimée avec succès.";

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['heure'])) {
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $heure = $_POST['heure'];

        $query = "INSERT INTO reservations (prenom, age, heure) VALUES (:prenom, :age, :heure)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':heure', $heure, PDO::PARAM_STR);
        $stmt->execute();

        echo "Nouvelle réservation insérée avec succès.";

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
echo'
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter/Supprimer une Réservation</title>
</head>

<body style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f5f5f5;">

    <nav style="background-color: #333; padding: 10px; text-align: center;">
        <h1 style="color: white;">BIENVENUE DANS MON RESTAURANT</h1>
        <a href="/tutu" style="color: white; text-decoration: none; margin: 0 10px;">Accueil</a>
        <a href="/contacte" style="color: white; text-decoration: none; margin: 0 10px;">Contact</a>
        <a href="/reservation" style="color: white; text-decoration: none; margin: 0 10px;">Réservation</a>
    </nav>

    <h1 style="text-align: center; color: #333;">Ajouter une Réservation</h1>

    <form action="" method="post" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <label for="prenom" style="display: block; margin-bottom: 8px; color: #555;">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required style="width: calc(100% - 16px); padding: 8px; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">

        <label for="age" style="display: block; margin-bottom: 8px; color: #555;">Âge :</label>
        <input type="number" id="age" name="age" required style="width: calc(100% - 16px); padding: 8px; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">

        <label for="heure" style="display: block; margin-bottom: 8px; color: #555;">Heure :</label>
        <input type="time" id="heure" name="heure" required style="width: calc(100% - 16px); padding: 8px; margin-bottom: 16px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">

        <input type="submit" value="Ajouter la Réservation" style="background-color: #4CAF50; color: white; border: none; cursor: pointer; font-size: 16px;">
    </form>

    <h1 style="text-align: center; color: #333;">Supprimer une Réservation</h1>';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM reservations";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($reservations as $reservation) {
            echo '<div style="background-color: #fff; padding: 10px; border: 1px solid #ccc; border-radius: 8px; margin-bottom: 10px;">';
            echo '<p style="font-size: 16px; margin: 0;">' . $reservation['prenom'] . ' - ' . $reservation['age'] . ' ans - ' . $reservation['heure'] . '</p>';
            echo '<form action="" method="post">';
            echo '<input type="hidden" name="delete" value="' . $reservation['id'] . '">';
            echo '<input type="submit" class="delete-button" value="Supprimer" style="background-color: #ff0000; color: white; border: none; cursor: pointer;">';
            echo '</form>';
            echo '</div>';
        }

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>

    <div class="delete-message" style="font-weight: bold; color: #ff0000; text-align: center; margin-top: 16px;">
        <?php echo $delete_message; ?>
    </div>

    
</body>
<style>
   body {
        background-image: url('https://img.freepik.com/vecteurs-libre/fond-monochrome-blanc-style-papier_52683-66443.jpg?w=996&t=st=1697590126~exp=1697590726~hmac=516fc3dc341bcf53d66c479e01a8d081f29207f9ee64bbb90c2ae5955246cf1b');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    } 
</style>
</html>
