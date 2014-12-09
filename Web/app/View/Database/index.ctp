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
	echo "Suppression de l'ancienne base de données ...</br></br>";
	try
	{
		$bdd = new PDO($path, $login, $pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$requete = "DROP DATABASE IF EXISTS " . $db_name;
		$bdd->prepare($requete)->execute();
		echo "Création de la base de données ...</br></br>";
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
		$bdd2 = new PDO($path .';dbname:' . $db_name .'', $login, $pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
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
  		`ind` int(11) NOT NULL,
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
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`ingredients` (
		`id` int(11) NOT NULL,
  		`name` varchar(255) COLLATE utf8_bin NOT NULL
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
	  	`username` varchar(255) COLLATE utf8_bin NOT NULL,
	  	`password` varchar(1000) COLLATE utf8_bin NOT NULL,
	  	`firstname` varchar(255) COLLATE utf8_bin NOT NULL,
	  	`lastname` varchar(255) COLLATE utf8_bin NOT NULL,
	  	`gender` varchar(1) COLLATE utf8_bin NOT NULL,
	  	`phone` varchar(20) COLLATE utf8_bin NOT NULL,
	  	`email` varchar(255) COLLATE utf8_bin NOT NULL,
	  	`street` varchar(255) COLLATE utf8_bin NOT NULL,
	  	`town` varchar(255) COLLATE utf8_bin NOT NULL,
	  	`zipcode` varchar(20) COLLATE utf8_bin NOT NULL,
	  	`country` varchar(255) COLLATE utf8_bin NOT NULL,
	  	`role` varchar(255) COLLATE utf8_bin NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1"
	))
		echo "Création de la table Utilisateur échouée.</br>";
	else
		echo "Création de la table Utilisateur faite.</br>";

	/*
	*	Création des dépendances
	*/

	$bdd2->exec("ALTER TABLE " . $db_name . ".`belongs`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`Conditions`
	ADD PRIMARY KEY (`id`), ADD KEY `fatherCondition` (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`isMadeOf`
	ADD PRIMARY KEY (`id`), ADD KEY `ingredient` (`ingredient`,`recipe`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`ingredients`
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
	$bdd2->exec("ALTER TABLE " . $db_name . ".`ingredients`
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
	*/
	$adminpass = AuthComponent::password('root');
	$requete = "INSERT INTO " . $db_name . ".`Users` (username, password, firstname, lastname, gender, phone, email, street, town, zipcode, country, role) VALUES ('root', '". $adminpass ."','','','','','','','','','', 'admin')";
	if($bdd2->exec($requete))
		echo "Admin ajouté</br>";

	foreach ($Recettes as $key => $Recette) 
	{
		/*
		*	Ajout des recettes
		*/
		$requete = "INSERT INTO " . $db_name . ".`Recipes` (title, recipe) VALUES ('" . str_replace("'","",$Recette['titre']) . "', '" . str_replace("'","",$Recette['preparation']) . "')";
		if($bdd2->exec($requete))
				echo "Recette ajoutée</br>";

		/*
		*	Ajout des aliments
		*/
		foreach ($Recette['index'] as $aliment) 
		{
			$existe = $bdd2->query("SELECT * FROM ". $db_name . ".`ingredients` WHERE name = '" . str_replace("'","",$aliment) . "'");
			if($existe->fetch() == false)
			{
				$requete =  "INSERT INTO " . $db_name . ".`ingredients` (name) VALUES ('" . str_replace("'","",$aliment) . "')";
				if($bdd2->exec($requete))
					echo "Aliment ajouté</br>";
			}
		}

		/*
		*	Ajout des realtions entres recette et ses ingredients
		*/
		$reponse = $bdd2->query("SELECT * FROM ". $db_name . ".`Recipes` WHERE title = '" . str_replace("'","",$Recette['titre']) . "'");
		$r = $reponse->fetch();
		foreach ($Recette['index'] as $key => $aliment) 
		{
			$reponse = $bdd2->query("SELECT * FROM ". $db_name . ".`ingredients` WHERE name = '" . str_replace("'","",$aliment) . "'");
			$ingredient = $reponse->fetch();
			$amount = 0;
			$unit = 'ok';
			$requete =  "INSERT INTO " . $db_name . ".`isMadeOf` (ingredient, recipe, ind, amount, unit) VALUES ('" . $ingredient['id'] . "', '" . $r['id'] . "', '" .  $key . "', '" . $amount . "', '" . $unit . "')";
			if($bdd2->exec($requete))
				echo "Ingredient ajouté</br>";
		}
	}

	foreach ($Hierarchie as $key => $categorie) 
	{
		/*
		*	Ajout de la super catégorie si elle existe pas
		*/
		if(!empty($categorie['super-categorie'][0]))
		{
			$existe = $bdd2->query("SELECT * FROM " . $db_name . ".`Conditions` WHERE name = '" . str_replace("'","",$categorie['super-categorie'][0]) . "'");
			if(($super = $existe->fetch()) == false)
			{
				$requete = "INSERT INTO " . $db_name . ".`Conditions` (name, fathercondition) VALUES ('" . str_replace("'","",$categorie['super-categorie'][0]) . "', NULL)";
				if($bdd2->exec($requete))
					echo "Super-categorie ajoutée</br>";
				$existe = $bdd2->query("SELECT * FROM " . $db_name . ".`Conditions` WHERE name = '" . str_replace("'","",$categorie['super-categorie'][0]) . "'");
				$super1 = $existe->fetch();
			}
		}

		/*
		* Ajout de la categorie
		*/
		$existe = $bdd2->query("SELECT * FROM " . $db_name . ".`Conditions` WHERE name = '" . str_replace("'","",$key) . "'");
		if(($super = $existe->fetch()) == false)
		{
			$requete = "INSERT INTO " . $db_name . ".`Conditions` (name, fathercondition) VALUES ('" . str_replace("'","",$key) . "', '" . $super1['id'] ."')";
			if($bdd2->exec($requete))
				echo "Categorie ajoutée</br>";
			$existe = $bdd2->query("SELECT * FROM " . $db_name . ".`Conditions` WHERE name = '" . str_replace("'","",$key) . "'");
			$super1 = $existe->fetch();
		}

		/*
		* Ajout des sous catégorie
		*/
		if(!empty($categorie['sous-categorie'][0]))
		{
			foreach ($categorie['sous-categorie'] as $value) 
			{
				$existe = $bdd2->query("SELECT * FROM " . $db_name . ".`Conditions` WHERE name = '" . str_replace("'","",$value) . "'");
				if($existe->fetch() == false)
				{
					$requete = "INSERT INTO " . $db_name . ".`Conditions` (name, fathercondition) VALUES ('" . str_replace("'","",$value) . "', " . $super1['id'] .")";
					if($bdd2->exec($requete))
						echo "Sous-categorie ajoutée</br>";
				}
			}
		}
	}
	echo "</br>Insertion des données terminée...</br>";
?>