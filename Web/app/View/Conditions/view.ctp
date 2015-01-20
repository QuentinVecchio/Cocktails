<?php $this->set('title_for_layout',"Liste des catégories enfant"); ?>
<table class="table table-striped">
	<caption>
		<h4>Liste des catégories enfant de <?php echo $nom; ?></h4>
	</caption>
	<thead>
  		<tr>
        	<th class="thNom">Nom</th>
        	<th>Recettes</th>
  		</tr>
	</thead>
   	
   	<tbody>
<?php
	if($listConditions != null) :
		foreach ($listConditions as $condition => $v):
	?>
		          	<tr>
		            	<td><?php echo $this->Html->Link($v['name'], array('controller' => 'conditions', 'action' =>'view', 
		            											'admin' => false, $v['id'])) ?></td>
		            <td>
		            <?php foreach($listRecipes as $recipes => $v2) : ?>
						<?php echo $v2['title'] .', '; ?>
					<?php endforeach; ?>
					</td>
		        	</tr>
	<?php 
	endforeach;
	endif;
	?>
  	</tbody>
</table>