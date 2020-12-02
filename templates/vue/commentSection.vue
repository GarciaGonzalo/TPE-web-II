{literal}
<div id="commentSection" class=" text-left">
    <ul class="list-group text-dark">
        <li v-if="commentexists" v-for="comment in comments" class="list-group-item">
            <p>{{comment.user}}</p>
            <div class="row">
                <div class="col-7"></div>
                <div class="col-5">{{comment.timestamp}}</div>
            </div>
            <p> {{comment.content}}</p>
            <template v-if="superUser">
                <button v-on:click="fetchDeleteComment(comment.id)" type="button"
                    class="deleteComment btn btn-danger">Delete</button>
            </template>
        </li>
    </ul>
</div>
<form id="commentForm" class="commentForm"> 
    <input class="textField" required type="text" name="comment" id="commentInput" placeholder="your comment here">
    <div class="form-row text-center">
        <button type="submit" class="btn btn-primary mx-auto">Comentar</button>
    </div>
</form>
{/literal}