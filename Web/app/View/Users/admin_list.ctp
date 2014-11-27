<div class="container">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td><strong>Utilisateurs</strong></td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Nom</td>
						<td>Prénom</td>
						<td>Date de naissance</td>
						<td>Rue</td>
						<td>CP</td>
						<td>Pays</td>
						<td>Téléphone</td>
						<td>E-mail</td>
						<td>Opérations de gestion</td>
					</tr>
					<?php
						echo "<tr><td>" . "Koby" . "</td>";
						echo "<td>" . "Dylan" . "</td>";
						echo "<td>" . "6 Mai 1994" . "</td>";
						echo "<td>" . "8 rue des marronniers" . "</td>";
						echo "<td>" . "57570" . "</td>";
						echo "<td>" . "France" . "</td>";
						echo "<td>" . "06 68 95 96 45" . "</td>";
						echo "<td>" . "test57@hotmail.fr" . "</td>";
						echo "<td>" .   "<button type='button' class='btn btn-info'><i class='icon-large icon-pencil'></i></button>
 										 <button type='button' class='btn btn-info'><i class='icon-large icon-remove'></i></button>"
 									. "</td>";
					/*
						$sql="SELECT * FROM salles, departement WHERE no_dpt=no_dpt_salle ORDER BY lib_dpt";
						$req=mysql_query($sql);
						if($req)
						{
							while($data=mysql_fetch_array($req))
							{
								$nom=$data['lib_salle'];
								echo "<tr><td>".$data['lib_dpt']."</td>";
								echo "<td>".$data['lib_salle']."</td>";
								echo "<td>".$data['type']."</td>";
								echo "<td>".$data['projecteur']."</td>";
								echo "<td>".$data['nb_places']."</td>";
								echo "<td>"."<a href=\"modSalle.php?salle=".$data['lib_salle']."&dpt=".$data['lib_dpt']."\" title=\"Modifier\" alt=\"Modifier\" class=\"ico_modif\"></a>"."</td>";
								echo "<td>"."<a href=\"#\" class=\"ico_supp\" title=\"Supprimer\" alt=\"Supprimer\" onclick=\"conf_supp('$nom');\"></a>"."</td>";
							}
						}
					*/
					?>
				</tbody>
			</table>
		</div>