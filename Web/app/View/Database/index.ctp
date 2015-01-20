<?php $this->set('title_for_layout',"Base de données"); ?>
<div id="container">
<?php
include("Donnees.inc.php");
include("../Config/database.php");
$db = new DATABASE_CONFIG();
$path = 'mysql:host=' . $db->default['host'];
$db_name = $db->default['database'];
$login = $db->default['login'];
$pwd = $db->default['password'];
	/*
	*	Création de la base de données
	*/
	echo "Script de création de la base de données.</br></br>";
	echo "Suppression de l'ancienne base de données ...</br></br>";
	try
	{
		$bdd = new PDO($path, $login, $pwd);
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
  		`cond` int(11) NOT NULL
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
  		`name` varchar(255) COLLATE utf8_bin NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;"
	))
		echo "Création de la table Catégorie échouée.</br>";
	else
		echo "Création de la table Catégorie faite.</br>";


	/*
	*	Création table fatherCOndition
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`fatherConditions` (
		`id` int(11) NOT NULL,
  		`father` int(11) NOT NULL,
  		`son` int(11) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;"
	))
		echo "Création de la table fatherCatégorie échouée.</br>";
	else
		echo "Création de la table fatherCatégorie faite.</br>";

	/*
	*	Création table estConstitue
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`isMadeOf` (
		`id` int(11) NOT NULL,
  		`ingredient` int(11) NOT NULL,
  		`recipe` int(11) NOT NULL,
  		`ind` int(11) NOT NULL,
  		`amount` varchar(255) NOT NULL
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
	  	`birthdate` date COLLATE utf8_bin NOT NULL,
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
	*	Création table Panier
	*/
	if($bdd2->exec("CREATE TABLE IF NOT EXISTS " . $db_name . ".`Carts` (
		`id` int(11) NOT NULL,
  		`user` int(11) NOT NULL,
  		`recipe`  int(11) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1"
	))
		echo "Création de la table Panier échouée.</br>";
	else
		echo "Création de la table Panier faite.</br>";

	/*
	*	Création des dépendances
	*/

	$bdd2->exec("ALTER TABLE " . $db_name . ".`belongs`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`Conditions`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`fatherConditions`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`isMadeOf`
	ADD PRIMARY KEY (`id`), ADD KEY `ingredient` (`ingredient`,`recipe`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`ingredients`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`Recipes`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`Users`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`Carts`
	ADD PRIMARY KEY (`id`)");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`belongs`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`Conditions`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`fatherConditions`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`isMadeOf`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`ingredients`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`Recipes`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	$bdd2->exec("ALTER TABLE " . $db_name . ".`Users`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

	$bdd2->exec("ALTER TABLE " . $db_name . ".`Carts`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
	
	$bdd2->exec("ALTER TABLE " . $db_name . ".isMadeOf ADD FOREIGN KEY (ingredient) references  " . $db_name . ".ingredients(id) ON DELETE CASCADE ON UPDATE CASCADE");
	$bdd2->exec("ALTER TABLE " . $db_name . ".isMadeOf ADD FOREIGN KEY (recipe) references  " . $db_name . ".Recipes(id) ON DELETE CASCADE ON UPDATE CASCADE");
	$bdd2->exec("ALTER TABLE " . $db_name . ".Carts ADD FOREIGN KEY (user) references  " . $db_name . ".Users(id) ON DELETE CASCADE ON UPDATE CASCADE");
	$bdd2->exec("ALTER TABLE " . $db_name . ".Carts ADD FOREIGN KEY (recipe) references  " . $db_name . ".Recipes(id) ON DELETE CASCADE ON UPDATE CASCADE");
	$bdd2->exec("ALTER TABLE " . $db_name . ".belongs ADD FOREIGN KEY (ingredient) references  " . $db_name . ".ingredients(id) ON DELETE CASCADE ON UPDATE CASCADE");
	$bdd2->exec("ALTER TABLE " . $db_name . ".belongs ADD FOREIGN KEY (cond) references  " . $db_name . ".Conditions(id) ON DELETE CASCADE ON UPDATE CASCADE");
	$bdd2->exec("ALTER TABLE " . $db_name . ".fatherConditions ADD FOREIGN KEY (father) references  " . $db_name . ".Conditions(id) ON DELETE CASCADE ON UPDATE CASCADE");
	$bdd2->exec("ALTER TABLE " . $db_name . ".fatherConditions ADD FOREIGN KEY (son) references  " . $db_name . ".Conditions(id) ON DELETE CASCADE ON UPDATE CASCADE");

	echo "Création de la base de données terminée.</br>";

	/*
	*	Ajout des données
	*/
	echo "</br>Ajout des données ...</br>";

	/*
	*	Ajout de l'administrateur
	*/
	$adminpass = AuthComponent::password('root');
	$requete = "INSERT INTO " . $db_name . ".`Users` (username, password, firstname, lastname, birthdate, gender, phone, email, street, town, zipcode, country, role) VALUES ('root', '". $adminpass ."','','','0000-00-00','', '','','','','','', 'admin')";
	if($bdd2->exec($requete))
		echo "";

	foreach ($Recettes as $key => $Recette) 
	{
		/*
		*	Ajout des recettes
		*/
		$requete = "INSERT INTO " . $db_name . ".`Recipes` (title, recipe) VALUES ('" . str_replace("'","",$Recette['titre']) . "', '" . str_replace("'","",$Recette['preparation']) . "')";
		if($bdd2->exec($requete))
				echo "";

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
					echo "";
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
			$amount = explode('|',$Recette['ingredients']);
			$requete =  "INSERT INTO " . $db_name . ".`isMadeOf` (ingredient, recipe, ind, amount) VALUES ('" . $ingredient['id'] . "', '" . $r['id'] . "', '" .  $key . "', '" . str_replace("'","",$amount[$key]) . "')";
			if($bdd2->exec($requete))
				echo "";
		}
	}

	foreach ($Hierarchie as $key => $categorie) 
	{
		/*
		* Ajout de la categorie
		*/
		if(isset($categorie['sous-categorie']))
		{
			$existe = $bdd2->query("SELECT * FROM " . $db_name . ".`Conditions` WHERE name = '" . str_replace("'","",$key) . "'");
			if(($super = $existe->fetch()) == false)
			{
				$requete = "INSERT INTO " . $db_name . ".`Conditions` (name) VALUES ('" . str_replace("'","",$key) . "')";
				if($bdd2->exec($requete))
					echo "";
				$existe = $bdd2->query("SELECT * FROM " . $db_name . ".`Conditions` WHERE name = '" . str_replace("'","",$key) . "'");
				$super1 = $existe->fetch();
			}
			foreach ($categorie['sous-categorie'] as $value) 
			{
				$existe = $bdd2->query("SELECT * FROM " . $db_name . ".`ingredients` WHERE name = '" . str_replace("'","",$value) . "'");
				if(($donne = $existe->fetch()) != FALSE)
				{
					$requete = "INSERT INTO " . $db_name . ".`belongs` (ingredient, cond) VALUES ('" . $donne['id'] . "', '" . $super1['id'] ."')";
					if($bdd2->exec($requete))
						echo "";
				}
			}
		}
		else
		{
			$existe = $bdd2->query("SELECT * FROM ". $db_name . ".`ingredients` WHERE name = '" . str_replace("'","",$key) . "'");
			if($existe->fetch() == false)
			{
				$requete =  "INSERT INTO " . $db_name . ".`ingredients` (name) VALUES ('" . str_replace("'","",$key) . "')";
				if($bdd2->exec($requete))
					echo "";
			}
		}

		/*
		*	Ajout de la super catégorie si elle existe pas
		*/
		if(!empty($categorie['super-categorie'][0]))
		{
			foreach ($categorie['super-categorie'] as $supCateg) 
			{
				$existe = $bdd2->query("SELECT * FROM " . $db_name . ".`Conditions` WHERE name = '" . str_replace("'","",$supCateg) . "'");
				if(($super = $existe->fetch()) == false)
				{
					$requete = "INSERT INTO " . $db_name . ".`Conditions` (name) VALUES ('" . str_replace("'","",$supCateg) . "')";
					if($bdd2->exec($requete))
						echo "";
					$existe = $bdd2->query("SELECT * FROM " . $db_name . ".`Conditions` WHERE name = '" . str_replace("'","",$supCateg) . "'");
					$super2 = $existe->fetch();
					//Mise en place hierarchie
					$requete = "INSERT INTO " . $db_name . ".`fatherConditions` (father, son) VALUES ('" . $super2['id'] . "', '" . $super1['id'] . "')";
					if($bdd2->exec($requete))
						echo "";
				}
			}	
		}
	}
	
	echo "Création et insertion des données terminées avec succès.";
?>
</div>