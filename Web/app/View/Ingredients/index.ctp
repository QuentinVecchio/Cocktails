<table class="table table-bordered">
	<caption>
		<h4>Liste des Ingrédients</h4>
	</caption>
	<thead>
  		<tr>
  			<th class="thId">#</th>
        	<th class="thNom">Nom</th>
       	 	<th class="thPere">Catégorie</th>
  		</tr>
	</thead>
   	
   	<tbody>
<?php 
	foreach ($ingredients as $$ingredient): ?>
	          	<tr>
	            	<td><?php echo $ingredient['id']; ?></td>
	            	<td><?php echo $ingredient['nom']; ?></td>
	            	<td><?php echo $ingredient['categorie']['nom']; ?></td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>