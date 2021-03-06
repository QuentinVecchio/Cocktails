<?php $this->set('title_for_layout',"Edition d'un utilisateur"); ?>
<div class="container">
        <?php
        echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'form'));
        ?>
                <legend>Informations personnelles</legend> 
                <?php echo $this->Form->input('gender', array(
                    'label' => 'Sexe:',
                    'type' => 'radio',
                    'required' => false,
                    'legend' => false,
                    'options' => array('H' => 'Homme', 'F' => 'Femme'), 
                    'style' => 'margin-left: 2%;'
                ));
                ?>
                <?php echo $this->Form->input('lastname', array('placeholder' => 'Nom','input' => array('class' => 'form-control'),
                    'required' => false,
                    'label' => 'Nom : ')); 
                ?>
                <?php echo $this->Form->input('firstname', array('placeholder' => 'Prénom','input' => array('class' => 'form-control'),
                    'required' => false,
                    'label' => 'Prénom : ')); 
                ?>
                <label for="UserBirthdate">Date de naissance :</label>
                <?php echo $this->Form->date('birthdate', array('input' => array('class' => 'form-control'),
                    'required' => false, 
                    'legend' => false
                    ));
                ?>
                <?php echo $this->Form->input('street', array('placeholder' => 'N°, Libellé','input' => array('class' => 'form-control'),
                    'required' => false,
                    'label' => 'Rue : ')); 
                ?>
                <?php echo $this->Form->input('zipcode', array('placeholder' => 'Code postal','input' => array('class' => 'form-control'),
                    'label' => 'Code postal : ',
                    'required' => false,
                    'pattern' => array('text' => '^[0-9]{5}$'))); 
                ?>     
                <?php echo $this->Form->input('town', array('placeholder' => 'Ville','input' => array('class' => 'form-control'),
                    'label' => 'Ville : ',
                    'required' => false,
                )); 
                ?>             
                <?php echo $this->Form->input('country', array('placeholder' => 'Pays','input' => array('class' => 'form-control'),
                    'required' => false,
                    'label' => 'Pays : ')); 
                ?>
                <?php echo $this->Form->input('phone', array('placeholder' => 'N° téléphone','input' => array('class' => 'form-control'),
                    'label' => 'N° téléphone : ',
                    'required' => false,
                    'pattern' => array('text' => '^0[1-9][0-9]{8}$'))); 
                ?>  
                <?php echo $this->Form->input('email', array('placeholder' => 'E-mail','input' => array('class' => 'form-control'),
                    'label' => 'E-mail : ',
                    'required' => false
                    )); 
                ?>
                <?php echo $this->Form->button('Enregistrer les données', array(
                'class' => 'btn btn-success center-block',
                'onClick' =>'(username.required=false)||(role.required=false)'
                )); ?>
        <?php
            echo $this->Form->end();
        ?>
    </div>