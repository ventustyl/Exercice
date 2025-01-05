# Exercice 

Exercice Main est un petit projet interactif développé en HTML, CSS, JavaScript, et PHP. Ce projet est conçu pour créer des utilisateurs dans une base de données avec deux notes et faire la moyenne.

## Fonctionnalités

- Une page HTML simple pour l'affichage des fonctionnalités principales.
- Des styles définis dans `style.css` pour améliorer l'apparence de la page.
- Une logique JavaScript dans `script.js` pour gérer les interactions dynamiques.
- Un fichier `function.php` pour gérer les fonctionnalités côté serveur.

## Comment utiliser

1. Téléchargez tous les fichiers du projet.
2. Placez les fichiers dans un serveur local (par exemple, avec XAMPP ou WAMP).
3. Ouvrez `index.html` dans un navigateur moderne pour voir la partie front-end.
4. Assurez-vous que PHP est configuré correctement pour utiliser les fonctionnalités de `function.php`.

## Installation

Pour exécuter ce projet, assurez-vous d'avoir :

- Un serveur local pour exécuter les scripts PHP.
- Créer une base de données pro_note
- Créer la table students et ses propriétés avec la requête SQL suivante :
    -  `CREATE TABLE students (`
          `id INT AUTO_INCREMENT PRIMARY KEY, -- Identifiant unique`
          `firstName VARCHAR(255) NOT NULL,  -- Prénom`
          `lastName VARCHAR(255) NOT NULL,   -- Nom`
          `grade1 FLOAT NOT NULL,            -- Note 1`
          `grade2 FLOAT NOT NULL,            -- Note 2`
          `average FLOAT AS ((grade1 + grade2) / 2) STORED -- Moyenne calculée`
`);`
- Un navigateur moderne pour afficher et interagir avec le contenu.

## Technologies utilisées

- HTML
- CSS
- JQuery
- PHP

## Contribution

Les contributions sont les bienvenues. Si vous souhaitez améliorer ce projet, n'hésitez pas à faire un fork et à soumettre une pull request.

## Licence

Ce projet est sous licence MIT.
