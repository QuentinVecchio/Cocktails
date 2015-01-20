<?php $this->set('title_for_layout',"Liste des recettes"); ?>
<table class="table table-striped">
	<caption>
		<h4>Liste des recettes comportant <?php echo $nom; ?></h4>
	</caption>
	<thead>
  		<tr>
        	<th class="thNom">Nom</th>
  		</tr>
	</thead>
   	
   	<tbody>
<?php 
	foreach ($listRecipes as $recipe => $v):  ?>
	          	<tr>
	            	<td><?php echo $this->Html->Link($v['title'], array('controller' => 'recipes', 'action' =>'view', 
	            											'admin' => false, $v['id'])) ?></td>
	        	</tr> 
	<?php endforeach; ?>
  	</tbody>
</table>