<table class="table table-bordered">
	<caption>
		<h4>Liste des Utilisateurs</h4>
	</caption>
	<thead>
  		<tr>
  			<th class="thId">#</th>
        	<th class="thLogin">Login</th>
        	<th class="thNom">Nom</th>
        	<th class="thPrenom">Prénom</th>
        	<th class="thMail">Mail</th>
       	 	<th style="width : 115px">Réglages</th>
  		</tr>
	</thead>
   	
   	<tbody>
<?php 
	foreach ($listUser as $user): ?>
	          	<tr>
	            	<td><?php echo $user['id']; ?></td>
	            	<td><?php echo $user['login']; ?></td>
	            	<td><?php echo $user['firstname']; ?></td>
	            	<td><?php echo $user['lastname']; ?></td>
	            	<td><?php echo $user['mail']; ?></td>
	            	<td>
	            		<div class="btn-group">
						  	<button type="button" class="btn btn-primary">Actions</button>
						  	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    							<span class="caret"></span>
    							<span class="sr-only">Toggle Dropdown</span>
  							</button>
						  	<ul class="dropdown-menu" role="menu">
						    	<li><?php echo $this->Html->Link(' Edition',
						    										array('controller' => 'users', 'action' => 'edit', $user['id']),
						    										array('class' => 'glyphicon glyphicon-pencil')); ?>
						    	</li>
						    	<li><?php echo $this->Html->Link(' Suppression',
													 		array('controller' => 'users', 'action' => 'delete', $user['id']),
													 		array('confirm' => 'Etes-vous sûr de vouloir le supprimer ?',
													 				'class' => 'glyphicon glyphicon-remove')); ?></li>
						  	</ul>
						</div>
					</td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>