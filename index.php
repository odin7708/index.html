<?php
require 'db.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>CV / Portfolio de Odin</title>
</head>
<body>
<header>
    <h1>CV / Portfolio de Odin</h1>
</header>
<div class="container">
    <section id="presentation" class="presentation">
        <h2>Présentation</h2>
        <p>Je m'appelle Odin Colodro, j'ai 18 ans et je suis actuellement étudiant en BTS CIEL. Passionné par les technologies, je m'efforce de combiner créativité et compétences techniques pour apporter des solutions innovantes. Mon parcours m’a permis d'acquérir des connaissances solides en gestion de projets, en communication digitale et en développement web. Je suis enthousiaste à l'idée de relever de nouveaux défis et d'apprendre continuellement dans un environnement dynamique.</p>
    </section>
    <section id="cv">
        <h2>CV</h2>
        <ul>
            <?php
            $cv = $pdo->query("SELECT * FROM cv ORDER BY id ASC");
            while ($item = $cv->fetch()) {
                echo "<li><strong>" . htmlspecialchars($item['titre']) . ":</strong> " . htmlspecialchars($item['valeur']) . "
                <form action='ajout.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='type' value='update'>
                    <input type='hidden' name='table' value='cv'>
                    <input type='hidden' name='id' value='" . $item['id'] . "'>
                    <input type='text' name='titre' placeholder='Modifier titre' required>
                    <input type='text' name='valeur' placeholder='Modifier valeur' required>
                    <button type='submit'>Modifier</button>
                </form>
                <form action='ajout.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='type' value='delete'>
                    <input type='hidden' name='table' value='cv'>
                    <input type='hidden' name='id' value='" . $item['id'] . "'>
                    <button type='submit'>Supprimer</button>
                </form>
                </li>";
            }
            ?>
        </ul>
        <form action="ajout.php" method="POST">
            <input type="hidden" name="type" value="cv">
            <input type="text" name="titre" placeholder="Ex: Classe" required>
            <input type="text" name="valeur" placeholder="Ex: BTS CIEL 1" required>
            <button type="submit">Ajouter</button>
        </form>
    </section>
    <section id="passions">
        <h2>Passions</h2>
        <ul>
            <?php
            $passions = $pdo->query("SELECT * FROM passions ORDER BY id DESC");
            while ($p = $passions->fetch()) {
                echo "<li>" . htmlspecialchars($p['nom']) . "
                <form action='ajout.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='type' value='update'>
                    <input type='hidden' name='table' value='passions'>
                    <input type='hidden' name='id' value='" . $p['id'] . "'>
                    <input type='text' name='nom' placeholder='Modifier' required>
                    <button type='submit'>Modifier</button>
                </form>
                <form action='ajout.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='type' value='delete'>
                    <input type='hidden' name='table' value='passions'>
                    <input type='hidden' name='id' value='" . $p['id'] . "'>
                    <button type='submit'>Supprimer</button>
                </form>
                </li>";
            }
            ?>
        </ul>
        <form action="ajout.php" method="POST">
            <input type="hidden" name="type" value="passion">
            <input type="text" name="nom" placeholder="Ajouter une passion" required>
            <button type="submit">Ajouter</button>
        </form>
    </section>
    <section id="experience">
        <h2>Expérience</h2>
        <ul>
            <?php
            $exps = $pdo->query("SELECT * FROM experiences ORDER BY id DESC");
            while ($e = $exps->fetch()) {
                echo "<li>" . htmlspecialchars($e['description']) . "
                <form action='ajout.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='type' value='update'>
                    <input type='hidden' name='table' value='experiences'>
                    <input type='hidden' name='id' value='" . $e['id'] . "'>
                    <input type='text' name='description' placeholder='Modifier' required>
                    <button type='submit'>Modifier</button>
                </form>
                <form action='ajout.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='type' value='delete'>
                    <input type='hidden' name='table' value='experiences'>
                    <input type='hidden' name='id' value='" . $e['id'] . "'>
                    <button type='submit'>Supprimer</button>
                </form>
                </li>";
            }
            ?>
        </ul>
        <form action="ajout.php" method="POST">
            <input type="hidden" name="type" value="experience">
            <input type="text" name="description" placeholder="Ajouter une expérience" required>
            <button type="submit">Ajouter</button>
        </form>
    </section>
    <section id="competences">
    <h2>Compétences</h2>
    <ul>
    <?php
    $res = $pdo->query("SELECT * FROM competence ORDER BY id DESC");
    while ($row = $res->fetch()) {
        echo "<li>" . htmlspecialchars($row['nom']) . "
        <form action='ajout.php' method='POST' style='display:inline;'>
            <input type='hidden' name='type' value='update'>
            <input type='hidden' name='table' value='competence'>
            <input type='hidden' name='id' value='" . $row['id'] . "'>
            <input type='text' name='nom' placeholder='Modifier' required>
            <button type='submit'>Modifier</button>
        </form>
        <form action='ajout.php' method='POST' style='display:inline;'>
            <input type='hidden' name='type' value='delete'>
            <input type='hidden' name='table' value='competence'>
            <input type='hidden' name='id' value='" . $row['id'] . "'>
            <button type='submit'>Supprimer</button>
        </form>
        </li>";
    }
    ?>
    </ul>
    <form action="ajout.php" method="POST">
        <input type="hidden" name="type" value="competence">
        <input type="text" name="competence" placeholder="Ajouter une compétence" required>
        <button type="submit">Ajouter</button>
    </form>
</section>
<section id="galerie">
    <h2>Galerie d'Images</h2>
    <div class="gallery">
        <img src="https://picsum.photos/200/200?random=1" alt="Image aléatoire">
        <img src="https://picsum.photos/200/200?random=2" alt="Image aléatoire">
        <img src="https://picsum.photos/200/200?random=3" alt="Image aléatoire">
        <img src="https://picsum.photos/200/200?random=4" alt="Image aléatoire">
    </div>
</section>
</div>
</body>
</html>