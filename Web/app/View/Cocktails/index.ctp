<div>
	<div class="alert alert-success">
		<div style="font-size:3em;font-height:3em;">Découvrez des centaines de recettes de Cocktails !</div>
		Inscrivez-vous pour pouvoir bénéficier de la sauvegarde de vos Cocktails préférés.<br>
		Bonne navigation !
	</div>

	<div id="galerie">
        <div id="im1"><img src="/img/min_Bora_bora.jpeg" alt="Image 2" /></div>
        <div id="im2"><img src="/img/min_Builder.jpeg" alt="Image 3" /></div>
        <div id="im3"><img src="/img/min_Caipirinha.jpeg" alt="Image 4" /></div><br>
        <div id="im4"><img src="/img/min_Cuba_libre.jpeg" alt="Image 2" /></div>
        <div id="im5"><img src="/img/min_Raifortissimo.jpeg" alt="Image 3" /></div>
        <div id="im6"><img src="/img/min_Screwdriver.jpeg" alt="Image 4" /></div>
	</div>

	<div id="conteneurFormulaires" style="margin-left:140px;">
		<div id="formulaireConnexion">
			<?php 
			echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form'));
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
            echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'form'));
        	?>
				<legend>Inscription</legend>
	            <?php echo $this->Form->input('username', array('placeholder' => 'Login','class' => 'form-control',
	                    'label' => 'Login :',
	                    'required' => true)); 
	            ?>
	            <?php echo $this->Form->input('email', array('placeholder' => 'E-mail','class' => 'form-control',
	                    'label' => 'E-mail : ',
	                    'required' => false
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