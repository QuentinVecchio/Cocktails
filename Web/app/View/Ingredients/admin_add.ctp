<?php $this->set('title_for_layout',"Ajout d'un ingrédient"); ?>
<div class="container">
<?php
    echo $this->Form->create('Ingredient', array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'form'));
?>
    <legend>Données de l'ingrédient</legend> 
    <?php echo $this->Form->input('name', array('placeholder' => 'Nom','input' => array('class' => 'form-control'),
        'required' => false,
        'label' => 'Nom ')); 
    ?>
    <?php 

		$t = array();
		foreach ($listConditions as $key =>$v)
		{
		  $t[$key] = $v['Condition']['name'];
		}

     ?>
    <?php echo $this->Form->input('condition', array('empty' => 'Aucune',
        'required' => false,
        'style' => 'margin-left:50px;',
        'label' => 'Catégorie ',
        'options' => array($t),
        )); 
    ?>
    <?php echo $this->Form->button('Ajouter', array('class' => 'btn btn-success center-block')); ?>
<?php
echo $this->Form->end();
?>
</div>