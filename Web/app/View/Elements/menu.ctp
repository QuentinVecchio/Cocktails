<?php if($this->Session->read('Auth.User.role') == 'admin'): ?>
<nav class="navbar navbar-default" role="navigation" style="height:70px;">
  <a  href=""><?php echo $this->Html->image('logo_final.png', array('class' => 'navbar-brand', 'alt' => 'logo', 'style' => 'width:250px;height:80px;margin-top:-10px;')); ?></a>
  <ul class="nav navbar-nav" style="margin-top:10px;">
    <li><?php echo $this->Html->Link('Recettes', array('controller' => 'recettes', 'action' =>'index', 'admin' => false)) ?></li>
    <li><?php echo $this->Html->Link('Profil', array('controller' => 'users', 'action' =>'profil', 'admin' => false)) ?></li>
    <li><?php echo $this->Html->Link('Utilisateurs', array('controller' => 'users', 'action' =>'index', 'admin' => true)) ?></li>
    <li><?php echo $this->Html->Link('Catégories', array('controller' => 'categories', 'action' =>'index', 'admin' => true)) ?></li>
    <li><?php echo $this->Html->Link('Ingrédients', array('controller' => 'ingredients', 'action' =>'index', 'admin' => true)) ?></li>
    <li><?php echo $this->Html->Link('Création BDD', array('controller' => 'database', 'action' =>'index', 'admin' => false)) ?></li>
    <li style="position:absolute;right:50px;">
      <div class="input-group" style="width:200px; margin-top:8px;">
        <span class="input-group-addon glyphicon glyphicon-search"></span>
        <input type="text" class="form-control" placeholder="Rechercher" style="margin-top:1px;margin-bottom:-1px;">
      </div>
    </li>
    <?php if($this->Session->read() != null):  ?>
    <li style="position:absolute;right:10px;"><?php echo $this->Html->Link('', 
                                                                            array('controller' => 'users', 'action' =>'logout', 'admin' => false),
                                                                             array('class' => 'pull-right glyphicon glyphicon-off')) ?>
    </li>
  <?php else: ?>
    <li style="position:absolute;right:10px;"><?php echo $this->Html->Link('', 
                                                                            array('controller' => 'users', 'action' =>'login', 'admin' => false),
                                                                             array('class' => 'pull-right glyphicon glyphicon-off')) ?>
    </li>
  <?php endif; ?>
  </ul>
</nav>
<?php else: ?>
<nav class="navbar navbar-default" role="navigation" style="height:70px;">
  <a  href=""><?php echo $this->Html->image('logo_final.png', array('class' => 'navbar-brand', 'alt' => 'logo', 'style' => 'width:250px;height:80px;margin-top:-10px;')); ?></a>
  <ul class="nav navbar-nav" style="margin-top:10px;">
    <li><?php echo $this->Html->Link('Recettes', array('controller' => 'recettes', 'action' =>'index', 'admin' => false)) ?></li>
    <li><?php echo $this->Html->Link('Inscription', array('controller' => 'users', 'action' =>'signup', 'admin' => false)) ?></li>
    <li style="position:absolute;right:50px;">
      <div class="input-group" style="width:200px; margin-top:8px;">
        <span class="input-group-addon glyphicon glyphicon-search"></span>
        <input type="text" class="form-control" placeholder="Rechercher" style="margin-top:1px;margin-bottom:-1px;">
      </div>
    </li>
    <?php if($this->Session->read() != null):  ?>
    <li style="position:absolute;right:10px;"><?php echo $this->Html->Link('', 
                                                                            array('controller' => 'users', 'action' =>'logout', 'admin' => false),
                                                                             array('class' => 'pull-right glyphicon glyphicon-off')) ?>
    </li>
  <?php else: ?>
    <li style="position:absolute;right:10px;"><?php echo $this->Html->Link('', 
                                                                            array('controller' => 'users', 'action' =>'login', 'admin' => false),
                                                                             array('class' => 'pull-right glyphicon glyphicon-off')) ?>
    </li>
  <?php endif; ?>
  </ul>
</nav>
<?php endif; ?>