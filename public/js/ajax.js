var url = 'https://smart-board-munteanulucian.c9users.io/index.php?page=ajax&action=test';

// Instantiem XMLHttpRequest pentru un request AJAX.
var httpRequest = new XMLHttpRequest();

// Ascultam evenimentul care returneaza datele despre request (starea lui si
// raspunsul serverului).
httpRequest.onreadystatechange = function (event) {
    // La readyState = 4 si status = 200 s-a primit raspuns de la server si s-a
    // finalizat request-ul.
    if (this.readyState === 4 && this.status === 200) {
        console.log('Raspuns de la server:', this.response);
        // De la server se primeste un obiect in forma:
        // { success: Boolean, data: Object/String }.
        if (this.response.success) {
            console.log('Totul a fost OK pe server');
            console.log('Datele de la server:', this.response.data);
        } else {
            // Parametrul 'data' din raspuns va putea contine un mesaj de eroare.
            console.log('Au fost ceva probleme:', this.response.data);
        }
    }
};

// Pentru a ne folosi direct de JSON-ul primit de la server, setam responseType
// sa fie chiar 'json'. Aici e recomandar ca raspunsul de la server sa aiba si
// acesta setat header 'Content-Type: application/json. Mai putem folosi
// responseType = 'text', in cazul in care stim ca raspunsul va fi sun simplu
// String. In cazul asta, raspunsul va putea fi accesat din parametrul responseText
// in functia handler pentru onreadystatechange.
httpRequest.responseType = 'json';

// Initiem request-ul cu tipul de care avem nevoie GET/POST si url-ul catre
// script-ul apelat.
httpRequest.open('POST', url);

// Pentru date trimise in POST se seteaza header Content-Type cu valoarea
// 'application/x-www-form-urlencoded'.
httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

// Se face efectiv request-ul. Pentru request GET nu se seteaza nici un parametru,
// dar pentru POST, parametri pe care ii trimitem catre server ii setam in
// functia send().

// GET
//httpRequest.send();

// POST cu parametri simpli. In PHP parametri vor fi accesati cu $_POST['param1']
// si $_POST['param2'].
//httpRequest.send('param1=1&param2=2');

// POST cu parametri sub forma de JSON

httpRequest.send('data=' + JSON.stringify({param1: 1, param2: 2}));

console.log('imediat dupa request');