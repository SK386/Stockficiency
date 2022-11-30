let cont = 0;
let con = 1;
var name = "Tr";

function addCell(){
    cont += 1;

    if (cont<=4) {

        var TableRow = document.createElement("TR");
        TableRow.setAttribute("id", (name + con));
        document.getElementById("table").appendChild(TableRow);
    
        var TableData = document.createElement("TD");
        //var content = document.createTextNode(data[cont]);
        var content = document.createTextNode(cont);
        TableData.appendChild(content);
        document.getElementById((name + con)).appendChild(TableData);
        
        if ((con%2)==1) {

            document.getElementById((name + con)).style.backgroundColor="gray";
            
        } else{

            document.getElementById((name + con)).style.backgroundColor="white";

        }

    } else {
        
        cont = 0;
        con += 1;
        console.log ((name + con));

    }

}