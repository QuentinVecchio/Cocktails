<table class="table table-bordered">
	<caption>
		<h4>Liste des Catégories</h4>
	</caption>
	<thead>
  		<tr>
  			<th class="thId">#</th>
        	<th class="thNom">Nom</th>
       	 	<th class="thPere">Catégorie père</th>
       	 	<th style="width : 115px">Réglages</th>
  		</tr>
	</thead>
   	
   	<tbody>
<?php 
	foreach ($categories as $$categorie): ?>
	          	<tr>
	            	<td><?php echo $categorie['id']; ?></td>
	            	<td><?php echo $categorie['nom']; ?></td>
	            	<td><?php if($categorie['pere'] != null) echo $categorie['pere']['nom']; ?></td>
	            	<td>
	            		<div class="btn-group">
						  	<button type="button" class="btn btn-primary">Actions</button>
						  	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    							<span class="caret"></span>
    							<span class="sr-only">Toggle Dropdown</span>
  							</button>
						  	<ul class="dropdown-menu" role="menu">
						    	<li><?php echo $this->Html->Link(' Edition',
						    										array('controller' => 'categories', 'action' => 'edit', $categorie['id']),
						    										array('class' => 'glyphicon glyphicon-pencil')); ?>
						    	</li>
						    	<li><?php echo $this->Html->Link(' Suppression',
													 		array('controller' => 'categories', 'action' => 'delete', $categorie['id']),
													 		array('confirm' => 'Etes-vous sûr de vouloir le supprimer ?',
													 				'class' => 'glyphicon glyphicon-remove')); ?></li>
						  	</ul>
						</div>
					</td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>