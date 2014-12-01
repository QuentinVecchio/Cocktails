<table class="table table-bordered">
	<caption>
		<h4>Liste des Catégories</h4>
	</caption>
	<thead>
  		<tr>
  			<th class="thId">#</th>
        	<th class="thNom">Nom</th>
       	 	<th class="thPere">Catégorie père</th>
  		</tr>
	</thead>
   	
   	<tbody>
<?php 
	foreach ($categories as $$categorie): ?>
	          	<tr>
	            	<td><?php echo $categorie['id']; ?></td>
	            	<td><?php echo $categorie['nom']; ?></td>
	            	<td><?php if($categorie['pere'] != null) echo $categorie['pere']['nom']; ?></td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>