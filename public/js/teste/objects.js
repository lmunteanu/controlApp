/**
 * Created by Munteanu on 05.02.2017.
 */
var MyBaseClass = function (p1, p2) {
    // Parametri si functii adaugate pe fiecare instanta de MyBaseClass.
    //this.param1 = p1;
    //this.param2 = p2;
    this.param1 = p1 ? p1 : 100;
    this.param2 = p2 ? p2 : 200;

    this.instanceFunction = function () {
        console.log('Functie pe fiecare instanta');
    };
};

// Parametri si functii adaugate pe clasa (obiectul MyBaseClass), care vor fi
// comune tuturor instantelor de MyBaseClass.
MyBaseClass.prototype.testFunction = function () {
    return 'functie globala: ' + this.param1 + this.param2;
};
MyBaseClass.prototype.URL_TO_SITE = 'https://www.mysite.com';

var mbc1 = new MyBaseClass('1', '2');
var mbc2 = new MyBaseClass('3', '4');

// Suprascriere functie testFunction de pe prototip cu o functie locala pe
// obiectul mbc2
mbc2.testFunction = function () {
    return 'Functie locala doar lui mbc2';
};

console.log('here', mbc1.testFunction());
console.log('here to', mbc2.testFunction());

var MyClass = function () {
    this.newParam = 'new';
};

// mc1 va contine parametrul newParam.
var mc1 = new MyClass();

// MyClass va extinde MyBaseClass
MyClass.prototype = new MyBaseClass();

// mc2 va contine parametrul newParam si parametri si functiile "mostenite"
// de pe prototipul obiectului MyClass (adica param1, param2, instanceFunction,
// testFunction si URL_TO_SITE define pe MyBaseClass).
var mc2 = new MyClass();

console.log(mc1.param1, mc2.param1);

// De aici incolo orice instanta de MyClass va mosteni elemente din MyBaseClass.
