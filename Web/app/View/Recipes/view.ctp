<?php $this->set('title_for_layout',$recipe['Recipe']['title']); ?>
<div id="presentationRecette">
	<h2><?php echo $recipe['Recipe']['title']; ?></h2>
	<div id="imageRecette">
		<?php echo $this->Html->image(str_replace(" ","_",$recipe['Recipe']['title']) . '.jpg', array('class' => 'navbar-brand', 'alt' => 'logo', 'style' => 'width:100px;height:100px;margin:auto;')); ?>
	</div>
	<div id="informationRecette">
		<legend>Ingrédients</legend>
		<ul>
			<?php 
				foreach ($recipe['Ingredient'] as $ingredient => $v) 
				{	
					echo "<li>" . $v['IsMadeOf']['amount'];
					if(!isset($ingredients[$ingredient]['Conditions'][0]))
						echo "";
					if(isset($ingredients[$ingredient]['Conditions'][0]))
						echo "<ul><li>" . $ingredients[$ingredient]['Conditions'][0]['name'] . "</li></ul>";
					if(isset($ingredients[$ingredient]['Conditions'][1]))
						echo "<ul><li>" . $ingredients[$ingredient]['Conditions'][1]['name'] . "</li></ul>";
					if(isset($ingredients[$ingredient]['Conditions'][2]))
						echo "<ul><li>" . $ingredients[$ingredient]['Conditions'][2]['name'] . "</li></ul>";
					if(isset($ingredients[$ingredient]['Conditions'][3]))
						echo "<ul><li>" . $ingredients[$ingredient]['Conditions'][3]['name'] . "</li></ul>" .")"."</li>";
				}
			?>
		</ul>
		<legend>Préparation</legend>
			<?php echo $recipe['Recipe']['recipe']; ?>
	</div>
</div>