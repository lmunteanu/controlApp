//arrays

// var myArr = [];
var myArr = [1, -3, 234.2, '238', null, {param1: '1', param2: '2'}, true, ['1','2']];

for (var i = 0; i < myArr.length; i++) {
   //console.log(i, ':: ', myArr[i], ':: ', typeof(myArr[i]));
}

var fArr = myArr.filter(function(element) {
   console.log(element);
   // return typeof element === 'number' || !isNaN(parseInt(element));
   // return !isNaN(parseInt(element));
   return typeof element !== 'object' && !isNaN(parseInt(element));
   
});

console.log(fArr);

var clone1 = myArr.map(function(element) {
   return element;
});

//var myArr2 = myArr; //reference type (daca modificam unu se modifica ambele)

