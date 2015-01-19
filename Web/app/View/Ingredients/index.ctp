<?php $this->set('title_for_layout',"Liste des ingrédients"); ?>
<table class="table table-striped">
	<caption>
		<h4>Liste des Ingrédients</h4>
	</caption>
	<thead>
  		<tr>
  			<th class="thId">#</th>
        	<th class="thNom">Nom</th>
       	 	<th class="thPere">Catégorie</th>
       	 	<th style="width:200px;">Réglages</th>
  		</tr>
	</thead>
   	
   	<tbody>
<?php 
	foreach ($listIngredients as $ingredient => $v):  ?>
	          	<tr>
	            	<td><?php echo $v['Ingredient']['id']; ?></td>
	            	<td><?php echo $v['Ingredient']['name']; ?></td>
	            	<td>
		            	<?php 
			            	if(empty($v['Conditions'])){
			            		echo "Aucune";
			            	}
			            	if(isset($v['Conditions'][0])){
			            		echo $v['Conditions'][0]['name'];
			            	}
			          		if(isset($v['Conditions'][1])){
			            		echo ', ' . $v['Conditions'][1]['name'];
			            	}
			          		if(isset($v['Conditions'][2])){
			            		echo ', ' . $v['Conditions'][2]['name'];
			            	}
			            	if(isset($v['Conditions'][3])){
			            		echo ', ' . $v['Conditions'][3]['name'];
			            	}
		            	?>
	            	</td>
	            	<td>
	            		<div class="btn-group">
						  	<button type="button" class="btn btn-primary">Actions</button>
						  	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    							<span class="caret"></span>
    							<span class="sr-only">Toggle Dropdown</span>
  							</button>
						  	<ul class="dropdown-menu" role="menu">
						    	
						  	</ul>
						</div>
					</td>
	        	</tr> 
	<?php endforeach; ?>
  	</tbody>
</table>