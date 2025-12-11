<?php
// ===== DÉCLARATION DES VARIABLES =====

// Variables chaînes de caractères
$etablissement = "Université Mohammed V";
$module = "Développement Web";
$professeur = "Dr. Ahmed Bennani";
$semestre = "Semestre 5";

// Variables entières
$annee = 2024;
$tp_numero = 6;
$nombre_etudiants = 45;
$duree_tp = 3; // en heures

// Variables décimales
$note1 = 15.5;
$note2 = 17.0;
$note3 = 16.25;
$note4 = 14.75;

// Variables numériques pour les exemples
$nombre1 = 25;
$nombre2 = 15;
$prix_unitaire = 49.99;
$quantite = 3;

// ===== CALCULS SIMPLES =====

// Opérations arithmétiques de base
$somme = $nombre1 + $nombre2;
$difference = $nombre1 - $nombre2;
$produit = $nombre1 * $nombre2;
$division = $nombre1 / $nombre2;
$modulo = $nombre1 % $nombre2;

// Calculs avancés
$total_commande = $prix_unitaire * $quantite;
$tva = $total_commande * 0.20; // TVA 20%
$total_ttc = $total_commande + $tva;

// Calculs de moyennes
$moyenne_notes = ($note1 + $note2 + $note3 + $note4) / 4;
$moyenne_nombres = ($nombre1 + $nombre2) / 2;

// Concaténation de chaînes
$annee_complete = $annee . "-" . ($annee + 1);
$titre_complet = "TP" . $tp_numero . " : " . $module;
$message_bienvenue = "Bienvenue à " . $etablissement;

