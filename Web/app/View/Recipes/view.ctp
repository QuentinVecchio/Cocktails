<div id="presentationRecette">
	<h2><?php echo $recette['title']; ?></h2>
	<div id="imageRecette">
		<?php echo $this->Html->image(str_replace(" ","_",$recette['title']) . '.png', array('class' => 'navbar-brand', 'alt' => 'logo', 'style' => 'width:250px;height:80px;margin-top:-10px;')); ?>
	</div>
	<div id="informationRecette">
		<div id="ingredient">
			<?php 
				foreach ($recette['ingredient'] as $ingredient) 
				{
					echo $ingredient['amount'];
				}
			?>
		</div>

		<div id="preparation">
			<?php echo $recette['recipe']; ?>
		</div>
	</div>
</div>