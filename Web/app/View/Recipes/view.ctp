<div id="presentationRecette">
	<h2><?php echo $recipe['title']; ?></h2>
	<div id="imageRecette">
		<?php echo $this->Html->image(str_replace(" ","_",$recipe['title']) . '.png', array('class' => 'navbar-brand', 'alt' => 'logo', 'style' => 'width:250px;height:80px;margin-top:-10px;')); ?>
	</div>
	<div id="informationRecette">
		<div id="ingredient">
			<?php 
				foreach ($recipe['ingredient'] as $ingredient) 
				{
					echo $ingredient['amount'];
				}
			?>
		</div>

		<div id="preparation">
			<?php echo $recipe['recipe']; ?>
		</div>
	</div>
</div>