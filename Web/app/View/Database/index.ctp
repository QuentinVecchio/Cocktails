<?php
include("Donnees.inc.php");
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
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`belongs` (
		`id` int(11) NOT NULL,
  		`ingredient` int(11) NOT NULL,
  		`condition` int(11) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;"
	))
		echo "Création de la table appartient échouée.</br>";
	else
		echo "Création de la table appartient faite.</br>";

	/*
	*	Création table Categorie
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`Conditions` (
		`id` int(11) NOT NULL,
  		`name` varchar(255) COLLATE utf8_bin NOT NULL,
  		`fathercondition` int(11) DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;"
	))
		echo "Création de la table Catégorie échouée.</br>";
	else
		echo "Création de la table Catégorie faite.</br>";


	/*
	*	Création table estConstitue
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`isMadeOf` (
		`id` int(11) NOT NULL,
  		`ingredient` int(11) NOT NULL,
  		`recipe` int(11) NOT NULL,
  		`index` int(11) NOT NULL,
  		`amount` float NOT NULL,
  		`unit` varchar(255) COLLATE utf8_bin NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;"
	))
		echo "Création de la table estConstitue échouée.</br>";
	else
		echo "Création de la table estConstitue faite.</br>";

	/*
	*	Création table Ingrédient
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`ingredient` (
		`id` int(11) NOT NULL,
  		`name` varchar(255) CHARACTER SET utf8_bin NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 "
	))
		echo "Création de la table Ingrédient échouée.</br>";
	else
		echo "Création de la table Ingrédient faite.</br>";

	/*
	*	Création table Recette
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`Recipes` (
		`id` int(11) NOT NULL,
  		`title` varchar(255) COLLATE utf8_bin NOT NULL,
  		`recipe` text COLLATE utf8_bin NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1"
	))
		echo "Création de la table Recette échouée.</br>";
	else
		echo "Création de la table Recette faite.</br>";

	/*
	*	Création table Utilisateur
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`Users` (
		`id` int(11) NOT NULL,
	  	`login` varchar(255) CHARACTER SET utf8_bin NOT NULL,
	  	`password` varchar(1000) CHARACTER SET utf8_bin NOT NULL,
	  	`firstname` varchar(255) CHARACTER SET utf8_bin NOT NULL,
	  	`lastname` varchar(255) CHARACTER SET utf8_bin NOT NULL,
	  	`gender` varchar(1) CHARACTER SET utf8_bin NOT NULL,
	  	`phone` varchar(20) CHARACTER SET utf8_bin NOT NULL,
	  	`email` varchar(255) CHARACTER SET utf8_bin NOT NULL,
	  	`street` varchar(255) CHARACTER SET utf8_bin NOT NULL,
	  	`town` varchar(255) CHARACTER SET utf8_bin NOT NULL,
	  	`zipcode` varchar(20) CHARACTER SET utf8_bin NOT NULL,
	  	`country` varchar(255) CHARACTER SET utf8_bin NOT NULL,
	  	`admin` tinyint(1) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1"
	))
		echo "Création de la table Utilisateur échouée.</br>";
	else
		echo "Création de la table Utilisateur faite.</br>";

	/*
	*	Création des dépendances
	
	$bdd2->exec("ALTER TABLE " . $db_name . ".`belongs`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`Conditions`
	ADD PRIMARY KEY (`id`), ADD KEY `fatherCondition` (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`isMadeOf`
	ADD PRIMARY KEY (`id`), ADD KEY `ingredient` (`ingredient`,`recipe`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`ingredient`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`Recipes`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`Users`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`belongs`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`Conditions`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`isMadeOf`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`ingredient`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`Recipes`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`Users`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

	echo "Création de la base de données terminée.</br>";

	/*
	*	Ajout des données
	*/
	echo "</br>Ajout des données ...</br>";

	/*
	*	Ajout de l'administrateur
	*	
	*/
	$requete = "INSERT INTO " . $db_name . ".`Users` (login, password, firstname, lastname, gender, phone, email, street, town, zipcode, country, role) VALUES ('root','root','','','h','','','','','','','1')";
	$bdd2->exec($requete);

	foreach ($Recettes as $key => $Recette) 
	{
		/*
		*	Ajout des recettes
		*/
		$requete = "INSERT INTO " . $db_name . ".`Recipes` (title, recipe) VALUES ('" . str_replace("'","",$Recette['title']) . "', '" . str_replace("'","",$Recette['preparation']) . "')";
		$bdd2->exec($requete);

		/*
		*	Ajout des aliments
		*/
		foreach ($Recette['index'] as $aliment) 
		{
			$existe = $bdd2->query("SELECT * FROM ". $db_name . ".`ingredient` WHERE name = '" . str_replace("'","",$aliment) . "'");
			if($existe->fetch() == false)
			{
				$requete =  "INSERT INTO " . $db_name . ".`ingredient` (name) VALUES ('" . str_replace("'","",$aliment) . "')";
				$bdd2->exec($requete);
			}
		}

		/*
		*	Ajout des realtions entres recette et ses ingredients
		*/
		$reponse = $bdd2->query("SELECT * FROM ". $db_name . ".`Recipes` WHERE title = '" . str_replace("'","",$Recette['title']) . "'");
		$r = $reponse->fetch();
		foreach ($Recette['index'] as $key => $aliment) 
		{
			$reponse = $bdd2->query("SELECT * FROM ". $db_name . ".`ingredient` WHERE name = '" . str_replace("'","",$aliment) . "'");
			$ingredient = $reponse->fetch();
			$requete =  "INSERT INTO " . $db_name . ".`isMadeOf` (ingredient, recipe, index, amount, unit) VALUES ('" . $ingredient['id'] . "', '" . $r['id'] . "', '" .  $key . "', '" . $amount . "', '" . $unit . "')";
			if($bdd2->exec($requete))
				echo "ingredient ajouté</br>";
		}
	}

	foreach ($Hierarchie as $key => $categorie) 
	{
		/*
		*	Ajout des categories
		*/
		$requete = "INSERT INTO " . $db_name . ".`Conditions` (name, recipe) VALUES ('" . str_replace("'","",$Recette['title']) . "', '" . str_replace("'","",$Recette['preparation']) . "')";
		$bdd2->exec($requete);
	}
?>