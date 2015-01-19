<?php $this->set('title_for_layout',"Edition d'un ingrédient"); ?>
<div class="container">
<?php
    echo $this->Form->create('Ingredient', array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'form'));
?>
    <legend>Données de l'ingrédient</legend> 
    <?php echo $this->Form->input('name', array('placeholder' => 'Nom','input' => array('class' => 'form-control'),
        'required' => true,
        'label' => 'Nom ')); 
    ?>
    <?php 

		$t = array();
		foreach ($listConditions as $key =>$v)
		{
		  $t[$key] = $v['Condition']['name'];
		}

     ?>
    <?php 
        echo $this->Form->input('condition', array('empty' => 'Aucune',
        'required' => false,
        'style' => 'margin-left:50px;',
        'label' => 'Catégorie ',
        'selected' => $selected - 1,
        'options' => array($t),
        )); 
    ?>
    <span style="color:red"> * : Champs obligatoires</span><br>
    <?php echo $this->Form->button('Enregistrer', array('class' => 'btn btn-success center-block')); ?>
<?php
echo $this->Form->end();
?>
</div>