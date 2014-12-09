<table class="table table-bordered">
	<caption>
		<h4>Liste des Recettes</h4>
	</caption>
	<thead>
  		<tr>
  			<th class="thId">#</th>
  			<th class="thNom">En images</th>
        	<th class="thNom" style="width : 250px">Nom</th>
        	<th class="thPreparation">Préparation</th>
  		</tr>
	</thead>
   	<tbody>
<?php 
	foreach ($listRecipes as $recipe => $v): ?>
	          	<tr>
	            	<td><?php echo $v['Recipe']['id']; ?></td>
	            	<td><?php ?></td>
	            	<td><?php echo $v['Recipe']['title']; ?></td>
	            	<td><?php echo $v['Recipe']['recipe']; ?></td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>