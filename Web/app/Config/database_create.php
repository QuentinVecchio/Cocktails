<?php
$path = 'mysql:host=localhost';
$db_name = "database_koby_vecchio";
$login = 'root';
$pwd = '';
	/*
	*	Création de la base de données
	*/
	echo "Script de création de la base de données.</br></br>";
	echo "Création de la base de données ...</br></br>";
	try
	{
		$bdd = new PDO($path, $login, $pwd);
		$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$requete = "CREATE DATABASE IF NOT EXISTS " . $db_name . " DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
		$bdd->prepare($requete)->execute();
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}	

	/*
	*	Création des tables
	*/
	try
	{
		$bdd2 = new PDO($path .';dbname:' . $db_name .'', $login, $pwd);
		$bdd2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}

	/*
	*	Création table appartient
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`appartient` (
		`id` int(11) NOT NULL,
  		`ingredient` int(11) NOT NULL,
  		`categorie` int(11) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;"
	))
		echo "Création de la table appartient échoué.</br>";
	else
		echo "Création de la table appartient fait.</br>";

	/*
	*	Création table Categorie
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`Categorie` (
		`id` int(11) NOT NULL,
  		`nom` varchar(255) COLLATE utf8_bin NOT NULL,
  		`CategoriePere` int(11) DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;"
	))
		echo "Création de la table Catégorie échoué.</br>";
	else
		echo "Création de la table Catégorie fait.</br>";

	/*
	* Création association CategoriePere
	*/
		if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`categoriePere` (
		`id` int(11) NOT NULL,
  		`categ` int(11)  NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;"
	))
		echo "Création de la table CatégoriePere échoué.</br>";
	else
		echo "Création de la table CatégoriePere fait.</br>";


	/*
	*	Création table estConstitue
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`estConstitue` (
		`id` int(11) NOT NULL,
  		`ingredient` int(11) NOT NULL,
  		`recette` int(11) NOT NULL,
  		`index` int(11) NOT NULL,
  		`quantite` float NOT NULL,
  		`unite` varchar(255) COLLATE utf8_bin NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;"
	))
		echo "Création de la table estConstitue échoué.</br>";
	else
		echo "Création de la table estConstitue fait.</br>";

	/*
	*	Création table Ingrédient
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`ingredient` (
		`id` int(11) NOT NULL,
  		`nom` varchar(255) CHARACTER SET latin1 NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 "
	))
		echo "Création de la table Ingrédient échoué.</br>";
	else
		echo "Création de la table Ingrédient fait.</br>";

	/*
	*	Création table Recette
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`Recette` (
		`id` int(11) NOT NULL,
  		`titre` varchar(255) COLLATE utf8_bin NOT NULL,
  		`preparation` text COLLATE utf8_bin NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1"
	))
		echo "Création de la table Recette échoué.</br>";
	else
		echo "Création de la table Recette fait.</br>";

	/*
	*	Création table Utilisateur
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`Utilisateur` (
		`id` int(11) NOT NULL,
	  	`login` varchar(255) CHARACTER SET latin1 NOT NULL,
	  	`password` varchar(1000) CHARACTER SET latin1 NOT NULL,
	  	`prenom` varchar(255) CHARACTER SET latin1 NOT NULL,
	  	`nom` varchar(255) CHARACTER SET latin1 NOT NULL,
	  	`sexe` varchar(1) CHARACTER SET latin1 NOT NULL,
	  	`telephone` varchar(20) CHARACTER SET latin1 NOT NULL,
	  	`mail` varchar(255) CHARACTER SET latin1 NOT NULL,
	  	`numero` varchar(10) CHARACTER SET latin1 NOT NULL,
	  	`adresse` varchar(255) CHARACTER SET latin1 NOT NULL,
	  	`codePostal` varchar(20) CHARACTER SET latin1 NOT NULL,
	  	`pays` varchar(255) CHARACTER SET latin1 NOT NULL,
	  	`administrateur` tinyint(1) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1"
	))
		echo "Création de la table Utilisateur échoué.</br>";
	else
		echo "Création de la table Utilisateur fait.</br>";

	/*
	*	Création des dépendances
	*/
	$bdd2->exec("ALTER TABLE " . $db_name . ".`appartient`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`Categorie`
	ADD PRIMARY KEY (`id`), ADD KEY `categoriePere` (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`categoriePere`
	ADD PRIMARY KEY (`id`, `categ`)");


	$bdd2->exec("ALTER TABLE " . $db_name . ".`estConstitue`
	ADD PRIMARY KEY (`id`), ADD KEY `ingredient` (`ingredient`,`recette`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`ingredient`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`Recette`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`Utilisateur`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`appartient`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`Categorie`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`estConstitue`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`ingredient`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`Recette`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`Utilisateur`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

	echo "Création de la base de données terminée.</br>";

	/*
	*	Ajout des données
	*/
	echo "</br>Ajout des données ...</br>";
?>