<?php $this->set('title_for_layout',"Liste des catégories"); ?>
<table class="table table-striped">
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
	foreach ($listConditions as $condition => $v):?>
	          	<tr>
	            	<td><?php echo $v['Condition']['id']; ?></td>
	            	<td><?php echo $v['Condition']['name']; ?></td>
	            	<td><?php 
		            		if(isset($v['Condition'][0])){
	 							echo $v['Condition'][0]['name'];
		            		}
		            		if(isset($v['Condition'][1])){
								echo ', ' . $v['Condition'][1]['name'];
		            		}
		         			if(isset($v['Condition'][2])){
								echo ', ' . $v['Condition'][2]['name'];
		            		}
		            		if(isset($v['Condition'][3])){
								echo ', ' . $v['Condition'][3]['name'];
		            		}
		            		if(!isset($v['Condition'][0])){
								echo "Aucune";
		            		}
	            		?>
	            	</td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>
