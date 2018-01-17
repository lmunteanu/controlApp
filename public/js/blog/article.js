//console.log('im in blog\'s article.js');
var articleId = parseInt(document.getElementById('myArticleId').value);
if (articleId) {
    //console.log('my article id is:', articleId);
    /* global ajaxRequest */
    ajaxRequest({
            url: 'index.php',
            data: {
                page: 'ajax',
                action: 'getComments',
                articleId: articleId,
                filter: 'approved'
            }
        },
        populateComments,
        function(message) {
            console.log(message)
        });
}

function populateComments(list) {
   var commentsDiv = document.createElement('div');
   commentsDiv.setAttribute('class','comments-container');
   var title = document.createElement('h3');
   title.innerHTML = 'Comments';
   commentsDiv.appendChild(title);
      
   var singleComment = getSingleCommentHTML();
   
   if (!list.length) {
      return;
   }
   
   for (var i = 0; i < list.length; i++) {
      
      var myCommentHTML = singleComment.cloneNode(true);
      
      myCommentHTML.querySelectorAll('span.user-name')[0].innerHTML = "Name: " + list[i].name;
      myCommentHTML.querySelectorAll('span.posted-on')[0].innerHTML = " Posted on: " + list[i].date_created;
      myCommentHTML.querySelectorAll('div.user-comment-text')[0].innerHTML = list[i].message;
      
      commentsDiv.appendChild(myCommentHTML);
   }
      
    document.getElementsByClassName('comments-list')[0].appendChild(commentsDiv);
   
}



function getSingleCommentHTML() {
    var commentBox = document.createElement('div');
    commentBox.setAttribute('class', 'comment-box');
    var userImg = document.createElement('div');
    userImg.setAttribute('class', 'user-img');
    var userComment = document.createElement('div');
    userComment.setAttribute('class', 'user-comment');
    var userName = document.createElement('span');
    userName.setAttribute('class', 'user-name');
    var postedOn = document.createElement('span');
    postedOn.setAttribute('class', 'posted-on');
    var userCommentText = document.createElement('div');
    userCommentText.setAttribute('class', 'user-comment-text');

    commentBox.appendChild(userImg);
    commentBox.appendChild(userComment);
    userComment.appendChild(userName);
    userComment.appendChild(postedOn);
    userComment.appendChild(userCommentText);
   
    return commentBox;
}
