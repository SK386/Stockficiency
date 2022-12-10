
window.addEventListener('load', loaded);


function loaded(){


    document.getElementById('origem').addEventListener('blur', leave);
    document.getElementById('destino').addEventListener('blur', leave);
    document.getElementById('horario').addEventListener('blur', leave);
    document.getElementById('qtd_produtos').addEventListener('blur', leave);
    document.getElementById('observacao').addEventListener('blur', leave);
    document.getElementById("qtd_produtos").required = true;
    
    var element = document.getElementById("outro-form");

    if(typeof(element) != 'undefined' && element != null){
        console.log('Element exists!');
        document.getElementById("register-form").style.display = 'none';
        document.getElementById("random").click();
        document.getElementById("modificar").setAttribute('onClick','modificar2()' );
        var outro_inp = document.getElementsByClassName("outro-input");
            for( i=0; i < outro_inp.length; i++){
                outro_inp[i].addEventListener('blur', leave);
                outro_inp[i].offsetParent.className += ' ativo';
            }
        
    } else{
        console.log('Element does not exist!');
    }

}

function pre_modificar(id){
    console.log(id);
    document.getElementById("salvar").style.display = 'none';
    
    var _id = document.getElementById(id+"-id").innerHTML;
    
    var Reg_id = document.getElementById("id_enc");

    var Reg_ori = document.getElementById("origem");
    var Reg_des = document.getElementById("destino");
    var Reg_hor = document.getElementById("horario");
    var Reg_obs = document.getElementById("observacao");
    document.getElementById("qtdp_box").style.display = 'none';
    document.getElementById("qtd_produtos").required = false;

    var Table_ori = document.getElementById(id+"-origem");
    var Table_des = document.getElementById(id+"-destino");
    var Table_hor = document.getElementById(id+"-horario");
    var Table_obs = document.getElementById(id+"-observacao");
    //var Table_qtd = document.getElementById(id+"-qtd_produtos");
    
    Reg_id.value = _id;
    Reg_ori.value = Table_ori.innerHTML;
    Reg_des.value = Table_des.innerHTML;
    Reg_hor.value = Table_hor.innerHTML;
    Reg_obs.value = Table_obs.innerHTML;
    //Reg_qtd.value = Table_qtd.innerHTML;
    
	document.getElementById("modificar").setAttribute('onClick','modificar()' );
	document.getElementById("deletar").setAttribute('onClick','deletar()' );
	document.getElementById("deletar").style.display = "block";
	document.getElementById("modificar").style.display = "block";


        document.getElementById('origem').offsetParent.className += ' ativo';
        document.getElementById('destino').offsetParent.className += ' ativo';
        //document.getElementById('qtd_produtos').offsetParent.className += ' ativo';
        document.getElementById('horario').offsetParent.className += ' ativo';
        document.getElementById('observacao').offsetParent.className += ' ativo';

}

function modificar(){        
    
            document.getElementById("register-form").action = "php_arquivos/encomendas/alterarEncomenda1.php";
            document.getElementById("submit").click();
            
}

function modificar2(){
    
            document.getElementById("outro-form").action = "php_arquivos/encomendas/alterarEncomenda2.php";
            document.getElementById("submit2").click();
            
}



function deletar(){
    document.getElementById("register-form").action = "php_arquivos/encomendas/deletarEncomenda.php";
	document.getElementById("submit").click();
}

function normal(){
	    window.location.reload();
}

function adicionar(){

        document.getElementById("register-form").action = "php_arquivos/encomendas/cadastrarEncomenda1.php";
        document.getElementById("submit").click();
        
}
function adicionar2(){

        document.getElementById("outro-form").action = "php_arquivos/encomendas/cadastrarEncomenda2.php";
        document.getElementById("submit2").click();
        
}

function leave(){
    if(this.value != ''){
        this.offsetParent.className += " ativo";
    }else{
        this.offsetParent.className = 'box';
    }
}

function refresh(){
    window.location.reload();
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

function click(){
    
}
