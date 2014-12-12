<?php $this->set('title_for_layout',"Nouveau mot de passe"); ?>
<div id="container">
	<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'form')); ?>
        <?php echo $this->Form->input('username', array(
        	'placeholder' => 'Login : ',
            'label' => 'Login : ',
            'required' => true
            )); 
        ?>
        <?php echo $this->Form->input('password', array(
        	'input' => array('class' => 'form-control'),
			'required' => true,
			'placeholder' => 'Nouveau mot de passe',
			'label' => array('text' => 'Mot de passe : '))); 
		?>
        <?php echo $this->Form->input('password2', array(
        	'placeholder' => 'Confirmation mot de passe',
        	'input' => array('class' => 'form-control'),
            'type' => 'password',
            'required' => true,
            'label' => 'Confirmer votre mot de passe : ',
            'match' => 'User.password'));
        ?>
        <?php echo $this->Form->button('Enregistrer', array('class' => 'btn btn-success center-block')); ?>
	<?php echo $this->Form->end(); ?>
</div>