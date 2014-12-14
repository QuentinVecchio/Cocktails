<?php $this->set('title_for_layout',"Accueil"); ?>
<div>
	<div class="alert alert-success">
		<div style="font-size:3em;font-height:3em;">Découvrez des centaines de recettes de Cocktails !</div>
		Inscrivez-vous pour pouvoir bénéficier de la sauvegarde de vos Cocktails préférés.<br>
		Bonne navigation !
	</div>

	<div id="galerie">
        <div id="im1"><?php echo $this->Html->image('min_Bora_bora.jpeg'); ?></div>
        <div id="im2"><?php echo $this->Html->image('min_Builder.jpeg'); ?></div>
        <div id="im3"><?php echo $this->Html->image('min_Caipirinha.jpeg'); ?></div><br>
        <div id="im4"><?php echo $this->Html->image('min_Cuba_libre.jpeg'); ?></div>
        <div id="im5"><?php echo $this->Html->image('min_Raifortissimo.jpeg'); ?></div>
        <div id="im6"><?php echo $this->Html->image('min_Screwdriver.jpeg'); ?></div>
	</div>

	<div id="conteneurFormulaires" style="margin-left:115px;">
		<div id="formulaireConnexion">
			<?php 
			echo $this->Form->create('User',array('action' => 'login'), array('class' => 'form-horizontal', 'role' => 'form'));
			?>
				<legend>Connexion</legend>
					<div class="form-group">
					<?php echo $this->Form->input('username', array('placeholder' => 'Identifiant','class' => 'form-control', 'style' => 'width:300px;', 'label' => array('text' => 'Identifiant :')));?> 					
					</div>
					<div class="form-group">
					<?php echo $this->Form->input('password', array('placeholder' => 'Mot de passe','class' => 'form-control', 'style' => 'width:300px;','label' => array('text' => 'Mot de passe :'))); ?>
					</div>
					<div id="btnCo">
						<?php echo $this->Form->button('Se connecter', array('class' => 'btn btn-success center-block','style' => 'margin-left:-5px;width:110px;')); ?>
					</div>
					<div id="btnMdp">
						<?php echo $this->Html->Link('Mot de passe oublié ?', array('controller' => 'users', 'action' =>'newpassword'), array('class' => 'btn btn-primary center-block', 'style' => 'width:170px;')) ?>
					</div>
			<?php echo $this->Form->end();?>
		</div>

		<div id="formulaireInscription">
			<?php
            echo $this->Form->create('User',array('action' => 'signup'), array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'form'));
        	?>
				<legend>Inscription</legend>
	            <?php echo $this->Form->input('username', array('placeholder' => 'Login','class' => 'form-control',
	                    'label' => 'Login :',
	                    'required' => true)); 
	            ?>
	            <?php echo $this->Form->input('email', array('placeholder' => 'E-mail','class' => 'form-control',
	                    'label' => 'E-mail : ',
	                    'required' => true
	                    )); 
	            ?>
	            <?php echo $this->Form->input('password', array('placeholder' => 'Mot de passe','class' => 'form-control',
	                    'label' => 'Mot de passe : ',
	                    'required' => true)); 
	            ?>
	            <?php echo $this->Form->input('password2', array('placeholder' => 'Confirmation mot de passe','class' => 'form-control',
	                    'type' => 'password',
	                    'label' => 'Confirmer votre mot de passe : ',
	                    'required' => true,
	                    'match' => 'User.password')); 
	            ?>
	            <?php echo $this->Form->button('S\'inscrire', array('class' => 'btn btn-success center-block', 'style' => 'width:255px;')); ?>
	        <?php
            echo $this->Form->end();
       	 	?>
		</div>
	
	</div>
</div>