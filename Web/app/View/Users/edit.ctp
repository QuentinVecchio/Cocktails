<?php $this->set('title_for_layout',"Edition du profil"); ?>
<div class="container">
		  <?php
            echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'form'));
        ?>
        <div id="one">
            <legend>Informations obligatoires</legend>
            <?php echo $this->Form->input('username', array('placeholder' => 'Login','class' => 'form-control',
                    'label' => 'Login :',
                    'required' => true)); 
            ?>
            <?php echo $this->Form->input('email', array('placeholder' => 'E-mail','class' => 'form-control',
                    'label' => 'E-mail : ',
                    'required' => false
                    )); 
            ?>
            <?php echo $this->Form->input('password', array('placeholder' => 'Mot de passe','class' => 'form-control', 'value' => '',
                    'label' => 'Mot de passe : ',
                    'required' => true)); 
            ?>
            <?php echo $this->Form->input('password2', array('placeholder' => 'Confirmation mot de passe','class' => 'form-control',
                    'type' => 'password',
                    'label' => 'Confirmer votre mot de passe : ',
                    'required' => true,
                    'match' => 'User.password')); 
            ?>
            </div>

            <div id="two" style="margin-left: 50px;">
               <legend>Informations personnelles</legend> 
                    <div id="two_one">
                    <div style="margin-top:15px;">
                    <?php echo $this->Form->input('gender', array(
                        'label' => 'Sexe:',
                        'type' => 'radio',
                        'required' => false,
                        'legend' => false,
                        'options' => array('H' => 'Homme', 'F' => 'Femme'), 
                        'style' => 'margin-left: 2%;'
                    ));
                    ?>
                    </div>
                    <?php echo $this->Form->input('lastname', array('placeholder' => 'Nom','class' => 'form-control', 'style' => 'margin-top:-2px;',
                        'required' => false,
                        'label' => 'Nom : ')); 
                    ?>
                    <?php echo $this->Form->input('firstname', array('placeholder' => 'Prénom','class' => 'form-control',
                        'required' => false,
                        'label' => 'Prénom : ')); 
                    ?>
                    <label for="UserBirthdate" style='margin-top:9px;margin-left:2%;'>Date de naissance :</label>
                    <?php echo $this->Form->date('birthdate', array('placeholder' => '--/--/----', 'class' => 'form-control', 'style' => 'margin-left:2%;',
                        'required' => false, 
                        'legend' => false
                        ));
                    ?>
                </div>
                <div id="two_two" style="margin-top:-30px;">
                    <label for="UserPhone" style='margin-top:25px;margin-left:2%;'>Téléphone :</label>
                    <?php echo $this->Form->input('phone', array('placeholder' => 'N° téléphone','class' => 'form-control', 'style' => 'margin-top:-22px;margin-left:1%;',
                        'label' => '',
                        'required' => false,
                        'pattern' => array('text' => '^0[1-9][0-9]{8}$'))); 
                    ?>  
                    <label for="UserStreet" style='margin-top:5px;margin-left:2%;'>Adresse :</label>
                    <?php echo $this->Form->input('street', array('placeholder' => 'N°, Libellé','class' => 'form-control', 'style' => 'margin-top:-25px;margin-left:1%;',
                        'required' => false,
                        'label' => '')); 
                    ?>
                    <div id="town">
                     <?php echo $this->Form->input('town', array('placeholder' => 'Ville','class' => 'form-control', 'style' => 'margin-top:-25px;margin-left:-2%;',
                        'label' => '',
                        'required' => false,
                    )); 
                    ?>  
                    </div>
                    <div id="zipcode">
                    <?php echo $this->Form->input('zipcode', array('placeholder' => 'Code postal','class' => 'form-control','style' => 'margin-top:-25px;width:110px;margin-left:-10px;',
                        'label' => '',
                        'required' => false,
                        'pattern' => array('text' => '^[0-9]{5}$'))); 
                    ?>  
                    </div>           
                    <?php echo $this->Form->input('country', array('placeholder' => 'Pays','class' => 'form-control',  'style' => 'margin-top:-35px;',
                        'required' => false,
                        'label' => '')); 
                    ?>
                </div>
            </div>
            <?php echo $this->Form->button('S\'inscrire', array('class' => 'btn btn-success center-block', 'style' => 'width:1100px;')); ?>
        <?php
            echo $this->Form->end();
        ?>
	</div>