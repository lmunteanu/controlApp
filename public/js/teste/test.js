//objects

var myObj = {
   param: {
      param1: ['1'],
      param2: 'doi'
   },
   metoda: function() {
      console.log('aaa');
   },
   metoda2: function cva() {
      console.log(this);
   },
   metoda3: function cvb() {
      console.log(this.param);
      var self = this;
      setTimeout(function() {
         console.log(self.param);
         }, 1000)
   },
   metoda4: function cvc() {
      console.log(this.param);
      var self = this;
      setTimeout((function() {
         console.log(self.param);
         }).bind(this), 1000)
   }
}

myObj.paramNou = 'aaaa';

//delete myObj.paramNou;

myObj.paramNou = undefined;
var p1 = {p1:1, p2:2};
var p2 = JSON.parse(JSON.stringify(p1));
var p3 = Object.assign({}, myObj);

function Person(n, p) {
  // return 'Nume prenume';
  return {
     nume: n,
     prenume: p
  }
};
var p = new Person('icsulescu', 'Stefan');
//console.log(myObj);