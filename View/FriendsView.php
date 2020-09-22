<?php
class FriendsView
{
    function RenderHome(){
        $html='<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Friends Fanpage</title>
        </head>
        
        <body>
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
        
        
        </html>';
        echo($html);
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
