{include file="header.tpl"}
<h1>F.R.I.E.N.D.S Season {$season}</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Director</th>
        <th>Writer</th>
        <th>Emision Date</th>
    </tr>

    {foreach from=$chapters item=chapter}
        <tr>
            <td>{$chapter->title}</td>
            <td>{$chapter->director}</td>
            <td>{$chapter->writer}</td>
            <td>{$chapter->emision_date}</td>
        </tr>
    {/foreach}
    </body>

    </html>


