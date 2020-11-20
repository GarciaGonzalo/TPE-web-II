{literal}
<div id="commentSection" class=" text-left">
    <ul class="list-group text-dark">
        <li v-for="comment in comments" class="list-group-item">
            <p>{{comment.user}}</p>
            <div class="row">
                <div class="col-7">{{comment.rating}}</div>
                <div class="col-5">{{comment.timestamp}}</div>
            </div>
            <p> {{comment.content}}</p>
        </li>
    </ul>
</div>
<form id="commentForm">
    <input type="text" name="comment" id="commentInput">
    <button type="submit">Comentar</button>
</form>
{/literal}