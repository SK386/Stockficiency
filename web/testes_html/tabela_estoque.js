

var y = document.createElement("TR");
y.setAttribute("id", "myTr");
document.getElementById("table").appendChild(y);

var z = document.createElement("TD");
var t = document.createTextNode("cell");
z.appendChild(t);
document.getElementById("myTr").appendChild(z);
