<?php $this->set('title_for_layout',"Recettes associées"); ?>
<table class="table table-bordered">
	<caption>
		<h4>Recettes associées à l'ingrédient <?php echo $nom ?></h4>
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
	foreach ($listRecipes as $r => $v): ?>
	          	<tr>
	          		<td style="width:120px;">
	            				<?php echo $this->Html->image(str_replace(" ","_",$listRecipes[$r]['title']) . '.jpg', array('class' => 'navbar-brand', 'alt' => 'logo', 'onerror' =>  'if (this.src != \'/img/' . str_replace(" ","_",$listRecipes[$r]['title']) . '.jpeg\') this.src = \'/Cocktails/Web/img/logo.png\';', 'style' => 'width:100px;height:100px;margin:auto;')); ?>
	            	</td>
	            	<td><?php echo $listRecipes[$r]['title']; ?></td>
	            	<td><?php echo $listRecipes[$r]['recipe'];; ?></td>
	            	<td>
	            		<div class="btn-group">
						  	<button type="button" class="btn btn-primary">Actions</button>
						  	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    							<span class="caret"></span>
    							<span class="sr-only">Toggle Dropdown</span>
  							</button>
						  	<ul class="dropdown-menu" role="menu">
						  		<li><?php echo $this->Html->Link('  Détails', array('controller' => 'recipes', 'action' =>'view',  $v['Recipe']['id']), array('class' => 'glyphicon glyphicon-info-sign')) ?></li>
						    	<li><?php echo $this->Html->Link('  Panier', array('controller' => 'recipes', 'action' =>'add_in_cart',  $v['Recipe']['id']), array('class' => 'glyphicon glyphicon-shopping-cart')) ?>
						    	</li>
						  	</ul>
						</div>
					</td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>