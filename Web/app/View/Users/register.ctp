	<div class="container">
        <?php
            echo $this->Form->create('Users', array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'form'));
        ?>
			<div id="one">
                <legend>Informations personnelles</legend> 
                <?php echo $this->Form->input('gender', array(
                    'label' => 'Sexe:',
                    'type' => 'radio',
                    'legend' => false,
                    'options' => array('H' => 'Homme ', 'F' => 'Femme ')
                ));
                ?>
                <?php echo $this->Form->input('lastname', array('placeholder' => 'Nom','input' => array('class' => 'form-control'),
                    'lastname' =>'lastname',
                    'label' => 'Nom : ')); 
                ?>
                <?php echo $this->Form->input('firstname', array('placeholder' => 'Prénom','input' => array('class' => 'form-control'),
                    'firstname' =>'firstname',
                    'label' => 'Prénom : ')); 
                ?>
                <?php echo $this->Form->input('birthdate', array('placeholder' => 'JJ/MM/AAAA', 'input' => array('class' => 'form-control'),
                    'label' =>'Date de naissance',
                    'birthdate' =>'birthdate'));
                ?>
                <?php echo $this->Form->input('street', array('placeholder' => 'N°, Libellé','input' => array('class' => 'form-control'),
                    'street' =>'street',
                    'label' => 'Rue : ')); 
                ?>
                <?php echo $this->Form->input('zipcode', array('placeholder' => 'Code postal','input' => array('class' => 'form-control'),
                    'zipcode' =>'zipcode',
                    'label' => 'Code postal : ',
                    'pattern' => array('text' => '^[0-9]{5}$'))); 
                ?>                
                <?php echo $this->Form->input('country', array('placeholder' => 'Pays','input' => array('class' => 'form-control'),
                    'country' =>'country',
                    'label' => 'Pays : ')); 
                ?>
                <?php echo $this->Form->input('phone', array('placeholder' => 'N° téléphone','input' => array('class' => 'form-control'),
                    'phone' =>'phone',
                    'label' => 'N° téléphone : ',
                    'pattern' => array('text' => '^0[1-9][0-9]{8}$'))); 
                ?>  
                <?php echo $this->Form->input('email', array('placeholder' => 'E-mail','input' => array('class' => 'form-control'),
                    'email' =>'email',
                    'label' => 'E-mail : ',
                    'pattern' => array('text' => '^[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$'))); 
                ?>
            </div>
            <div id="two">
                <legend>Informations utiles</legend> 
                <?php echo $this->Form->input('login', array('placeholder' => 'Login','input' => array('class' => 'form-control'),
                    'login' =>'login',
                    'label' => 'Login (définitif) * : ',
                    'required' => true)); 
                ?>
                <?php echo $this->Form->input('password', array('placeholder' => 'Mot de passe','input' => array('class' => 'form-control'),
                    'password' =>'password',
                    'label' => 'Mot de passe * : ',
                    'required' => true)); 
                ?>
                <?php echo $this->Form->input('password2', array('placeholder' => 'Confirmation mot de passe','input' => array('class' => 'form-control'),
                    'type' => 'password',
                    'label' => 'Confirmation mot de passe * : ',
                    'required' => true,
                    'match' => 'User.password')); 
                ?>
                <span style="color:red"> * : Champs obligatoires</span><br>
                <?php echo $this->Form->button('Valider', array('class' => 'btn btn-success', 'style' => 'margin-left: 40%; margin-top:10%;')); ?>
			</div>
        <?php
            echo $this->Form->end();
        ?>
	</div>

