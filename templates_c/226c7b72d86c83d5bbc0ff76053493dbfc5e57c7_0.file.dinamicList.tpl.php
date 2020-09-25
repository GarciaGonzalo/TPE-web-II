<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 00:16:05
  from 'C:\xampp\htdocs\facu\web II\practicos\TPE-web-II\templates\dinamicList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6e6c253f2761_34831932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '226c7b72d86c83d5bbc0ff76053493dbfc5e57c7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\facu\\web II\\practicos\\TPE-web-II\\templates\\dinamicList.tpl',
      1 => 1601070496,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5f6e6c253f2761_34831932 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1>F.R.I.E.N.D.S Season <?php echo $_smarty_tpl->tpl_vars['season']->value;?>
</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Director</th>
        <th>Writer</th>
        <th>Emision Date</th>
    </tr>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['chapters']->value, 'chapter');
$_smarty_tpl->tpl_vars['chapter']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['chapter']->value) {
$_smarty_tpl->tpl_vars['chapter']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['chapter']->value->title;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['chapter']->value->director;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['chapter']->value->writer;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['chapter']->value->emision_date;?>
</td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </body>

    </html>


<?php }
}
