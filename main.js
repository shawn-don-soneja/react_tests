
/*

this js file doesn't seem to be able to access the normal dom elements in the index.html

in other words, the call below, on line 9 (calling an element by ID to turn it's background red) poses an error
because the document.getElement call returns null. it can't find 'testTwo' even though it is clearly in the index.html file

can bypass by passing the body as an arg in the onload???
there must be something else though

*/
//document.getElementById("testTwo").style.background = 'red';


window.onload = function () {
    document.getElementById("testTwo").style.background = 'yellow';
};

function myFunction(arg){
  arg.style.background = 'red';
}
