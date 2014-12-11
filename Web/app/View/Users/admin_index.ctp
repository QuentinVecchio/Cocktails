<table class="table table-striped">
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
        	<th class="thVille">Ville</th>
       	 	<th style="width : 115px">Réglages</th>
  		</tr>
	</thead>
   	
   	<tbody>
<?php 
	foreach ($listUser as $user =>$v): ?>
	          	<tr>
	            	<td><?php echo $v['User']['id']; ?></td>
	            	<td><?php echo $v['User']['username']; ?></td>
	            	<td><?php echo $v['User']['lastname']; ?></td>
	            	<td><?php echo $v['User']['firstname']; ?></td>
	            	<td><?php echo $v['User']['email']; ?></td>
	            	<td><?php echo $v['User']['town']; ?></td>
	            	<td>
	            		<div class="btn-group">
						  	<button type="button" class="btn btn-primary">Choix</button>
						  	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    							<span class="caret"></span>
    							<span class="sr-only"></span>
  							</button>
						  	<ul class="dropdown-menu" role="menu">
						    	<li><?php echo $this->Html->Link(' Editer',
						    										array('controller' => 'users', 'action' => 'admin_edit', $v['User']['id']),
						    										array('class' => 'glyphicon glyphicon-pencil')); ?>
						    	</li>
						    	<li><?php echo $this->Html->Link(' Supprimer',
													 		array('controller' => 'users', 'action' => 'admin_delete', $v['User']['id']),
													 		array('confirm' => 'Etes-vous sûr de vouloir supprimer cet utilisateur ?',
													 				'class' => 'glyphicon glyphicon-remove')); ?></li>
						  	</ul>
						</div>
					</td>
	        	</tr>   
<?php endforeach; ?>
  	</tbody>
</table>