/**
 * Created by Munteanu on 28.01.2017.
 4. Sa se creeze o functie care returneaza un obiect de tipul 'User':
 Proprietati - name - age - email
 Metode
 - getFirstName (returneaza doar prenumele user-ului)
 - isAdult (returneaza true daca are peste 18 ani si false daca are sub 18 ani)
 Functia primeste ca si parametru numele, varsta si email-ul userului si returneaza obiectul generat.
 In continuare sa se creeze un array de astfel de obiecte, folosind functia anterioara.
 Sa se parcurca lista creeata si sa se listeze pentru fiecare obiect numele si daca e adult sau nu,
 folosind metodele declarate pe obiect (getFirstName() si isAdult()).
 **/
console.log("######################################################");
console.log("# BEGIN tema 4");
console.log("# 4. user object + list name and isAdult");
var users = [];

function User(nume, prenume, varsta, email) {
    this.lastName = nume;
    this.firstName = prenume;
    this.age = varsta;
    this.email = email;
    this.getFirstName = function () {
        return this.firstName;
    };
    this.isAdult = function () {
        return this.age > 18;
    };
}

var user1 = new User("Munteanu", "Lucian", 31, "lucianu@gmail.com" );
var user2 = new User("Munteanu", "Cornelia", 30, "cornelia@gmail.com" );
var user3 = new User("Munteanu", "Xenia", 8, "cornelia@gmail.com" );
var user4 = new User("Doe", "John", 17, "johndoe@gmail.com" );

users.push(user1);
users.push(user2);
users.push(user3);
users.push(user4);

for (var i = 0; i < users.length; i++) {
    console.log(users[i].getFirstName(), users[i].isAdult());
}
console.log("# END tema 4");
console.log("######################################################");