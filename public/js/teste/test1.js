var a, b;

function test() {
   function innerTest() {
      console.log('inner global a =', a);
      console.log('inner fa =', fa);
   }
   
   var fa = "test";
   console.log("test window a =", a);
   
   innerTest();
   
   return fa;
}

b = test();
a = 2;
console.log('a = ', a);
console.log('b = ', b);