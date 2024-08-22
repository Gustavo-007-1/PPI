<?php 
    session_start();
    if (empty($_SESSION)) {
        header('Location: ../index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos e Turmas - Nexum</title>
    <link rel="stylesheet" href="../assets/curso_turma/css.css">
    <link rel="stylesheet" href="../assets/linha_branca_cima/retangulo_branco_cima.css">

</head>
<body class="fundo">
    <div>
            <div class="retangulo_branco_cima">
                <div>
                    <img src="../assets/imagens/IF.png" class="logo_IF" alt="Imagem logo IF">
                    <div class="titulo_nexum">
                        <h1><a href="?page=principal">Nexum</a></h1>
                    </div>
                    <div class="botao_minha_conta">
                        <?php
                        echo "<a href\"?page=minha_conta\>Minha conta</a>"
                        ?>
                    </div>
                    <div class="botao_sair">
                        <?php 
                            echo "<a href=\"?page=logout\">Sair</a>";
                        ?>
                    </div>
                </div>    
            </div>
    </div>

    <div class="retangulo_branco">
       
            <?php 
                include "../config.php";
                switch (@$_REQUEST["page"]){
                    case 'cadastrar_curso':
                        include("./cadastrar_curso.php");
                        break;
                    
                    case 'editar_curso':
                        include("./editar_curso.php");
                        break;

                    case 'salvar_curso':
                        include("./salvar_curso.php");
                        break;
                    
                    case 'cadastrar_turma':
                        include("./cadastrar_turma.php");
                        break;
                    
                    case 'salvar_turma':
                        include("./salvar_turma.php");
                        break;

                    case 'logout':
                        include("../logout.php");
                        break;

                    case 'principal':
                        header('Location: ../pagina_principal.php');
                        exit();
                        break;


                    default:
                        
                        include("./listar_nome_curso_turma.php");
                        
                        if($_SESSION["categoria"]==1 || $_SESSION["categoria"]==2){
                            echo "<div>";
                            echo "<a class=\"botao_adicionar_turma\" href=\"?page=cadastrar_turma\">Adicionar Turma</a>";
                            echo "<a class=\"botao_adicionar_curso\" href=\"?page=cadastrar_curso\">Adicionar Curso</a>";
                            echo "</div>";
                        }
                        
                        break;
                }
            ?>
        
    </div>
</body>
</html>