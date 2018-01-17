/**
 * Created by Munteanu on 28.01.2017.
 * a) Sa se ordoneze lista in ordine alfabetica dupa numele (firstName) fiecarei persoane.
 * b) Sa se ordoneze lista dupa varsta fiecarei persoane si sa se grupeze in functie de specialitatea ei.
 * c) Sa se creeze o alta lista cu numele complet al persoanelor (lastName si firstName) si specializarea
 *    lor (ex: 'Laura Maccabee - tech-support'). Sa se ordoneze lista alfabetic.
 * d) Sa se genereze o lista de functii pentru fiecare persoana, care daca sunt apelate vor returna un
 *    obiect cu datele persoanei asociate. Sa se apeleze pe rand toate functiile din lista de functii si
 *    sa se afiseze obiectul returnat. Obiectul returnat sa fie in formatul:
 * */
console.log("######################################################");
console.log("# BEGIN tema 5");
console.log("# added order as object property (just for easy spotting object nr from original array)");

var personsList = [
    {
        firstName: 'Addison',
        lastName: 'Jane',
        age: 25,
        order: 1,
        specialization: 'engineer'
    },
    {
        firstName: 'Kenley',
        lastName: 'Michael',
        age: 21,
        order: 2,
        specialization: 'tech-support'
    },
    {
        firstName: 'Richards',
        lastName: 'James',
        age: 31,
        order: 3,
        specialization: 'copyrighter'
    },
    {
        firstName: 'Daley',
        lastName: 'Jennifer',
        age: 29,
        order: 4,
        specialization: 'engineer'
    },
    {
        firstName: 'Vaughn',
        lastName: 'Dalton',
        age: 25,
        order: 5,
        specialization: 'designer'
    },
    {
        firstName: 'Jacobs',
        lastName: 'Richard',
        age: 35,
        order: 6,
        specialization: 'engineer'
    },
    {
        firstName: 'Gannon',
        lastName: 'John',
        age: 28,
        order: 7,
        specialization: 'marketing'
    },
    {
        firstName: 'Landry',
        lastName: 'Leslie',
        age: 24,
        order: 8,
        specialization: 'designer'
    },
    {
        firstName: 'Maccabee',
        lastName: 'Laura',
        age: 27,
        order: 9,
        specialization: 'tech-support'
    },
    {
        firstName: 'Caldwell',
        lastName: 'Michele',
        age: 30,
        order: 10,
        specialization: 'engineer'
    }
];
/** Begin 5 a) **/
function listObjArray(){
    for (i = 0; i < personsList.length; i++) {
        console.log(personsList[i]);
    }
}
function compareByFirstName(a, b) {
    var aName = a.firstName.toLowerCase(), bName = b.firstName.toLowerCase();
    return aName < bName ? -1 : aName > bName ? 1 : 0;
}
personsList.sort(compareByFirstName);
console.log("#");
console.log("# a) Sorted by FirstName:");
listObjArray();

/** Begin 5 b) **/
function compareByAgeAndSpec(a, b) {
    var aAge = a.age,
        bAge = b.age,
        aSpec = a.specialization,
        bSpec = b.specialization;

    if (aSpec < bSpec) {
        return -1;
    }
    if (aSpec > bSpec) {
        return 1;
    }
    if (aAge < bAge) {
        return -1;
    }
    if (aAge > bAge) {
        return 1;
    }
    return 0;
}
personsList.sort(compareByAgeAndSpec);
console.log("#");
console.log("# b) Sorted by Age and Specialization:");
listObjArray();

/** Begin 5 c) **/
function copyNameAndSpec(obj) {
    var copyObj = {};
    copyObj.name = obj.firstName + " " + obj.lastName ;
    copyObj.specialization = obj.specialization;
    return copyObj;
}
function sortNewArr(a, b) {
    var aName = a.name.toLowerCase(), bName = b.name.toLowerCase();
    return aName < bName ? -1 : aName > bName ? 1 : 0;
}
var newArr = personsList.map(copyNameAndSpec).sort(sortNewArr);
console.log("# c) new list with full name and spec sorted:");
console.log("#");
for (i = 0; i < newArr.length; i++) {
    console.log(newArr[i]);
}
/** Begin 5 d) **/

var myFunctionList = [];
for (var i = 0; i <= 10; i++) {
    var currentFunction = function getValue(index) {
        var f;
        f = function () {
            return {
                name: personsList[index].firstName + " " + personsList[index].lastName,
                age: personsList[index].age,
                specialization: personsList[index].specialization
            }
        };
        return f;
    };
    myFunctionList.push(currentFunction(i));
}
console.log("#");
console.log("# d) listing myFuncList 0 to 10:");

for (i = 0; i < myFunctionList.length - 1; i++) {
    console.log(myFunctionList[i]());
}

console.log("# END tema 5");
console.log("######################################################");