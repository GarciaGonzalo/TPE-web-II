document.addEventListener("DOMContentLoaded", fetchComments());

document.getElementById("commentForm").addEventListener("submit", postComment);

let app = new Vue(
    {
        el: '#commentSection',
        data:
        {
            test: "Vue works",
            comments: [],
        }
    }
);

function postComment(event) {
    event.preventDefault();
    let content = document.getElementById("commentInput").value;
    let rating = 3;
    let chapterId = getChapterId();
    fetchPostComment(content, rating, chapterId);

}

function getChapterId() {
    params = window.location.href.split("/");
    return params[parseInt(params.length) - 1];
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
            const baseUrl = "http://localhost/facu/web%20II/practicos/TPE-web-II";
             window.location.href=baseUrl+"/login";
        }
    }
}

async function fetchComments() {
    let chapterId = getChapterId();
    const res = await fetch("api/comments/" + chapterId);
    const comments = await res.json();
    comments.forEach(comment => {
        app.comments = comments;
    });
}