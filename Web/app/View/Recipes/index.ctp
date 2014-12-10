<?php $this->set('title_for_layout',"Liste des recettes"); ?>
<table class="table table-striped">
	<caption>
		<h4>Liste des Recettes</h4>
	</caption>
	<thead>
  		<tr>
  			<th class="thNom">En images</th>
        	<th class="thNom" style="width : 250px">Nom</th>
        	<th style="width : 115px">Au panier</th>
  		</tr>
	</thead>
   	<tbody>
<?php 
	foreach ($listRecipes as $recipe => $v): ?>
	          	<tr>
	            	<td style="width:120px;"><?php echo $this->Html->image(str_replace(" ","_",$v['title']) . '.jpeg', array('class' => 'navbar-brand', 'alt' => 'logo', 'style' => 'width:250px;height:80px;margin-top:-10px;')); ?></td>
	            	<td><div style="margin-top:35px;"><?php echo $this->Html->Link($v['Recipe']['title'], array('controller' => 'recipes', 'action' =>'view',  $v['Recipe']['id']), array('class' => 'btn btn-primary center-block glyphicon glyphicon-plus')) ?></div></td>
	            	<td><?php echo $this->Html->Link('', array('controller' => 'recipes', 'action' =>'add_in_cart',  $v['Recipe']['id']), array('class' => 'btn btn-primary center-block glyphicon glyphicon-plus')) ?></td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>