var url = 'https://smart-board-munteanulucian.c9users.io/index.php?page=ajax&action=test';
var httpRequest = new XMLHttpRequest();

httpRequest.onreadystatechange = function(event) {
   if (this.readyState === 4 && this.status === 200) {
      console.log(this.response);
      var list = this.response;
      console.log(list[0]);

   }
   
};
httpRequest.responseType = 'json';
//httpRequest.open('GET', url); //default true for asinc! 

httpRequest.open('POST', url); //default true for asinc! 
httpRequest.setRequestHeader('Content-Type', 'application/json');
//httpRequest.send(); //for GET

httpRequest.send('myString=' + JSON.stringify({param1:1,param2:2}));

console.log('imediat dupa req');