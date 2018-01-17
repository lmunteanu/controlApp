/**
 * Created by Munteanu on 28.01.2017.
 * 2. Sa se scrie o functie care adauga un punct dupa fiecare vocala dintr-un string.
 * In caz ca intalneste vocala 'o', pune un punct in plus. Deci string-ul "palma de
 * mallorca" ar trebui sa returneze "pa.lma. de. ma.llo..rca.".
 **/
/**
 *  if ("aeiou".indexOf(myStr[i]) >= 0)
 *  alternativa la regexp
* */
console.log("######################################################");
console.log("# BEGIN tema 2");
var myStr = "Palma de mallorca";
var newStr = "";

var regexp1 = /[aeiu]/;
var regexp2 = /[o]/;

function addDots() {
    newStr = "";
    for (var i = 0; i < myStr.length; i++ ) {
        if (myStr[i].toLowerCase().match(regexp1)) newStr += myStr[i] + ".";
        else if (myStr[i].toLowerCase().match(regexp2)) newStr += myStr[i] + "..";
        else newStr += myStr[i];
    }
}

function addDots2() {
    newStr = "";
    for (var i = 0; i < myStr.length; i++ ) {
        var cond1 = myStr[i].toLowerCase().match(regexp1);
        var cond2 = myStr[i].toLowerCase().match(regexp2);
        newStr += cond1 ? myStr[i] + "." : cond2 ? myStr[i] + ".." : myStr[i];
    }
}


function addDots3() {
    newStr = "";
    for (var i = 0; i < myStr.length; i++ ) {
        switch(myStr[i]) {
            case "a":
            case "e":
            case "i":
            case "u":
                newStr += myStr[i] + ".";
                break;
            case "o":
                newStr += myStr[i] + "..";
                break;
            default:
                newStr += myStr[i];
        }
    }
}


//addDots();
//console.log(newStr);
addDots3();
console.log(newStr);

console.log("# END tema 2");
console.log("######################################################");