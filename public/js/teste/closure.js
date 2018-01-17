var arr = ['unu', 'doi', 'trei'];

var len = arr.length;



for (var i = 0; i < len; i++) {
   //console.log(i, arr[i]);
   window['myFunction' + (i + 1)] = getValue(arr, i);
}

function getValue(myArr, index) {
   //console.log("getvalue", index);
   var f = function() {
      return myArr[index];
   };
   return f;
}
window.myFunction2();
// function myFunction1() {
//    return arr[0];
// }