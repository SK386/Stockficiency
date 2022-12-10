
window.addEventListener('load', loaded);


function loaded(){


    document.getElementById('gastos').addEventListener('blur', leave);
    document.getElementById('ganhos').addEventListener('blur', leave);
    document.getElementById('periodo').addEventListener('blur', leave);
    
    

}

function pre_modificar(id){
    console.log(id);
    document.getElementById("salvar").style.display = 'none';
    
    //var _id = document.getElementById(id+"-id").innerHTML;
    
    var Reg_id = document.getElementById("id");

    var Reg_per = document.getElementById("periodo");
    var Reg_gan = document.getElementById("ganhos");
    var Reg_gas = document.getElementById("gastos");

    var Table_per = document.getElementById(id+"-periodo");
    var Table_gan = document.getElementById(id+"-ganhos");
    var Table_gas = document.getElementById(id+"-gastos");
    
    //Reg_id.value = _id;
    Reg_per.value = Table_per.innerHTML;
    Reg_gan.value = Table_gan.innerHTML.replace('/','-').replace('/','-');
    Reg_gas.value = Table_gas.innerHTML.replace('/','-').replace('/','-');
    
	document.getElementById("modificar").setAttribute('onClick','modificar()' );
	document.getElementById("deletar").setAttribute('onClick','deletar()' );
	document.getElementById("deletar").style.display = "block";
	document.getElementById("modificar").style.display = "block";


	document.getElementById('periodo').offsetParent.className += ' ativo';
    document.getElementById('ganhos').offsetParent.className += ' ativo';
    document.getElementById('gastos').offsetParent.className += ' ativo';

}

function modificar(){        
    
            document.getElementById("register-form").action = "php_arquivos/financas/alterarFinanca.php";
            document.getElementById("submit-mod").click();
            
}



function deletar(){
    document.getElementById("register-form").action = "php_arquivos/financas/deletarFinanca.php";
	document.getElementById("submit-del").click();
}

function normal(){
	    document.getElementById("deletar").style.display = 'none';
	    document.getElementById("modificar").style.display = 'none';
	    document.getElementById("salvar").style.display = "block";

    document.getElementById("id").value = '' ;
    document.getElementById("periodo").value = '' ;
    document.getElementById("ganhos").value = '' ;
    document.getElementById("gastos").value = '' ;
    
    
        document.getElementById('periodo').offsetParent.className = 'box';
        document.getElementById('ganhos').offsetParent.className = 'box';
        document.getElementById('gastos').offsetParent.className = 'box';
        
    document.getElementById("random").click();
}

function adicionar(){

        document.getElementById("register-form").action = "php_arquivos/financas/cadastrarFinanca.php";
        document.getElementById("submit-add").click();
        
}

function leave(){
    if(this.value != ''){
        this.offsetParent.className += " ativo";
    }else{
        this.offsetParent.className = 'box';
    }
}

function refresh(){
    document.getElementById("submit-add").click();
}

function chart(opt){
    
    if(opt == 1 ){
        document.getElementById("chart_1").style.display = "none";
        document.getElementById("chart_2").style.display = "block";
    } else if(opt == 2 ){
        document.getElementById("chart_2").style.display = "none";
        document.getElementById("chart_1").style.display = "block";
    }
}
