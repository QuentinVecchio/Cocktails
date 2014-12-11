<?php $this->set('title_for_layout',"Liste des catégories"); ?>
<table class="table table-bordered">
	<caption>
		<h4>Liste des Catégories</h4>
		<?php echo $this->Html->Link('Nouvelle catégorie', array('controller' => 'conditions', 'action' =>'admin_add'), array('class' => 'btn btn-primary')) ?>
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
	            	<td>
	            		<div class="btn-group">
						  	<button type="button" class="btn btn-primary">Actions</button>
						  	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    							<span class="caret"></span>
    							<span class="sr-only">Toggle Dropdown</span>
  							</button>
						  	<ul class="dropdown-menu" role="menu">
						    	<li><?php echo $this->Html->Link(' Edition',
						    										array('controller' => 'conditions', 'action' => 'admin_edit', $v['Condition']['id']),
						    										array('class' => 'glyphicon glyphicon-pencil')); ?>
						    	</li>
						    	<li><?php echo $this->Html->Link(' Suppression',
													 		array('controller' => 'conditions', 'action' => 'admin_delete', $v['Condition']['id']),
													 		array('confirm' => 'Etes-vous sûr de vouloir le supprimer ?',
													 				'class' => 'glyphicon glyphicon-remove')); ?></li>
						  	</ul>
						</div>
					</td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>
