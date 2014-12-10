<?php $this->set('title_for_layout',"Votre panier"); ?>
<table class="table table-bordered">
	<caption>
		<h4>Contenu du panier</h4>
		<?php echo $this->Html->Link('Vider le panier', array('controller' => 'recipes', 'action' =>'clean_cart'), array('class' => 'btn btn-primary')) ?>
	</caption>
	<thead>
  		<tr>
        	<th class="thNom" style="width : 250px">Nom</th>
        	<th class="thPreparation">Préparation</th>
       	 	<th style="width : 115px">Réglages</th>
  		</tr>
	</thead>
   	<tbody>
<?php
	foreach ($listInCart['recipe'] as $r => $v): ?>
				<?php if($v == null) continue; ?>
	          	<tr>
	            	<td><?php echo $listRecipes[$r - 1]['Recipe']['title']; ?></td>
	            	<td><?php echo $listRecipes[$r - 1]['Recipe']['recipe'];; ?></td>
	            	<td>
	            		<div class="btn-group">
						  	<button type="button" class="btn btn-primary">Actions</button>
						  	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    							<span class="caret"></span>
    							<span class="sr-only">Toggle Dropdown</span>
  							</button>
						  	<ul class="dropdown-menu" role="menu">
						    	<li><?php echo $this->Html->Link(' Suppression',
													 		array('controller' => 'recipes', 'action' => 'delete_in_cart', $r),
													 		array('confirm' => 'Etes-vous sûr de vouloir retirer cette recette ?',
													 				'class' => 'glyphicon glyphicon-remove')); ?></li>
						  	</ul>
						</div>
					</td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>