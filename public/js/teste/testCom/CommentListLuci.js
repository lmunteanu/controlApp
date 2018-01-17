var CommentList = function(list) {
   var self = this;
   this.comments = [];
   
   function init(arr) {
      this.comments = arr.map(function(comment) {
         return new Comments(comment);
      });
   }
   
   init(list);
   
   return {
      createList : function(list) {
         return self.comments;
      },
      addComment: function(obj) {},
      removeComment: function(id) {},
      updateComment: function(obj) {},
      filter: function(obj) {},
      order: function(obj) {},
      display: function(element) {}
   };
};

