<?php
require_once('./libs/smarty/Smarty.class.php');

class FriendsView
{
    private $smarty;
    function __construct()
    {
     $this->smarty = new Smarty();   
    }
    function RenderHome()
    {
        $this->smarty->display('templates/home.tpl');
    }
    function RenderList($chapters)
    {
        $html = '<!DOCTYPE html>
       <html lang="en">
       
       <head>
           <meta charset="UTF-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <title>Friends Fanpage</title>
       </head>
       
       <body>
           <h1>F.R.I.E.N.D.S fanpage</h1>
           <table>
               <tr>
                   <th>
                       Title
                   </th>
                   <th>Director</th>
                   <th>Writer</th>
                   <th>Description</th>
                   <th>Emision Date</th>
               </tr>';
        foreach ($chapters as $chapter) {
            $html .= '<tr><td>' . $chapter->title . '</td><td>' . $chapter->director . '</td><td>' . $chapter->writer . '</td><td>' . $chapter->description . '</td><td>' . $chapter->emision_date . '</td></tr>';
        }
        echo ($html);
    }
}
