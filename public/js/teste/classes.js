//console.log('clases!');

// var TestClass = function() {
//    this.nume = 'Santa';
//    this.prenume = 'Claus';
//    this.getNume = function() {
//       return this.nume;
//    }
// };


// var TestClass = function() {

//    return {
//       nume: 'Santa',
//       prenume: 'Claus',
//       getNume: function() {
//          return this.nume;
//       }
//    }
// };


var TestClass = function() {
   var nume = 'Santa';
   var prenume = 'Claus';
   var self = this;
   
   console.log("in testclass", this);
   
   function getFullName() {
      return nume + " " + prenume;
   }
   
   return {
      getNume: function() {
         console.log("in prenume", self);
         console.log("in prenume", nume);
         return nume;
      },
      getPrenume: function() {
         return prenume;
      },
      getNumeComplet: function () {
         return getFullName();
      }
   };
};


var t = new TestClass();
//console.log(t);