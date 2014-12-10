<?php $this->set('title_for_layout',"Liste des recettes"); ?>
<table class="table table-bordered">
	<caption>
		<h4>Liste des Recettes</h4>
	</caption>
	<thead>
  		<tr>
  			<th class="thNom">En images</th>
        	<th class="thNom" style="width : 250px">Nom</th>
        	<th class="thPreparation">Préparation</th>
        	<th style="width : 115px">Au panier</th>
  		</tr>
	</thead>
   	<tbody>
<?php 
	foreach ($listRecipes as $recipe => $v): ?>
	          	<tr>
	            	<td><?php ?></td>
	            	<td><?php echo $v['Recipe']['title']; ?></td>
	            	<td><?php echo $v['Recipe']['recipe']; ?></td>
	            	<td><?php echo $this->Html->Link('', array('controller' => 'recipes', 'action' =>'add_in_cart',  $v['Recipe']['id']), array('class' => 'btn btn-primary center-block glyphicon glyphicon-plus')) ?></td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>