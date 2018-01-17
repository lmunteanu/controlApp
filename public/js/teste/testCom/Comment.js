/**
 * Clasa Comment - pastreaza datele aferente unui comentariu.
 *
 * @param {Object} commentData  Obiect cu datele initiale ale comentariului.
 * @return {Object}
 */

var Comment = function(commentData) {
    var userId = commentData.userId;
    var text = commentData.text;
    // Se transform data din format string ('Y-m-d h:i:s') venita de pe server
    // in obiect Date din javascript.
    var cDate = new Date(commentData.date);
    var email = commentData.email;
    var website = commentData.website;
    var formattedDate = formatDate(cDate);

    /**
     * Formateaza data venita ca si string din mysql in data care sa fie mai
     * usor de interpretat de catre utilizatori.
     *
     * @param {Date} date   Data venita de la server.
     * @return {string}  Un string de forma 'x minutes ago', 'a week ago',
     *                      'o month ago' etc.
     */
    function formatDate(date) {
        var fd = '';

        // Cod pentru formatarea datei.

        return fd;
    }

    // Metode publice
    return {
        /**
         * Returneaza textul comentariului.
         * @return {string}
         */
        getCommentText: function() {},
        /**
         * Returneaza data reala (cea primita de pe server).
         * @return {string}
         */
        getCommentDate: function() {},
        /**
         * Returneaza ID-ul utilizatorului care a scris comentariul.
         * @return {number}
         */
        getCommentUser: function() {},
        /**
         * Returneaza data formatata.
         * @return {string}
         */
        getFormattedDate: function() {},

        /**
         * Seteaza un nou text pe comentariu.
         * @param {string} Noul text al comentariului.
         */
        setCommentText: function(newText) {},
        /**
         * Seteaza o data noua pentru comentariu.
         * @param {Date} Noua data pentru comentariu.
         */
        setCommentDate: function(newDate) {},
        /**
         * Schimba ID-ul userului.
         * @param {number} ID-ul nou.
         */
        setCommentUser: function(userId) {}
    };
};

console.log("in Comment.js");