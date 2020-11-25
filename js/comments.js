document.addEventListener("DOMContentLoaded", fetchComments(buttonThing));
document.getElementById("commentForm").addEventListener("submit", postComment);

let app = new Vue(
    {
        el: '#commentSection',
        data:
        {
            test: "Vue works",
            comments: [],
            superUser: false,
        },
        methods: {
            fetchDeleteComment: async function (commentId) {
                const res = await fetch("api/comment/" + commentId, {
                    method: "DELETE",
                });
                if (200 < res.status && res.status < 300) { fetchComments; } else
                    if (res.value = 401) {
                        const baseUrl = "http://localhost/facu/web%20II/practicos/TPE-web-II"; //hay que dinamizar esto
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
    console.log(rating);
    let chapterId = getChapterId();
    fetchPostComment(content, rating, chapterId);

}

function getChapterId() {
    params = window.location.href.split("/");
    return params[parseInt(params.length) - 1];
}

function buttonThing() {
    let deleteButtons = document.getElementsByClassName("deleteComment");
    if (deleteButtons.length > 0) {
        deleteButtons.forEach(button => {
            button.addEventListener("click", fetchDeleteComment(this.dataset.id));
            console.log("llegaste, varias veces");
            console.log(button.dataset.id);
        });
    }
}

async function fetchComments() {
    let chapterId = getChapterId();
    const res = await fetch("api/comments/" + chapterId);
    const comments = await res.json();
    app.comments = comments;
}
async function fetchPostComment(content, rating, chapterId) {
    let commentData = {
        content: content,
        rating: rating,
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
            const baseUrl = "http://localhost/facu/web%20II/practicos/TPE-web-II"; //hay que dinamizar esto
            window.location.href = baseUrl + "/login";
        }
    }
}
