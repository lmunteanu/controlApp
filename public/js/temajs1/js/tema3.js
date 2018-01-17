/**
 * Created by Munteanu on 28.01.2017.
 * 3. Se da urmatorul Array: ['1', 23, null, 46.5, '34e2', , false, 'true', , 40].
 * a) Sa se filtreze lista dupa elemente strict de tip numar si sa se afiseze o alta lista cu acestea.
 * b) Sa se imparta la 10 toate elementele (daca e posibil) si sa se genereze un nou array care sa contina
 * tot atatea elemente ca si lista originala (elementele care pot fi impartite pot avea si alt tip decat
 * 'number', iar elementele care nu pot fi impartite isi vor pastra valoarea originala).
 * c) Sa se specifice daca lista contine elemente care nu sunt numerice sau nu pot fi transformate in valori numerice.
 *
 * Pentru fiecare punct al problemei sa se scrie o functie separata.
 *
 * Hint: folositi-va de functiile specializate ale obiectului Array.
 *
 **/
console.log("######################################################");
console.log("# BEGIN tema 3");
var myArr = ['1', 23, null, 46.5, '34e2', , false, 'true', , 40];
console.log("# array-ul de pornire:");
console.log(myArr);

console.log("#");
console.log("# 3.a.Filter only numbers in myArr to fArr");

var fArr = myArr.filter(function(element) {
    return !isNaN(parseFloat(element)) && isFinite(element);
});
console.log(fArr);


console.log("#");
console.log("# 3.b. x/10 where posible");

var divArr = myArr.map(function(element) {
    return element;
});

function isNumber(o) { // removed && o !== null && o !== false
    return ! isNaN (o-0) && o !== "";

}
for (var i = 0; i < myArr.length; i++) {
    if (isNumber(myArr[i])) {
        divArr[i] = myArr[i] / 10 ;
    }
}

console.log(divArr);

console.log("#");
console.log("# 3.c.specificati el !numerice sau nu pot lua valori numerice");

var notNumArr = myArr.map(function(element) {
    return element;
});
for (var i = 0; i < myArr.length; i++) {
    if (!isNumber((myArr[i]))) {
    console.log("arr[", i, "] ", "value : ", myArr[i], "/ type : ", typeof myArr[i]);
    }
}

console.log("# END tema 3");
console.log("######################################################");