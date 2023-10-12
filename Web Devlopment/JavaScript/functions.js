function greet(name,greettext="?"){
    let name1=name;
    console.log("Hello",name,greettext);
}
function concat(string1="",string2=""){
    return string1+string2;
}
let name1="Prachet";
let name2="Pratham";
let name3="Prit";
let greettext="Good Morning";
greet(name1,greettext);
greet(name2,greettext);
greet(name3);
let fullname=concat("Prachet ","Patel");
greet(fullname);
fullname=concat();
greet(fullname);