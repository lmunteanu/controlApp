console.log('im here');
var articleId = parseInt(document.getElementById('myArticleId').value);
if (articleId) {
   console.log('my article id is:', articleId);
   /* global ajaxRequest */
   ajaxRequest(
      {
      url: 'index.php',
      data: {
         page: 'ajax',
         action: 'getComments',
         aId: articleId
      }
   },
   populateComments
   ,
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
      
      myCommentHTML.querySelectorAll('span.author')[0].innerHTML = list[i].name;
      myCommentHTML.querySelectorAll('span.posted-on')[0].innerHTML = list[i].date_created;
      myCommentHTML.querySelectorAll('div.comment-message')[0].innerHTML = list[i].message;
      
      commentsDiv.appendChild(myCommentHTML);
   }
      
    document.getElementsByClassName('popin-content')[0].appendChild(commentsDiv);
   
}

function getSingleCommentHTML() {
      var singleComment = document.createElement('div');
      singleComment.setAttribute('class', 'single-comment');
      var author =  document.createElement('span');
      author.setAttribute('class', 'author');
      var postedOn = document.createElement('span');
      postedOn.setAttribute('class', 'posted-on');
      var message = document.createElement('div');
      message.setAttribute('class', 'comment-message');
      singleComment.appendChild(author);
      singleComment.appendChild(postedOn);
      singleComment.appendChild(message);
      
      return singleComment;
}