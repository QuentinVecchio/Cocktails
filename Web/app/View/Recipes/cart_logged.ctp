<?php $this->set('title_for_layout',"Votre panier"); ?>
<table class="table table-bordered">
	<caption>
		<h4>Contenu du panier</h4>
		<?php echo $this->Html->Link('Vider le panier', array('controller' => 'recipes', 'action' =>'clean_cart'), array('class' => 'btn btn-primary')) ?>
	</caption>
	<thead>
  		<tr>
  			<th class="thNom">En images</th>
        	<th class="thNom" style="width : 250px">Nom</th>
        	<th class="thPreparation">Préparation</th>
       	 	<th style="width : 115px">Réglages</th>
  		</tr>
	</thead>
   	<tbody>
<?php
	foreach ($listInCart as $r => $v): ?>
	          	<tr>
	          		<td style="width:120px;">
	            		<?php echo $this->Html->image(str_replace(" ","_",$listRecipes[$r]['Recipe']['title']) . '.jpg', array('class' => 'navbar-brand', 'alt' => 'logo', 'style' => 'width:100px;height:100px;margin:auto;')); ?>
	            	</td>
	            	<td><?php echo $listRecipes[$r]['Recipe']['title']; ?></td>
	            	<td><?php echo $listRecipes[$r]['Recipe']['recipe'];; ?></td>
	            	<td>
	            		<div class="btn-group">
						  	<button type="button" class="btn btn-primary">Actions</button>
						  	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    							<span class="caret"></span>
    							<span class="sr-only">Toggle Dropdown</span>
  							</button>
						  	<ul class="dropdown-menu" role="menu">
						  		<li><?php echo $this->Html->Link('  Détails', array('controller' => 'recipes', 'action' =>'view',  $v['Cart']['recipe']), array('class' => 'glyphicon glyphicon-info-sign')) ?></li>
						    	<li><?php echo $this->Html->Link(' Suppression',
													 		array('controller' => 'recipes', 'action' => 'delete_in_cart', $v['Cart']['recipe']),
													 		array('confirm' => 'Etes-vous sûr de vouloir retirer cette recette ?',
													 				'class' => 'glyphicon glyphicon-remove')); ?></li>
						  	</ul>
						</div>
					</td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>