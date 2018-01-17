/**
 * Created by Munteanu on 28.01.2017.
 Sa se scrie o aplicatie care preia JSON-ul, il parcurge si afiseaza informatii din el:
  - media pe fiecare clasa,
  - daca exista vreo clasa cu elevi corijenti; daca da, sa se afiseze o lista cu mediile elevilor
    respectivi si clasele in care se afla; daca nu sunt elevi corijenti, sa se afiseze mesajul:
    "Nu sunt corijenti" pentru clasa respectiva.
 Incercati sa scrieti aplicatia folosind mai multe functii. Sa scrieti cate o functie pentru
 fiecare functionalitate necesara (adica o functie sa stie sa faca de preferabil un singur lucru).
 * */
console.log("######################################################");
console.log("BEGIN tema 6");

var myJson = {
    "nume": "Grigorescu Georgescu",
    "varsta": "24",
    "specializare": "Informatica",
    "clase": [
        {
            "clasa": "8B",
            "medii": ["10", "8", "9", "7", "5", "8", "6", "7", "9", "8", "10"]
        },
        {
            "clasa": "10C",
            "medii": ["7", "6", "9", "8", "10", "8", "5", "5", "4", "7", "6", "8", "4", "9", "10", "8", "7", "7"]
        },
        {
            "clasa": "12A",
            "medii": ["9", "10", "6", "7", "9", "8", "4", "5", "8", "4", "2", "3", "8", "5", "7", "6", "9", "10", "3", "8", "5", "7", "6"]
        }
    ]
};

function SituatiaClaselor() {
    console.log("Situatia claselor:");
    for (var k = 0; k < myJson.clase.length; k++) {
        var mediiSub5 = [];
        console.log("clasa: ", myJson.clase[k].clasa);
        for (var key in myJson.clase[k].medii) {
            if (parseInt(myJson.clase[k].medii[key]) < 5) {
                mediiSub5.push(myJson.clase[k].medii[key]);
            }
        }
        mediiSub5[0] ===  undefined ? console.log("nu sunt corigenti in clasa") : console.log("medii sub 5: ", mediiSub5);
    }
}

SituatiaClaselor();

console.log("END tema 6");
console.log("######################################################");