/**
 * Clasa CommentList - gestioneaza o lista de comentarii.
 */
 console.log('2 loading CommentList');
var CommentList = function() {
    var self = this;
    this.comments = [];
   
    function initList(arr) {
        console.log('initializing list');
        self.comments = arr.map(function(comment) {
           /*global Comment*/
            return new Comment(comment);
        });
    }
   
   // initList(list);
   
    return {
      /**
      * Returneaza lista initializata self.comments.
      * @param {array} lista de obiecte (Comment) ca si array
      * @return {array}
      */
      createList: function(list) {
         initList(list);
         return self.comments;
      },
      /**
      * Returneaza lista self.comments.
      * @return {array}
      */
      displayAll: function() {
        console.log('array length: ', self.comments.length);
        return self.comments;
      },
      /**
      * Adauga un comentariu in lista self.comments.
      * @param {object} comentariul ca si obiect
      */
      addComment: function(obj) { 
         var newObj = new Comment(obj);
         self.comments.push(newObj); 
      },
      removeComment: function(id) { 
         var index = self.comments.findIndex(function (o) {
            return o.getCommentUser() === id.toString();
         });
         console.log('Comment username/id: ', self.comments[index].getUserName(), "/", self.comments[index].getCommentUser(), 'current array length: ', self.comments.length);
         self.comments.splice(index, 1);
         console.log('index: ', index, 'new array length: ', self.comments.length);
         //alternativa la findIndex()
         // for (var i = 0; i < self.comments.length; i++) {
         //     if (self.comments[i].getCommentUser() === id.toString()) {
         //        console.log("removing item ", i);
         //        self.comments.splice(i, 1);
         //        i--; //could do return maibe, id should be uniq
         //     }
         // }
      },
      updateComment: function(obj) {
        var index = self.comments.findIndex(function (o) {
            return o.getCommentUser() === obj.id;
         });
         self.comments[index].setCommentText(obj.text);
      },
      getMoreRecentDate: function(date) {
         var moreRecent = self.comments.filter(function (o) {
            var d1 = new Date(o.getFormattedDate());
            var d2 = new Date(date);
            //console.log(o.getFormattedDate(), ' is ', d1,' and ',d2);
            return d1 > d2;
         });
         //console.log("more recent: ", moreRecent);
         return moreRecent;
      },
      filterByName: function(name) {
        var byName = self.comments.filter(function (o) {
           return o.getUserName().toLowerCase() === name.toLowerCase(); 
        });
        return byName;
      },
      filterByYear: function(year) {
         var byYear = self.comments.filter(function (o) {
            var y1 = new Date(o.getFormattedDate()).getFullYear(),
                y2 = new Date(year).getFullYear();
           return y1 === y2; 
        });
        return byYear;
      },
      orderByDate: function() {
        var byDate = self.comments.sort(function(a,b) {
            var d1 = new Date(a.getFormattedDate());
            var d2 = new Date(b.getFormattedDate());
               if (d1 > d2) {
                  return -1;
               } 
               if (d1 < d2) {
                  return 1;
               }
               return 0;
        });
       // console.log('Ordered by Date: ', byDate);
        return byDate;
      },
      display: function(element) { 
        return {
            userId: self.comments[element].getCommentUser(),
            userName: self.comments[element].getUserName(),
            commentDate: self.comments[element].getCommentDate(),
            commentText: self.comments[element].getCommentText()
         };
        
      }
   };
};