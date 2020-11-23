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
            <template v-if="superUser"><button :data-id="comment.id" type="button" class="deleteComment btn btn-danger">Delete</button></template>
        </li>
    </ul>
</div>
<form id="commentForm">
    <input required type="text" name="comment" id="commentInput">
    <label for="rating">rating</label>
    <select id="rating" name="rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <button type="submit">Comentar</button>
</form>
{/literal}