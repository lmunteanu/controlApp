// Request simplu de GET.
/*global ajaxRequest*/
console.log('running main functions');
ajaxRequest(
    {
       url: 'https://smart-board-munteanulucian.c9users.io/index.php?page=ajax&action=getsumm&a=10&b=20'
    },
    function(data) {
       console.log('data:', data); // Ar trebui sa fie suma parametrilor a si b din request
    },
    function(message) {
       console.log('ERROR:', message);
    }
);

// Urmatorul request ar trebui sa aiba exact acelasi rezultat. Atentie la parametrii
// din obiectul data - ei trebuiesc tranformati in string si adaugati la url:
// '&a=10&b=20'.
ajaxRequest(
    {
        url: 'https://smart-board-munteanulucian.c9users.io/index.php?page=ajax&action=getsumm',
        data: {
            a: 10,
            b: 20
        }
    },
    function(data) {
        console.log('data:', data); // Ar trebui sa fie suma parametrilor a si b din request
    },
    function(message) {
        console.log('ERROR:', message);
    }
);

// Urmatorul request ar trebui sa aiba exact acelasi rezultat. Atentie la parametrii
// din obiectul data - ei trebuiesc tranformati in string si adaugati la url:
// '?page=ajax&action=getsumm&a=10&b=20'.
ajaxRequest(
    {
       url: 'https://smart-board-munteanulucian.c9users.io',
       data: {
            page: 'ajax',
            action: 'getsumm',
            a: 10,
            b: 20
       }
    },
    function(data) {
       console.log('data:', data); // Ar trebui sa fie suma parametrilor a si b din request
    },
    function(message) {
       console.log('ERROR:', message);
    }
);

// Urmatorul request ar trebui sa dea eroare pentru ca apeleaza un script care nu exista.
ajaxRequest(
    {
        url: 'https://smart-board-munteanulucian.c9users.io/lalala.php',
    },
    function(data) {
        console.log('data:', data);
    },
    function(message) {
        console.log('ERROR:', message); // Ar trebui sa afiseze un mesaj de eroare
    }
);

// Request POST
// Login - veti avea nevoie de un fisier login.php care sa aiba hardcodat pentru moment
// utilizatorul cu username 'user1' si parola 'pass1'.
ajaxRequest(
    {
        url: 'https://smart-board-munteanulucian.c9users.io/index.php?page=ajax&action=login',
        type: 'POST',
        data: {
            user: 'user1',
            pass: 'pass1'
        }
    },
    function(data) {
        console.log('data:', data); // Mesaj ca userul e ok.
    },
    function(message) {
        console.log('ERROR:', message);
    }
);

// Tentativa de login cu user gresit
ajaxRequest(
    {
        url: 'https://smart-board-munteanulucian.c9users.io/index.php?page=ajax&action=login',
        type: 'POST',
        data: {
            user: 'user2',
            pass: 'pass2'
        }
    },
    function(data) {
        console.log('data:', data); // Mesaj ca userul NU e ok.
    },
    function(message) {
        console.log('ERROR:', message);
    }
);
