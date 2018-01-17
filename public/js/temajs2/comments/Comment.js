/**
 * Clasa Comment - pastreaza datele aferente unui comentariu.
 *
 * @param {Object} commentData  Obiect cu datele initiale ale comentariului.
 * @return {Object}
 */
console.log('1 loading Comments');
var Comment = function(commentData) {
   console.log("in Comment.js");
    var userId = commentData.id;
    var user = commentData.user;
    // Se transform data din format string ('Y-m-d h:i:s') venita de pe server
    // in obiect Date din javascript.
    var cDate = new Date(commentData.date);
    var formattedDate = formatDate(cDate);
    var text = commentData.text;

    /**
     * Formateaza data venita ca si string din mysql in data care sa fie mai
     * usor de interpretat de catre utilizatori.
     *
     * @param {Date} date   Data venita de la server.
     * @return {string}  Un string de forma 'x minutes ago', 'a week ago',
     *                      'o month ago' etc.
     */
    function formatDate(date) {
        var seconds = Math.floor((new Date() - date) / 1000);

        var interval = Math.floor(seconds / 31536000);

        if (interval > 1) {
            return interval + " years ago";
        }
        interval = Math.floor(seconds / 2592000);
        if (interval > 1) {
            return interval + " months ago";
        }
        interval = Math.floor(seconds / 86400);
        if (interval > 1) {
            return interval + " days ago";
        }
        interval = Math.floor(seconds / 3600);
        if (interval > 1) {
            return interval + " hours ago";
        }
        interval = Math.floor(seconds / 60);
        if (interval > 1) {
            return interval + " minutes ago";
        }
        return Math.floor(seconds) + " seconds ago";
    }
    // Metode publice
    return {
        /**
         * Returneaza ID-ul utilizatorului care a scris comentariul.
         * @return {number}
         */
        getCommentUser: function() { return userId; },
        /**
         * Returneaza Numele utilizatorului care a scris comentariul.
         * @return {string}
         */
        getUserName: function() { return user; },
        /**
         * Returneaza data reala (cea primita de pe server).
         * @return {string}
         */
        getCommentDate: function() { return formattedDate; },
        /**
         * Returneaza data formatata.
         * @return {string}
         */
        getFormattedDate: function() { return cDate.toString(); },
        /**
         * Returneaza textul comentariului.
         * @return {string}
         */
        getCommentText: function() { return text; },
        /**
         * Schimba ID-ul userului.
         * @param {number} ID-ul nou.
         */
        setCommentUser: function(uId) { userId = uId; },
        /**
         * Schimba Numele userului.
         * @param {string} Numele nou.
         */
        setUserName: function(userName) { user = userName; },
        /**
         * Seteaza o data noua pentru comentariu.
         * @param {Date} Noua data pentru comentariu.
         */
        setCommentDate: function(newDate) { cDate = newDate;},
        /**
         * Seteaza un nou text pe comentariu.
         * @param {string} Noul text al comentariului.
         */
        setCommentText: function(newText) { text = newText; }
    };
};