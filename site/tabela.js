
window.addEventListener('load', loaded);


function loaded(){

    document.getElementById('cod').addEventListener('blur', leave);
    document.getElementById('name').addEventListener('blur', leave);
    document.getElementById('qtd').addEventListener('blur', leave);
    document.getElementById('preco').addEventListener('blur', leave);

}

function pre_modificar(id){
    
    document.getElementById("salvar").style.display = 'none';
    
    var _id = document.getElementById(id+"-id").innerHTML;
    
    var Reg_id = document.getElementById("id");
    var Reg_cod = document.getElementById("cod");
    var Reg_name = document.getElementById("name");
    var Reg_qtd = document.getElementById("qtd");
    var Reg_preco = document.getElementById("preco");

    var Table_cod = document.getElementById(id+"-cod");
    var Table_name = document.getElementById(id+"-name");
    var Table_qtd = document.getElementById(id+"-qtd");
    var Table_preco = document.getElementById(id+"-preco");
    
    Reg_id.value = _id;
    Reg_cod.value = Table_cod.innerHTML;
    Reg_name.value = Table_name.innerHTML;
    Reg_qtd.value = Table_qtd.innerHTML;
    Reg_preco.value = Table_preco.innerHTML;
    
	document.getElementById("modificar").setAttribute('onClick','modificar()' );
	document.getElementById("deletar").setAttribute('onClick','deletar()' );
	document.getElementById("deletar").style.display = "block";
	document.getElementById("modificar").style.display = "block";

	document.getElementById('cod').offsetParent.className += ' ativo';
	document.getElementById('name').offsetParent.className += ' ativo';
    document.getElementById('qtd').offsetParent.className += ' ativo';
    document.getElementById('preco').offsetParent.className += ' ativo';

}

function modificar(){
    
        var _id = document.getElementById("id").value ;
	    var cod = document.getElementById("cod").value;
	    var name = document.getElementById("name").value ;
	    var qtd = document.getElementById("qtd").value;
	    var preco = document.getElementById("preco").value;
        var cod_ = true ;
        var qtd_ = true ;
        var preco_ = true ;
        var name_ = true ;
        
        if(isNaN(cod) || cod == '' || cod == 0){
            document.getElementById("cod_").style.display = "block";
            cod_ = false;
        }else{
             document.getElementById("cod_").style.display = "none";
        }
        if(isNaN(qtd) || qtd == '' || qtd == 0){
            document.getElementById("qtd_").style.display = "block";
            qtd_ = false;
        }else{
             document.getElementById("qtd_").style.display = "none";
        }
        if(isNaN(preco) || preco == '' || preco == 0){
            document.getElementById("preco_").style.display = "block";
            preco_ = false;
        }else{
             document.getElementById("preco_").style.display = "none";
        }
        if (name == '' || !(isNaN(name)) ){
            document.getElementById("name_").style.display = "block";
            name_ = false;
        }else{
            document.getElementById("name_").style.display = "none";
        }
        
        if ( preco_ == true && cod_ == true && qtd_ == true && name_ == true) {
            
            document.getElementById("deletar").style.display = 'none';
            document.getElementById("modificar").style.display = 'none';
            document.getElementById("salvar").style.display = "block";

            
            document.getElementById("register-form").action = "php_arquivos/alterarProduto.php";
            document.getElementById("submit-mod").click();
            
        }   
}



function deletar(){
    document.getElementById("register-form").action = "php_arquivos/deletarProduto.php";
	document.getElementById("submit-del").click();
}

function normal(){
	    document.getElementById("deletar").style.display = 'none';
	    document.getElementById("modificar").style.display = 'none';
	    document.getElementById("salvar").style.display = "block";

    document.getElementById("id").value = '' ;
    document.getElementById("cod").value = '' ;
    document.getElementById("name").value = '' ;
    document.getElementById("qtd").value = '' ;
    document.getElementById("preco").value = '' ;
    
    
        document.getElementById('cod').offsetParent.className = 'box';
        document.getElementById('name').offsetParent.className = 'box';
        document.getElementById('qtd').offsetParent.className = 'box';
        document.getElementById('preco').offsetParent.className = 'box';
        
        document.getElementById("cod_").style.display = "none";
        document.getElementById("name_").style.display = "none";
        document.getElementById("qtd_").style.display = "none";
        document.getElementById("preco_").style.display = "none";
        
    document.getElementById("random").click();
}

function adicionar(){
    var cod = document.getElementById("cod").value;
    var name = document.getElementById("name").value;
    var qtd = document.getElementById("qtd").value;
    var preco = document.getElementById("preco").value;
    
    var cod_ = true ;
    var name_ = true ;
    var qtd_ = true ;
    var preco_ = true ;
    
    if(isNaN(cod) || cod == 0){
        document.getElementById("cod_").style.display = "block";
        cod_ = false;
    }else{
            document.getElementById("cod_").style.display = "none";
    }
    if(isNaN(qtd) || qtd == 0){
        document.getElementById("qtd_").style.display = "block";
        qtd_ = false;
    }else{
            document.getElementById("qtd_").style.display = "none";
    }
    if(isNaN(preco) || preco == 0){
        document.getElementById("preco_").style.display = "block";
        preco_ = false;
    }else{
            document.getElementById("preco_").style.display = "none";
    }
    if ( !(isNaN(name)) ){
        document.getElementById("name_").style.display = "block";
        name_ = false;
    }else{
        document.getElementById("name_").style.display = "none";
    }
    
    if ( preco_ == true && cod_ == true && qtd_ == true && name_ == true) {

        document.getElementById("register-form").action = "php_arquivos/cadastrarProduto.php";
        document.getElementById("submit-add").click();
        
    }
}

function leave(){
    if(this.value != ''){
        this.offsetParent.className += " ativo";
    }else{
        this.offsetParent.className = 'box';
    }
}

function refresh(){
    console.log('oi')/
    document.getElementById("submit-add").click();
}
