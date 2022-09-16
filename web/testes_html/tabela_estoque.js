let cont = 0;
let con = 1;
var name = "Tr";

function addCell(){
    cont += 1;

    if (cont<=4) {

        var y = document.createElement("TR");
        y.setAttribute("id", (name + con));
        document.getElementById("table").appendChild(y);
    
        var z = document.createElement("TD");
        var t = document.createTextNode("cell");
        z.appendChild(t);
        document.getElementById((name + con)).appendChild(z);
    
    } else {
        
        cont = 0;
        con += 1;
        console.log ((name + con));

    }

}