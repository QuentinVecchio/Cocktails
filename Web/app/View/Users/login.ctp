<?php $this->set('title_for_layout',"Connexion"); ?>
<div id="Userformulaire" class="row">
	<div class="col-md-4 col-md-offset-4">
			<?php 
			echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form'));
			?>
				<legend style="color:#333;font-size:21px;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">Connexion</legend>
					<div class="form-group">
					<?php echo $this->Form->input('username', array('placeholder' => 'Identifiant','class' => 'form-control', 'style' => 'width:300px;', 'label' => array('text' => 'Identifiant :')));?> 					
					</div>
					<div class="form-group">
					<?php echo $this->Form->input('password', array('placeholder' => 'Mot de passe','class' => 'form-control', 'style' => 'width:300px;','label' => array('text' => 'Mot de passe :'))); ?>
					</div>
					<div id="btnCo">
						<?php echo $this->Form->button('Se connecter', array('class' => 'btn btn-success center-block','style' => 'margin-left:40px;width:210px;')); ?>
					</div>
			<?php echo $this->Form->end();?>
	</div>
</div>