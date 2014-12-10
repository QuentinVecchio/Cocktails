<?php $this->set('title_for_layout',"Liste des recettes"); ?>
<table class="table table-bordered">
	<caption>
		<h4>Liste des Recettes</h4>
		<?php echo $this->Html->Link('Nouvelle recette', array('controller' => 'recipes', 'action' =>'admin_add'), array('class' => 'btn btn-primary')) ?>
	</caption>
	<thead>
  		<tr>
  			<th class="thId">#</th>
  			<th class="thNom">En images</th>
        	<th class="thNom" style="width : 250px">Nom</th>
        	<th class="thPreparation">Préparation</th>
       	 	<th style="width : 115px">Réglages</th>
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
	            	<td>
	            		<div class="btn-group">
						  	<button type="button" class="btn btn-primary">Actions</button>
						  	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    							<span class="caret"></span>
    							<span class="sr-only">Toggle Dropdown</span>
  							</button>
						  	<ul class="dropdown-menu" role="menu">
						    	<li><?php echo $this->Html->Link(' Edition',
						    										array('controller' => 'recipes', 'action' => 'admin_edit', $v['Recipe']['id']),
						    										array('class' => 'glyphicon glyphicon-pencil')); ?>
						    	</li>
						    	<li><?php echo $this->Html->Link(' Suppression',
													 		array('controller' => 'recipes', 'action' => 'admin_delete', $v['Recipe']['id']),
													 		array('confirm' => 'Etes-vous sûr de vouloir le supprimer ?',
													 				'class' => 'glyphicon glyphicon-remove')); ?></li>
						  	</ul>
						</div>
					</td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>