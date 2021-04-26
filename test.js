function f(x){
    var code=setInterval(function (){
        if(x>0){
            console.log(x);
            x--;
        }else{
            console.log("gl2");
            clearInterval(code);
        }

    },1000,code);
    
}
function fp(){
var x=2;var y=4;
console.log(somme(x,y));
var somme =function (a,b){
    console.log(a+b);};
}
function  f(){
    var x=2;
    var y=4;
    console.log(g(x,y));
    function g(a,b){
        console.log(a+b);
    };
    function g(a,b){
        console.log(a*b);
    }


}
f();

/*var t=[11,4,51,3,31,13,0,1]
//console.log(t.sort());
var x=5;
function f(){
    console.log(x);
    x=7;
    console.log(x);
}


var monObjet={
    section:'GL2',
    groupe:'1',
    "ma passion":'JS'

}
console.log(monObjet.section);
for (p in monObjet){
    console.log(monObjet[p]);
}



*/