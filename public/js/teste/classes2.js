// Simulare de clasa cu parametri si metode publice si private.
var TestClass = function() {
    // Parametri si metode private - nu sunt accesibile in exterior.
    var nume = 'Santa';
    var prenume = 'Claus';
    var self = this;
   
    console.log(this);
   
    function getFullName() {
        return nume + ' ' + prenume;
    }
   
    return {
        // Parametri si metode publice - ele in schimb pot accesa parametri
        // si metodele private, fiind definite in scopul parinte (closure).
        getNume: function() {
            // Obiectul this in functia asta se refera la obiectul care se
            // returneaza si nu la obiectul this din functia parinte. Se foloseste
            // constructia cu self = this, de mai sus, pt a putea accesa obiectul
            // parinte.
            console.log(self);
            console.log(nume);
            return nume;
        },
        getPrenume: function() {
            return prenume;
        },
        getNumeComplet: function() {
            return getFullName();
        }
    };
};
 
var t = new TestClass();