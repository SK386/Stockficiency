<?php
        session_start();
        include "../conexao.php";

            $encomenda_id = htmlspecialchars($_GET["encomenda_id"]);

            $sql = "SELECT * FROM encomendas_produtos WHERE encomenda_id=$encomenda_id";
                $consulta = mysqli_query($mysqli, $sql);

            $x = 0;
            $content="<div id='outro-form' class='form'>
                        ".'
                        <div class="products-area-wrapper tableView">
      <div class="products-header">
        <div class="product-cell">
        Produto
        </div>
        <div class="product-cell image">
        Quantidade
        </div>
      </div>
                        ';
            while ($linha = mysqli_fetch_array($consulta)) {
                $p=$linha["produto_id"];
                $q=$linha["quantidade"];
                
                    $produto = mysqli_query($mysqli,"SELECT * FROM produtos WHERE id_produto=$p");
                while($prod = mysqli_fetch_array($produto)){
                $id=$prod["nome_produto"];
                $content .= '
        <div class="products-row">
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
        
        <div class="product-cell stock"><span class="cell-label">Id:</span> <span>'.$id.'</span> </div>
        
          <div class="product-cell image">
           <span>'.$q.'</span>
          </div>
      </div>
        ';
                            
                        }
        
                $x++;
            }
            $_SESSION['for'] = $content;
            echo $_SESSION['for'];
            header("Location: ../../encomenda.php");
        ?>
