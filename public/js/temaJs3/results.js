console.log('in results.js');    
    /* global ajaxRequest */
ajaxRequest({
      url: 'https://randomuser.me/api/?results=3',
   },
   populateResults,
   function(message) {
      console.log(message)
   });

function populateResults(data) {
   var results = data.results;
   console.log('and the results are: ', results);
   
   var resultsDiv = document.getElementById('result-content');
   
   var singleResult = getSingleResultHTML();
   
   if (!results.length) {
      console.log('list length is 0!');
      return;
   }
   
   for (var i = 0; i < results.length; i++) {
      
      var myHTML = singleResult.cloneNode(true);
      
      myHTML.querySelectorAll('h2.name-h2')[0].innerHTML = i+1 + ') ' + results[i].name.first + ' ' + results[i].name.last;
      myHTML.querySelectorAll('a.mailto-href')[0].href = 'mailto:' + results[i].email;
      myHTML.querySelectorAll('a.mailto-href')[0].text = "send email";
      myHTML.querySelectorAll('img.user-img')[0].src = results[i].picture.thumbnail;
    
      resultsDiv.appendChild(myHTML);
   }
   
}

function getSingleResultHTML() {
   var resultBox = document.createElement('div');
   resultBox.setAttribute('class', 'result-box');
   var name = document.createElement('h2');
   name.setAttribute('class', 'name-h2');
   var userImg = document.createElement('img');
   userImg.setAttribute('class', 'user-img');
   var mailTo = document.createElement('a');
   mailTo.setAttribute('class', 'mailto-href');
   
   resultBox.appendChild(name);
   resultBox.appendChild(userImg);
   resultBox.appendChild(mailTo);
   
   return resultBox;
}