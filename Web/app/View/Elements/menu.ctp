<nav class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <?php echo $this->Html->Link('Cocktails', array('controller' => 'cocktails', 'action' =>'index', 'admin' => false), array('class' => 'navbar-brand')) ?>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
    <li class="divider-vertical"></li>
    <li> <?php echo $this->Html->Link('Recettes', array('controller' => 'recettes', 'action' =>'index', 'admin' => false)) ?></li>
    <li class="divider-vertical"></li>
    <li> <?php echo $this->Html->Link('Inscription', array('controller' => 'users', 'action' =>'register', 'admin' => false)) ?></li>
    <li class="divider-vertical"></li>
    <li> <?php echo $this->Html->Link('Création BDD', array('controller' => 'database', 'action' =>'index', 'admin' => false)) ?></li>
    <li class="divider-vertical"></li>
<!--
  </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><?php echo $this->Html->link('', array('controller' => 'users', 'action' => 'logout', 'admin' => false),
                                            array('class' => 'pull-right glyphicon glyphicon-off')) ?></li>
    </ul> 
    </ul>   
-->
  </div>
</nav>