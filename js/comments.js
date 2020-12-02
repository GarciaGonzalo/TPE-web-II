document.addEventListener("DOMContentLoaded", fetchComments(buttonThing));
document.getElementById("commentForm").addEventListener("submit", postComment);

let app = new Vue(
    {
        el: '#commentSection',
        data:
        {
            test: "Vue works",
            comments: [],
            commentexists: false,
            superUser: false,
        },
        methods: {
            fetchDeleteComment: async function (commentId) {
                const res = await fetch("api/comment/" + commentId, {
                    method: "DELETE",
                });
                if (200 < res.status && res.status < 300) { fetchComments(); } else
                    if (res.value = 401) {
                        const arrUrl = window.location.href.split('/');
                        arrUrl.pop();
                        arrUrl.pop();
                        const baseUrl =arrUrl.join('/');
                        window.location.href = baseUrl + "/login";
                    } else {
                        alert("no tienes permisos para lo que intentas hacer")
                    }


            }
        }
    }
);
if (document.getElementById("admin-deck")) {
    app.superUser = true;
}

function postComment(event) {
    event.preventDefault();
    let content = document.getElementById("commentInput").value;
    let rating = document.getElementById("rating").value;
    let chapterId = getChapterId();
    fetchPostComment(content, rating, chapterId);
    document.getElementById("commentInput").value = " ";
    document.getElementById("rating").value = 5;
}

function getChapterId() {
    params = window.location.href.split("/");
    return params[parseInt(params.length) - 1];
}

async function fetchComments() {
    let chapterId = getChapterId();
    const res = await fetch("api/comments/" + chapterId);
    if (res.ok) {
        const comments = await res.json();
        app.comments = comments;
        app.commentexists = true;
    } else { app.commentexists = false; }
}

async function fetchPostComment(content, rating, chapterId) {
    let commentData = {
        content: content,
        id_chapter: chapterId,
    }

    const res = await fetch("api/comment", {
        method: 'POST',
        headers: { "Content-Type": "application/Json" },
        body: JSON.stringify(commentData),
    });

    if (200 < res.status && res.status < 300) {
        fetchComments();
    } else {
        if (res.status == 401) {
            const arrUrl = window.location.href.split('/');
            arrUrl.pop();
            arrUrl.pop();
            const baseUrl =arrUrl.join('/');
            window.location.href = baseUrl + "/login";
        }
    }
}
