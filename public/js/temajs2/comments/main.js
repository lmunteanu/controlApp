console.log('3 loading list');
var list = [
    {
        'id': '1',
        'user': 'Dennis',
        'date': '2016-06-24 18:33:33',
        'text': 'Lorem ipsum dolor one sit amet, consectetur one more adipiscing elit. Vestibulum ac augue abyss cursus, fermentum more tellus a, rutrum metus.'
    },
    {
        'id': '2',
        'user': 'Angela',
        'date': '2016-06-24 18:15:22',
        'text': 'Vivamus nec justomore sed metus expect condimentummore ullamcorper one nec vitae nisl. Donec more consequat vehicula ipsum non aliquam.'
    },
    {
        'id': '3',
        'user': 'Robert',
        'date': '2016-06-24 17:09:05',
        'text': 'Integer feugiat sapien sit one amet tortor semper expect fringilla eget in ex. Vivamus diam mi, efficitur quis pretium expect accumsan, rhoncus in orci.'
    },
    {
        'id': '4',
        'user': 'Dennis',
        'date': '2016-06-24 12:34:45',
        'text': 'Etiam feugiat nibh id expect commodo dapibus. Mauris dictum abyss ipsum expect one neque, ac efficitur expect ex aliquam non. Etiam id expect sollicitudin urna.'
    },
    {
        'id': '5',
        'user': 'Angela',
        'date': '2016-06-22 15:46:03',
        'text': 'Fusce non sapien sed metus moremore euismod one null nullcondimentum velmore at expect more nulllectus.'
    },
    {
        'id': '6',
        'user': 'Jane',
        'date': '2016-06-22 04:55:59',
        'text': 'Nullam elementum null maurismore more tellus, at one fermentum abyss orci expect consequat quis.'
    },
    {
        'id': '7',
        'user': 'Dennis',
        'date': '2016-05-12 13:33:44',
        'text': 'Curabitur ipsum est, ornare expect eu ullamcorper ut, sodales expect ac urna.'
    },
    {
        'id': '8',
        'user': 'Joe',
        'date': '2016-02-24 10:15:25',
        'text': 'Integer tincidunt nulla ut lacus rutrum porta. Ut consequat ipsum est, id dapibus enim suscipit vel.'
    },
    {
        'id': '9',
        'user': 'Dennis',
        'date': '2015-11-20 11:24:41',
        'text': 'Maecenas lacinia viverra arcu, nullnull tempus one imperdiet leo. Suspendisse one in bibendum abyss mi, a aliquet erat.'
    },
    {
        'id': '10',
        'user': 'Angela',
        'date': '2015-11-02 18:31:32',
        'text': 'Ut congue lobortis abyss auctor. Mauris eu nibh condimentum, rutrum nunc ac, null nullnullultricies ex.'
    },
    {
        'id': '11',
        'user': 'Robert',
        'date': '2015-05-23 17:32:32',
        'text': 'Vivamus tincidunt expect quam sit amet velit expect one fringilla null rutrum. Nulla vitae abyss urna one semper, facilisis leo nec, sodales ipsum.'
    }
];

var obj2 =  {
        'id': '33',
        'user': 'Ronin',
        'date': '2017-01-01 19:33:33',
        'text': 'Corem lipsum donor one sit amet, consectetur one more adipiscing elit. Vestibulum ac augue abyss cursus, fermentum more tellus a, rutrum metus.'
};

console.log('4 using the classes');

/*global CommentList*/
var managedList = new CommentList();  //initializare obiect
managedList.createList(list); //creaza lista

managedList.displayAll(); //afiseaza obiectele
managedList.removeComment(1); //sterge un obiect
managedList.displayAll();
managedList.addComment(obj2); //adauga un comentariu (si un BUG!!!) DAR S-A REZOLVAT
managedList.displayAll(); 
console.log('display 1', managedList.display(1));
console.log('more Recent of: 2016-01-01', managedList.getMoreRecentDate('2016-01-01'));
console.log('ordered by date', managedList.orderByDate());
console.log('filter by name Angela', managedList.filterByName('Angela'));
console.log('filter by year 2016', managedList.filterByYear('2016'));
console.log('filter by name Ronin', managedList.filterByName('Ronin'));