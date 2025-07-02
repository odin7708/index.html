<?php
require 'db.php';

$type = $_POST['type'] ?? '';

switch ($type) {
    case 'competence':
    if (!empty($_POST['competence'])) {
        $stmt = $pdo->prepare("INSERT INTO competence (nom) VALUES (?)");
        $stmt->execute([htmlspecialchars($_POST['competence'])]);
    }
    break;

    case 'cv':
        if (!empty($_POST['titre']) && !empty($_POST['valeur'])) {
            $stmt = $pdo->prepare("INSERT INTO cv (titre, valeur) VALUES (?, ?)");
            $stmt->execute([
                htmlspecialchars($_POST['titre']),
                htmlspecialchars($_POST['valeur'])
            ]);
        }
        break;

    case 'passion':
        if (!empty($_POST['nom'])) {
            $stmt = $pdo->prepare("INSERT INTO passions (nom) VALUES (?)");
            $stmt->execute([htmlspecialchars($_POST['nom'])]);
        }
        break;

    case 'experience':
        if (!empty($_POST['description'])) {
            $stmt = $pdo->prepare("INSERT INTO experiences (description) VALUES (?)");
            $stmt->execute([htmlspecialchars($_POST['description'])]);
        }
        break;

    case 'delete':
        if (!empty($_POST['id']) && !empty($_POST['table'])) {
            $stmt = $pdo->prepare("DELETE FROM " . htmlspecialchars($_POST['table']) . " WHERE id = ?");
            $stmt->execute([$_POST['id']]);
        }
        break;

    case 'update':
        if (!empty($_POST['id']) && !empty($_POST['table'])) {
            if ($_POST['table'] === 'cv') {
                if (!empty($_POST['titre']) && !empty($_POST['valeur'])) {
                    $stmt = $pdo->prepare("UPDATE cv SET titre = ?, valeur = ? WHERE id = ?");
                    $stmt->execute([htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['valeur']), $_POST['id']]);
                }
            } elseif ($_POST['table'] === 'competence') {
                if (!empty($_POST['nom'])) {
                    $stmt = $pdo->prepare("UPDATE competence SET nom = ? WHERE id = ?");
                    $stmt->execute([htmlspecialchars($_POST['nom']), $_POST['id']]);
                }
            } elseif ($_POST['table'] === 'experiences') {
                if (!empty($_POST['description'])) {
                    $stmt = $pdo->prepare("UPDATE experiences SET description = ? WHERE id = ?");
                    $stmt->execute([htmlspecialchars($_POST['description']), $_POST['id']]);
                }
            }
        }
        break;
}

header("Location: index.php");
exit;
?>