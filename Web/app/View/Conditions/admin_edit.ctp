<?php $this->set('title_for_layout',"Edition d'une catégorie"); ?>
<div class="container">
<?php
    echo $this->Form->create('Condition', array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'form'));
?>
    <legend>Données de la catégorie</legend> 
    <?php echo $this->Form->input('name', array('placeholder' => 'Nom','input' => array('class' => 'form-control'),
        'required' => false,
        'label' => 'Nom ')); 
    ?>
    <?php 

		$t = array();
		foreach ($listPere as $key =>$v)
		{
		  $t[$key] = $v['Condition']['name'];
		}

     ?>
    <?php 
        echo $this->Form->input('fathercondition', array('empty' => 'Aucune',
        'required' => false,
        'style' => 'margin-left:50px;',
        'label' => 'Catégorie père',
        'selected' => $selected - 1,
        'options' => array($t),
        )); 
    ?>
    <?php echo $this->Form->button('Enregistrer', array('class' => 'btn btn-success center-block')); ?>
<?php
echo $this->Form->end();
?>
</div>