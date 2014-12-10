<?php $this->set('title_for_layout',"Ajout d'une recette"); ?>
<div class="container">
<?php
    echo $this->Form->create('Recipe', array('class' => 'form-horizontal', 'role' => 'form', 'name' => 'form'));
?>
                <legend>Recette</legend> 
                    <?php echo $this->Form->input('title', array('placeholder' => 'Titre','input' => array('class' => 'form-control'),
                        'required' => true,
                        'label' => 'Titre ')); 
                    ?>
                    <legend>Préparation</legend>
                        <?php echo $this->Form->input('recipe', array('placeholder' => 'Préparation','input' => array('class' => 'form-control'),
                            'required' => true,
                            'label' => 'Préparation ')); 
                        ?>
                    <legend>Détails</legend>
                <!--<div id="prepa">
                        <?php 
                            $t = array();
                            foreach ($listIng as $key =>$v)
                            {
                              $t[$key] = $v['Ingredient']['name'];
                            }

                         ?>
                         <div style="position:absolute;">
                        <?php 
                            echo $this->Form->input('ingredients', array('empty' => '-- Choisir un ingrédient --',
                            'required' => true,
                            'style' => 'margin-left:50px; position:relative;',
                            'label' => 'Ingrédients ',
                            'options' => array($t),
                            )); 
                        ?>
                        </div>
                        <div style="float:right; margin-right:500px;">
                        <?php echo $this->Form->button('+', array('class' => 'btn btn-primary', 'onclick' => 'NouvelAliment()', 'id' => 'ajoutalim')); ?>
                        <?php echo $this->Form->button('x', array('class' => 'btn btn-primary', 'onclick' => 'SupprimerAliment()', 'id' => 'suppalim')); ?>
                        </div>
                        <?php echo $this->Form->input('amount', array('placeholder' => 'Quantité & Unité','input' => array('class' => 'form-control'),
                            'required' => true,
                            'label' => 'Quantité & Unité')); 
                        ?>
                </div>-->
            <?php echo $this->Form->button('Ajouter la recette', array('class' => 'btn btn-success center-block')); ?>
	<?php 
        echo $this->Form->end(); 
    ?>
	</div>

    <script>
        function NouvelAliment(){
            $( "#prepa").append('<div id="prepa1"><?php $t = array(); foreach ($listIng as $key =>$v){$t[$key] = $v["Ingredient"]["name"];}?><?php echo $this->Form->input("ingredients", array("empty" => "-- Choisir un ingrédient --","required" => true,"style" => "margin-left:50px;","label"=>"Ingrédients","options" => array($t),)); ?><?php echo $this->Form->button("+", array("class" => "btn btn-primary", "onclick" =>"NouvelAliment()", "id" =>"ajoutalim")); ?><?php echo $this->Form->button("x", array("class" => "btn btn-primary", "onclick" =>"SupprimerAliment()", "id" => "suppalim")); ?><?php echo $this->Form->input("amount", array("placeholder" => "Quantité & Unité","input" =>array("class" => "form-control"),"required" => true,"type" => "number","label" => "Quantité & Unité")); ?></div>');
        }
        function SupprimerAliment(){
            $("#prepa1").remove();
        }
        $("#ajoutalim").click(function()
        {
            return false; //Empêche le formulaire d'être soumis
        });
        $("#suppalim").click(function()
        {
            return false; //Empêche le formulaire d'être soumis
        });
    </script>