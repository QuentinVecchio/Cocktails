<?php $this->set('title_for_layout',"Connexion"); ?>
<div id="Userformulaire" class="row">
	<div class="col-md-4 col-md-offset-4">
			<?php 
			echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form'));
			?>
			<fieldset>
				<legend>Connexion</legend>
					<div class="form-group">
					<?php echo $this->Form->input('username', array('placeholder' => 'Identifiant','input' => array('class' => 'form-control'), 'label' => array('text' => 'Identifiant ')));?> 					
					</div>
					<div class="form-group">
					<?php echo $this->Form->input('password', array('placeholder' => 'Mot de passe','input' => array('class' => 'form-control'),'label' => array('text' => 'Mot de passe '))); ?>
					</div>
						<?php echo $this->Form->button('Se connecter', array('class' => 'btn btn-success center-block')); ?>
			</fieldset>
			<?php echo $this->Form->end();?>
			<?php echo $this->Html->Link('Mot de passe oublié ?', array('controller' => 'users', 'action' =>'newpassword'), array('class' => 'btn btn-primary center-block', 'style' => 'margin-top:2%; width:50%')) ?>
	</div>
</div>