console.log('this');
document.getElementById('myDiv').addEventListener('click', function() {alert('this');}, true)
document.getElementById('myOtherDiv').addEventListener('click', function() {alert('that');})
