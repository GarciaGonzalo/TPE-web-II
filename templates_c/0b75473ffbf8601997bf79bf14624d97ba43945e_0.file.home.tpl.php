<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-25 22:21:06
  from 'C:\xampp\htdocs\facu\web II\practicos\TPE-web-II\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6e5132d99117_11841552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b75473ffbf8601997bf79bf14624d97ba43945e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\facu\\web II\\practicos\\TPE-web-II\\templates\\home.tpl',
      1 => 1601064728,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5f6e5132d99117_11841552 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1>F.R.I.E.N.D.S chapters</h1>
            <a href="season/1">season number 1</a>
            <a href="season/2">season number 2</a>
            <a href="season/3">season number 3</a>
            <a href="season/4">season number 4</a>
            <a href="season/5">season number 5</a>
            <a href="season/6">season number 6</a>
            <a href="season/7">season number 7</a>
            <a href="season/8">season number 8</a>
            <a href="season/9">season number 9</a>
            <a href="season/10">season number 10</a>
            <a href="season/all">all seasons</a>

            <form action="New" method="POST">
            <label for="title">title</label>
            <input type="text" name="title_input">
            <br>
            
            <label for="director">director</label>
            <input type="text" name="director_input">
            <br>
            
            <label for="writer">writer</label>
            <input type="text" name="writer_input">
            <br>
            
            <label for="description">description</label>
            <input type="text" name="description_input">
            <br>
            
            <label for="emision_date">emision date</label>
            <input type="date" name="emision_date_input">
            <br>
            
            <label for="season">season</label>
            <input type="number" name="season_input">
            <br>

            <label for="chapter_count">chapter number within its season</label>
            <input type="text" name="chapter_count_input">
            <br>

            <button type="submit">Subir capitulo</button>
        </form>
        </body>
        
        
        </html><?php }
}
