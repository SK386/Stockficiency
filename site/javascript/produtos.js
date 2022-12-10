
window.addEventListener('load', loaded);


function loaded(){


    document.getElementById('name').addEventListener('blur', leave);
    document.getElementById('qtd').addEventListener('blur', leave);
    document.getElementById('preco').addEventListener('blur', leave);
    document.getElementById('validade').addEventListener('blur', leave);
    document.getElementById('garantia').addEventListener('blur', leave);

}

function pre_modificar(id){
    
    document.getElementById("salvar").style.display = 'none';
    
    var _id = document.getElementById(id+"-id").innerHTML;
    
    var Reg_id = document.getElementById("id");

    var Reg_name = document.getElementById("name");
    var Reg_qtd = document.getElementById("qtd");
    var Reg_preco = document.getElementById("preco");
    var Reg_val = document.getElementById("validade");
    var Reg_gar = document.getElementById("garantia");

    var Table_name = document.getElementById(id+"-name");
    var Table_qtd = document.getElementById(id+"-qtd");
    var Table_preco = document.getElementById(id+"-preco");
    var Table_val = document.getElementById(id+"-validade");
    var Table_gar = document.getElementById(id+"-garantia");
    
    Reg_id.value = id;
    console.log(Reg_id.value);
    Reg_name.value = Table_name.innerHTML;
    Reg_qtd.value = Table_qtd.innerHTML;
    Reg_preco.value = Table_preco.innerHTML;
    Reg_val.value = Table_val.innerHTML.replace('/','-').replace('/','-');
    Reg_gar.value = Table_gar.innerHTML.replace('/','-').replace('/','-');
    
	document.getElementById("modificar").setAttribute('onClick','modificar()' );
	document.getElementById("deletar").setAttribute('onClick','deletar()' );
	document.getElementById("deletar").style.display = "block";
	document.getElementById("modificar").style.display = "block";


	document.getElementById('name').offsetParent.className += ' ativo';
    document.getElementById('qtd').offsetParent.className += ' ativo';
    document.getElementById('preco').offsetParent.className += ' ativo';
    document.getElementById('validade').offsetParent.className += ' ativo';
    document.getElementById('garantia').offsetParent.className += ' ativo';

}

function modificar(){
    
        var _id = document.getElementById("id").value ;
	    var name = document.getElementById("name").value ;
	    var qtd = document.getElementById("qtd").value;
	    var preco = document.getElementById("preco").value;
        var qtd_ = true ;
        var preco_ = true ;
        var name_ = true ;
        
        if(qtd == '' || qtd == 0){
            document.getElementById("qtd_").style.display = "block";
            qtd_ = false;
        }else{
             document.getElementById("qtd_").style.display = "none";
        }
        if( preco == '' || preco == 0){
            document.getElementById("preco_").style.display = "block";
            preco_ = false;
        }else{
             document.getElementById("preco_").style.display = "none";
        }
        if (name == ''){
            document.getElementById("name_").style.display = "block";
            name_ = false;
        }else{
            document.getElementById("name_").style.display = "none";
        }
        
        if ( preco_ == true && qtd_ == true && name_ == true) {
            
            document.getElementById("deletar").style.display = 'none';
            document.getElementById("modificar").style.display = 'none';
            document.getElementById("salvar").style.display = "block";

            
            document.getElementById("register-form").action = "php_arquivos/estoque/alterarProduto.php";
            document.getElementById("submit-mod").click();
            
        }   
}



function deletar(){
    document.getElementById("register-form").action = "php_arquivos/estoque/deletarProduto.php";
	document.getElementById("submit-del").click();
}

function normal(){
	    window.location.reload();
}

function adicionar(){
    var name = document.getElementById("name").value;
    var qtd = document.getElementById("qtd").value;
    var preco = document.getElementById("preco").value;
    
    

        document.getElementById("register-form").action = "php_arquivos/estoque/cadastrarProduto.php";
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

function popup(msg, opt){
    
    if(opt == 1 && msg != ''){
        document.getElementById("Alert").style.display = "block";
        document.getElementById("alert").style.display = "block";
        document.getElementById('msg').innerHTML = msg;
        document.getElementById("Alert").style.zIndex = "70";
        document.getElementById("alert").style.zIndex = "60";
    } else if(opt == 2 ){
        document.getElementById("Alert").style.display = "none";
        document.getElementById("alert").style.display = "none";
        document.getElementById("Alert").style.zIndex = "-70";
        document.getElementById("alert").style.zIndex = "-70";
    }
}
