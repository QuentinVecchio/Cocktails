<?php $this->set('title_for_layout',"Edition d'une recette"); ?>
<div class="container">
<?php
    echo $this->Form->create('Recipe', array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'form'));
?>
    <legend>Données de la recette</legend> 
    <?php echo $this->Form->input('title', array('placeholder' => 'Titre','input' => array('class' => 'form-control'),
        'required' => true,
        'label' => 'Titre ')); 
    ?>
    <?php echo $this->Form->input('recipe', array('placeholder' => 'Préparation','input' => array('class' => 'form-control'),
        'required' => true,
        'label' => 'Préparation ')); 
    ?>
    <span style="color:red"> * : Champs obligatoires</span><br>
    <?php echo $this->Form->button('Enregistrer', array('class' => 'btn btn-success center-block')); ?>
<?php
echo $this->Form->end();
?>
</div>