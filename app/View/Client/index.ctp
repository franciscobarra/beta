
<h1>Client Actions</h1>
<p>
Choose your action
<ul>
<li><?php echo $this->Html->link('Mostrar Anuncios', array('controller' => 'client', 'action' => 'request_index')); ?></li>
<li><?php echo $this->Html->link('Añadir Usuarios', array('controller' => 'client', 'action' => 'request_add')); ?></li>
<li><?php echo $this->Html->link('Ver Anuncio con ID 1', array('controller' => 'client', 'action' => 'request_view', 1)); ?></li>
<li><?php echo $this->Html->link('Actualizar Anuncio con ID 2', array('controller' => 'client', 'action' => 'request_edit', 2)); ?></li>
<li><?php echo $this->Html->link('Eliminar Anuncio con ID 3', array('controller' => 'client', 'action' => 'request_delete', 2)); ?></li>
</ul>

</p>

<h1>Client Actions Users</h1>
<p>
Choose your action
<ul>
<li><?php echo $this->Html->link('Login', array('controller' => 'client', 'action' => 'request_login')); ?></li>
<li><?php echo $this->Html->link('Add', array('controller' => 'client', 'action' => 'request_add')); ?></li>
<li><?php echo $this->Html->link('Mostrar Usuarios', array('controller' => 'client', 'action' => 'request_index')); ?></li>
<li><?php echo $this->Html->link('Añadir Usuarios', array('controller' => 'client', 'action' => 'request_addUsers')); ?></li>
<li><?php echo $this->Html->link('Editar Usuarios', array('controller' => 'client', 'action' => 'request_editUsers', 1)); ?></li>
<li><?php echo $this->Html->link('Eliminar Usuarios', array('controller' => 'client', 'action' => 'request_deleteUsers', 2)); ?></li>
</ul>

</p>

