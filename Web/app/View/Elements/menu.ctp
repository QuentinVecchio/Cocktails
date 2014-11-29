<nav class="navbar navbar-default" role="navigation" style="height:70px;">
  <a  href=""><img class="navbar-brand" src="{{ asset('css/logo_final.png') }}" alt="logo" style="width:250px;height:188px;margin-top:-50px;"/></a>
  <ul class="nav navbar-nav" style="margin-top:10px;">
    <li><?php echo $this->Html->Link('Recettes', array('controller' => 'recette', 'action' =>'index', 'admin' => false)) ?></li>
    <li><?php echo $this->Html->Link('Profil', array('controller' => 'user', 'action' =>'profil', 'admin' => false)) ?></li>
    <li><?php echo $this->Html->Link('Utilisateurs', array('controller' => 'user', 'action' =>'index', 'admin' => true)) ?>/li>
    <li><?php echo $this->Html->Link('catégories', array('controller' => 'categorie', 'action' =>'index', 'admin' => true)) ?></li>
    <li><?php echo $this->Html->Link('Ingrédients', array('controller' => 'ingredient', 'action' =>'index', 'admin' => true)) ?></li>
    <li> <?php echo $this->Html->Link('Création BDD', array('controller' => 'database', 'action' =>'index', 'admin' => false)) ?></li>
    <li style="position:absolute;right:50px;">
      <div class="input-group" style="width:200px; margin-top:8px;">
        <span class="input-group-addon glyphicon glyphicon-search"></span>
        <input type="text" class="form-control" placeholder="Rechercher" style="margin-top:1px;margin-bottom:-1px;">
      </div>
    </li>
    <li style="position:absolute;right:10px;"><?php echo $this->Html->Link('', 
                                                                            array('controller' => 'user', 'action' =>'logout', 'admin' => false),
                                                                             array('class' => 'pull-right glyphicon glyphicon-off')) ?>
    </li>
  </ul>
</nav>