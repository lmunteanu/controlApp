/**
 * Clasa CommentList - gestioneaza o lista de comentarii.
 */

var CommentList = function(list) {
    var self = this;
    this.comments = [];

    function initList(arr) {
        self.comments = arr.map(function(comment) {
            return new Comment(comment);
        });
    }

    initList(list);

    return {
        createList: function(list) {
            initList(list);
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

console.log("in CommentList.js");