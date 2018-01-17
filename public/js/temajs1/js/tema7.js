/**
 * Created by Munteanu on 28.01.2017.
 Scrieti un obiect javascript StringUtils cu urmatoarele metode:
     - removeCharacter(charToRemove, str) - returneaza un nou string
     Exemplu: StringUtils.removeCharacter(�a�, �adevar�) returneaza �devr�
     - duplicateCharacter(char, str) - returneaza un nou string
     Exemplu: StringUtils.duplicateCharacter(�a�, �adevar�) returneaza �aadevaar�
     - reverse(str) - returneaza un nou string care e str inversat.
     Exemplu: StringUtils.reverse(�adevar�) returneaza �raveda�
     - capitalize(str) - returneaza un nou string
     Exemplu: StringUtils.capitalize(�vom avea testing automat�) returneaza �Vom Avea Testing Automat�

 * */
console.log("######################################################");
console.log("# BEGIN tema 7");

var StringUtils = {
    newStr : "",
    removeCharacter : function (char, str) {
        this.newStr = "";
        for (var i = 0; i < str.length; i++ ) {
            str[i] !== char ? this.newStr += str[i] : "";
        }
        return this.newStr;
    },
    duplicateCharacter : function (char, str) {
        this.newStr = "";
        for (var i = 0; i < str.length; i++ ) {
            str[i] === char ? this.newStr += char + char : this.newStr += str[i];
        }
        return this.newStr;
    },
    reverse : function (str) {
        this.newStr = "";
        for (var i = str.length - 1; i >= 0; i--) {
            this.newStr += str[i];
        }
        return this.newStr;
    },
    capitalize : function (str)  {
        this.newStr = str[0].toUpperCase();
        for (var i = 0; i < str.length; i++ ) {
            this.newStr += str[i-1] === " " ? str[i].toUpperCase() : str[i];
        }
        return this.newStr;
    }
};

console.log(StringUtils.removeCharacter('a','adevar'));
console.log(StringUtils.duplicateCharacter('a', 'adevar'));
console.log(StringUtils.reverse('adevar'));
console.log(StringUtils.capitalize('vom avea testing automat'))

console.log("# END tema 7");
console.log("######################################################");