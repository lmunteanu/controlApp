//console.log('im in admin\'s article.js');
var articleId = parseInt(document.getElementById('myArticleId').value);

if (articleId) {
   // console.log('my article id is:', articleId);
   /* global ajaxRequest */
   ajaxRequest({
         url: 'index.php',
         data: {
            page: 'ajax',
            action: 'getComments',
            articleId: articleId
         }
      },
      populateComments,
      function(message) {
         console.log(message);
      });
}

function setCommentState(commentId, status) {
   ajaxRequest({
         url: 'index.php',
         data: {
            page: 'ajax',
            action: 'changeCommentState',
            commentId: commentId,
            status: status
         }
      },
      changeState,
      function(message) {
         console.log(message);
      });
}

function changeState(comment) {
   var cId = comment.id;
   var status = comment.status;
   var acceptStatus, rejectStatus;
   rejectStatus = status === 'approved' ? 'visible' : 'hidden';
   acceptStatus = status === 'approved' ? 'hidden' : 'visible';
   var comId = "comment-" + cId;

   document.getElementById(comId).innerHTML = "Status: " + status;
   if (status === 'approved' || status === 'rejected') {
      console.log('status is approved will use for loop ', document.getElementsByClassName('acceptButton').length);
      for (var i = 0; i < document.getElementsByClassName('acceptButton').length; i++) {
         if (document.getElementsByClassName('acceptButton')[i].value === cId || document.getElementsByClassName('rejectButton')[i].value === cId) {
            document.getElementsByClassName('acceptButton')[i].style.visibility = acceptStatus;
            document.getElementsByClassName('rejectButton')[i].style.visibility = rejectStatus;
         }
      }
   }
   console.log('changing comment state to ', comment.status);
}

function populateComments(list) {
   var commentsDiv = document.createElement('div');
   commentsDiv.setAttribute('class', 'comments-container');
   var title = document.createElement('h3');
   title.innerHTML = 'Comments';
   commentsDiv.appendChild(title);

   var singleComment = getSingleCommentHTML();

   if (!list.length) {
      return;
   }

   for (var i = 0; i < list.length; i++) {

      var myCommentHTML = singleComment.cloneNode(true);

      myCommentHTML.querySelectorAll('span.author')[0].innerHTML = 'Name: ' + list[i].name;
      myCommentHTML.querySelectorAll('span.posted-on')[0].innerHTML = 'Date: ' + list[i].date_created;
      myCommentHTML.querySelectorAll('div.comment-message')[0].innerHTML = 'Comment: ' + list[i].message;
      myCommentHTML.querySelectorAll('span.comment-status')[0].innerHTML = 'Status: ' + list[i].status;
      myCommentHTML.querySelectorAll('span.comment-status')[0].id = 'comment-' + list[i].id;
      list[i].status === 'approved' ?
         myCommentHTML.querySelectorAll('button.acceptButton')[0].style.visibility = "hidden" :
         myCommentHTML.querySelectorAll('button.acceptButton')[0].style.visibility = "visible";
      list[i].status === 'rejected' ?
         myCommentHTML.querySelectorAll('button.rejectButton')[0].style.visibility = "hidden" :
         myCommentHTML.querySelectorAll('button.rejectButton')[0].style.visibility = "visible";

      myCommentHTML.querySelectorAll('button.acceptButton')[0].value = list[i].id;
      myCommentHTML.querySelectorAll('button.rejectButton')[0].value = list[i].id;
      commentsDiv.appendChild(myCommentHTML);
   }

   document.getElementsByClassName('popin-content')[0].appendChild(commentsDiv);

}

function getSingleCommentHTML() {
   var singleComment = document.createElement('div');
   singleComment.setAttribute('class', 'single-comment');
   var author = document.createElement('span');
   author.setAttribute('class', 'author');
   var postedOn = document.createElement('span');
   postedOn.setAttribute('class', 'posted-on');
   var message = document.createElement('div');
   message.setAttribute('class', 'comment-message');
   var status = document.createElement('span');
   status.setAttribute('class', 'comment-status');
   var acceptButton = document.createElement('button');
   acceptButton.setAttribute('class', 'acceptButton');
   var aB = document.createTextNode("Accept");
   var rejectButton = document.createElement('button');
   rejectButton.setAttribute('class', 'rejectButton');
   var rB = document.createTextNode("Reject");

   singleComment.appendChild(author);
   singleComment.appendChild(postedOn);
   singleComment.appendChild(message);
   singleComment.appendChild(status);
   singleComment.appendChild(acceptButton);
   singleComment.appendChild(rejectButton);
   acceptButton.appendChild(aB);
   rejectButton.appendChild(rB);
   acceptButton.setAttribute('onclick', "manageComment('accept',this);");
   rejectButton.setAttribute('onclick', "manageComment('reject',this);");

   return singleComment;
}
