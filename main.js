function changeMe(){
  var teste = document.getElementById("testMe");
  teste.style.color = 'red';
}

var tester = document.getElementById("testMe");
tester.onClick = function(){changeMe()};

//document.getElementById("demo").addEventListener("click", myFunction);
