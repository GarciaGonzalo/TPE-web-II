{include file="head.tpl"}
    {include file="navbar.tpl" logged=$logged seasons=$seasons}
    <div class="container text-center">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Director</th>
                    <th scope="col">Chapter Number</th>
                    <th scope="col">Writer</th>
                    <th scope="col">Description</th>
                    <th scope="col">Emision date</th>
                    <th scope="col">Season Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">{$chapter->title}</td>
                    <td class="align-middle">{$chapter->director}</td>
                    <td class="align-middle">{$chapter->chapter_number}</td>
                    <td class="align-middle">{$chapter->writer}</td>
                    <td class="align-middle">{$chapter->description}</td>
                    <td class="align-middle">{$chapter->emision_date}</td>
                    <td class="align-middle">{$chapter->id_season}</td>

                </tr>
            </tbody>
        </table>
    </div>
    {include file="scripts.tpl"}