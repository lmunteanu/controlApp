/**
 * Created by Munteanu on 28.01.2017.
    1. Sa se scrie o functie care sa creeze un set de 10 functii direct pe obiectul global window,
 folosind un ciclu for pentru a genera toate cele 10 functii. Numele functiilor va fi myFunction_{index},
 unde index este indexul curent din ciclul for (primul index sa fie 1). Functiile, cand se apeleaza, vor
 trebuie sa afiseze in consola indexul la care au fost create.
    Dupa ce se executa functia principala, se vor apela urmatoarele functii create din cod:
 window.myFunction_1();
 window.myFunction_2();
 window['myFunction_6']();
    Rezultatul afisat ar trebui sa fie 1, 2 si 6.
 Hint: Seamana cu exercitiul facut la curs; folositi-va de notiunea de closure.
 **/

console.log("######################################################");
console.log("# BEGIN tema 1");

for (var i = 1; i <= 10; i++) {
    window['myFunction_' + i] = getValue(i);
}

function getValue(index) {
    var f;
    f = function() {
        console.log(index);
    };
    return f;
}

window.myFunction_1();
window.myFunction_2();
window['myFunction_6']();

console.log("# END tema 1");
console.log("######################################################");