// Calculs avec des dates
$annee_prochaine = $annee + 1;
$age_etudiant = 21;
$annee_naissance = $annee - $age_etudiant;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info PHP - TP<?php echo $tp_numero; ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
            min-height: 100vh;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #667eea;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        h2 {
            color: #764ba2;
            font-size: 1.8rem;
            margin: 2rem 0 1rem 0;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #667eea;
        }

        .info-box {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 50%);
            padding: 1.5rem;
            margin: 1rem 0;
            border-left: 5px solid #667eea;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .info-box:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .info-box p {
            margin: 0.5rem 0;
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .info-box strong {
            color: #333;
            font-weight: 600;
            display: inline-block;
            min-width: 180px;
        }

        .result {
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            padding: 1.2rem;
            margin: 0.8rem 0;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-size: 1.1rem;
            border-left: 5px solid #4caf50;
            transition: all 0.3s ease;
        }

        .result:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }

        .result strong {
            color: #2e7d32;
        }

        .highlight {
            color: #667eea;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .php-code {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 1rem;
            border-radius: 8px;
            margin: 1rem 0;
            font-family: 'Courier New', monospace;
            font-size: 0.95rem;
            overflow-x: auto;
        }

        .php-var {
            color: #ae81ff;
        }

        .php-string {
            color: #a6e22e;
        }

        .php-number {
            color: #66d9ef;
        }

        footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #e0e0e0;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }

        table th,
        table td {
            padding: 0.8rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #667eea;
            color: white;
            font-weight: 600;
        }

        table tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🐘 Introduction au PHP</h1>
        <p class="subtitle">TP<?php echo $tp_numero; ?> - Variables et Calculs Simples</p>

        <!-- Section 1 : Informations Générales -->
        <h2>📚 Informations Générales</h2>
        <div class="info-box">
            <p><strong>Nom de l'établissement:</strong> <?php echo $etablissement; ?></p>
            <p><strong>Module:</strong> <?php echo $module; ?></p>
            <p><strong>Professeur:</strong> <?php echo $professeur; ?></p>
            <p><strong>Semestre:</strong> <?php echo $semestre; ?></p>
            <p><strong>Année universitaire:</strong> <?php echo $annee_complete; ?></p>
            <p><strong>Numéro du TP:</strong> TP<?php echo $tp_numero; ?></p>
            <p><strong>Nombre d'étudiants:</strong> <?php echo $nombre_etudiants; ?> étudiants</p>
            <p><strong>Durée du TP:</strong> <?php echo $duree_tp; ?> heures</p>
        </div>

        <!-- Section 2 : Variables Numériques -->
        <h2>🔢 Variables Numériques - Exemples</h2>
        <div class="info-box">
            <p><strong>Variable $nombre1:</strong> <span class="highlight"><?php echo $nombre1; ?></span></p>
            <p><strong>Variable $nombre2:</strong> <span class="highlight"><?php echo $nombre2; ?></span></p>
            <p><strong>Variable $prix_unitaire:</strong> <span class="highlight"><?php echo $prix_unitaire; ?> €</span></p>
            <p><strong>Variable $quantite:</strong> <span class="highlight"><?php echo $quantite; ?></span></p>
        </div>

        <!-- Section 3 : Opérations Arithmétiques -->
        <h2>➕ Résultats des Opérations</h2>
        
        <div class="result">
            <strong>Addition:</strong> 
            <?php echo $nombre1; ?> + <?php echo $nombre2; ?> = 
            <span class="highlight"><?php echo $somme; ?></span>
        </div>

        <div class="result">
            <strong>Soustraction:</strong> 
            <?php echo $nombre1; ?> - <?php echo $nombre2; ?> = 
            <span class="highlight"><?php echo $difference; ?></span>
        </div>

        <div class="result">
            <strong>Multiplication:</strong> 
            <?php echo $nombre1; ?> × <?php echo $nombre2; ?> = 
            <span class="highlight"><?php echo $produit; ?></span>
        </div>

        <div class="result">
            <strong>Division:</strong> 
            <?php echo $nombre1; ?> ÷ <?php echo $nombre2; ?> = 
            <span class="highlight"><?php echo number_format($division, 2); ?></span>
        </div>

        <div class="result">
            <strong>Modulo:</strong> 
            <?php echo $nombre1; ?> % <?php echo $nombre2; ?> = 
            <span class="highlight"><?php echo $modulo; ?></span>
        </div>

        <!-- Section 4 : Calculs Avancés -->
        <h2>💰 Exemple de Calcul Commercial</h2>
        <div class="info-box">
            <table>
                <tr>
                    <th>Description</th>
                    <th>Valeur</th>
                </tr>
                <tr>
                    <td>Prix unitaire</td>
                    <td><?php echo number_format($prix_unitaire, 2); ?> €</td>
                </tr>
                <tr>
                    <td>Quantité</td>
                    <td><?php echo $quantite; ?></td>
                </tr>
                <tr>
                    <td><strong>Total HT</strong></td>
                    <td><strong><?php echo number_format($total_commande, 2); ?> €</strong></td>
                </tr>
                <tr>
                    <td>TVA (20%)</td>
                    <td><?php echo number_format($tva, 2); ?> €</td>
                </tr>
                <tr>
                    <td><strong>Total TTC</strong></td>
                    <td><strong class="highlight"><?php echo number_format($total_ttc, 2); ?> €</strong></td>
                </tr>
            </table>
        </div>

        <!-- Section 5 : Notes et Moyennes -->
        <h2>📊 Calculs de Notes</h2>
        <div class="info-box">
            <p><strong>Note 1:</strong> <?php echo $note1; ?>/20</p>
            <p><strong>Note 2:</strong> <?php echo $note2; ?>/20</p>
            <p><strong>Note 3:</strong> <?php echo $note3; ?>/20</p>
            <p><strong>Note 4:</strong> <?php echo $note4; ?>/20</p>
        </div>

        <div class="result">
            <strong>Moyenne générale:</strong> 
            (<?php echo $note1; ?> + <?php echo $note2; ?> + <?php echo $note3; ?> + <?php echo $note4; ?>) ÷ 4 = 
            <span class="highlight"><?php echo number_format($moyenne_notes, 2); ?>/20</span>
        </div>

        <!-- Section 6 : Concaténation -->
        <h2>🔗 Concaténation de Chaînes</h2>
        <div class="result">
            <strong>Message complet:</strong> <?php echo $message_bienvenue; ?>
        </div>

        <div class="result">
            <strong>Titre du TP:</strong> <?php echo $titre_complet; ?>
        </div>

        <div class="result">
            <strong>Période:</strong> Année universitaire <?php echo $annee_complete; ?>
        </div>

        <!-- Section 7 : Code PHP Exemple -->
        <h2>💻 Exemples de Code PHP</h2>
        <div class="php-code">
<span class="php-var">$etablissement</span> = <span class="php-string">"Université Mohammed V"</span>;
<span class="php-var">$annee</span> = <span class="php-number">2024</span>;
<span class="php-var">$nombre1</span> = <span class="php-number">25</span>;
<span class="php-var">$nombre2</span> = <span class="php-number">15</span>;
<span class="php-var">$somme</span> = <span class="php-var">$nombre1</span> + <span class="php-var">$nombre2</span>; <span style="color: #75715e;">// Résultat: <?php echo $somme; ?></span>
echo <span class="php-string">"La somme est : "</span> . <span class="php-var">$somme</span>;
        </div>

        <footer>
            <p><strong>TP<?php echo $tp_numero; ?> - <?php echo $module; ?></strong></p>
            <p><?php echo $etablissement; ?> - <?php echo $annee_complete; ?></p>
            <p style="margin-top: 1rem; font-size: 0.9rem;">
                Page générée avec PHP <?php echo phpversion(); ?>
            </p>
        </footer>
    </div>
</body>
</html>