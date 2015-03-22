Appartoo Test stage
=========

Pour accéder à la page de login : Cliquer sur "Anonyme", dans la barre du haut, à droite.
- Se connecter ou s'inscrire
- Modifier son profil, en allant sur "Profil" dans la barre du haut, à droite.
- Tester les ajouts / suppressions au carnet / liste de contacts, en allant sur "Carnet" , en dessous de "Accueuil" dans la barre du haut.

J'explique les différentes fonctions et lignes de code avec des commentaires. <br />

J'ai créé 2 Bundles:
- Accueil:<br />
    1 Controller : <br />
        Default : Pour afficher l'accueil<br />
- User : <br />
    3 Controllers : <br />
      - Gestion : Gère le profil, et le carnet<br />
      - Security ( fos_user : redéfini )<br />
      - Registration ( fos_user : redéfini )
<br /> <br />
----------

Pour les templates : <br />
* J'ai repris les 3 templates de fos_user : register, layout, login <br />et j'ai ajouté des héritages à la template 'base' dans le dossier app/Resources/views. <br /> <br />
* J'ai créé 5 templates pour gérer le profil et le carnet. <br />
* J'ai créé 1 template pour gérer l'accueil. <br />
* J'ai créé 2 templates génériques dans app/Resources/views : <br />
    * nav : Pour la barre de navigation / login <br />
    * base : Pour le bloc head + le bloc footer + scripts de base

Pour administrer la base de données :  <br />
https://github.com/morvancalmel/AppartooTest/blob/master/app/config/parameters.yml

J'ai également créé 3 entities qui synchronise Symfony et les tables de la base de données en MySQL :
* User
* Profil
* Carnet
