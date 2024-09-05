<?php 
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':

            // salvando foto do aluno
            if (!empty($foto_aluno["name"])) {
			
                // Largura máxima em pixels
                $largura = 1500;
                // Altura máxima em pixels
                $altura = 1800;
                // Tamanho máximo do arquivo em bytes
                $tamanho = 10000000;
                //}
                $error = array();
        
        
                // Verifica se o arquivo é uma imagem
                if(!preg_match("/^image\/(webp|pjpeg|jpeg|png|gif|bmp)$/", $foto_aluno["type"])){
                    $error[1] = "Isso não é uma imagem.";
                    } 
        
                // Pega as dimensões da imagem
                $dimensoes = getimagesize($foto_aluno["tmp_name"]);
        
                // Verifica se a largura da imagem é maior que a largura permitida
                if($dimensoes[0] > $largura) {
                    $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
                }
        
                // Verifica se a altura da imagem é maior que a altura permitida
                if($dimensoes[1] > $altura) {
                    $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
                }
                
                // Verifica se o tamanho da imagem é maior que o tamanho permitido
                if($foto_aluno["size"] > $tamanho) {
                        $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
                }
        
                // Se não houver nenhum erro
                if (count($error) == 0) {
                
                // Pega extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto_aluno["name"], $ext);
        
                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        
                // Caminho de onde ficará a imagem
                $caminho_imagem = "../gerenciar_aluno/foto_upload/" . $nome_imagem;
        
                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto_aluno["tmp_name"], $caminho_imagem);
                }
            }

            $nome = $_POST["nome"];
            $data_nascimento = $_POST["data_nascimento"];
            $numero_matricula = $_POST["numero_matricula"];
            $email = $_POST["email"];
            $cidade = $_POST["cidade"];
            $uf = $_POST["uf"];
            $reprovacoes = $_POST["quant_repro"];
            $moradia = $_POST["moradia"];
            $turma = $_POST["turma"];

            $sql = "INSERT INTO aluno (nome, numero_matricula, email_institucional, cidade, data_nascimento, unidade_federativa, moradia, quant_reprovacao, foto, id_turma)
                    VALUES ('{$nome}', '{$numero_matricula}', '{$email}', '{$cidade}', '{$data_nascimento}', '{$uf}', '{$moradia}', '{$reprovacoes}', '{$nome_imagem}', '{$turma}')";

            $res = $conexao->query($sql);
            
            if($res == true){
                echo "<script>alert('Cadastrado com sucesso!');</script>";
                echo "<script>location.href='?page=turma&idturma=". $_REQUEST["idturma"] ."';</script>";
            }

            else{
                echo "<script>alert('Não foi possível cadastrar!');</script>";
                echo "<script>location.href='?page=turma&idturma=". $_REQUEST["idturma"] ."';</script>";
            }
            break;

        case 'editar':
            $nome = $_POST["nome"];
            $data_nascimento = $_POST["data_nascimento"];
            $numero_matricula = $_POST["numero_matricula"];
            $email = $_POST["email"];
            $cidade = $_POST["cidade"];
            $uf = $_POST["uf"];
            $reprovacoes = $_POST["quant_repro"];
            $moradia = $_POST["moradia"];
            $turma = $_POST["turma"];
            $cota = $_POST["cota"];
            $genero = $_POST["genero"];
            $aee = $_POST["acompanahmento_aee"];
            $cai = $_POST["acompanahmento_cai"];
            $saude = $_POST["acompanahmento_saude"];
            $auxilio_permanencia = $_POST["auxilio_permanencia"];
            $apoio_psicologico = $_POST["apoio_psicologico"];
            $extensao = $_POST["projeto_extensao"];
            $pesquisa = $_POST["projeto_pesquisa"];
            $ensino = $_POST["projeto_ensino"];
            $estagio = $_POST["estagio"];
            $equip_emprest = $_POST["equip_emprest"];
            $foto_antiga_aluno = $_POST["foto_antiga_aluno"];
            $foto_nova_aluno = $_FILES["foto_nova_aluno"];
            $foto_aluno = $_FILES["foto_aluno"];

            if (!empty($foto_nova_aluno["name"])) {
			
                // Largura máxima em pixels
                $largura = 1500;
                // Altura máxima em pixels
                $altura = 1800;
                // Tamanho máximo do arquivo em bytes
                $tamanho = 10000000;
                //}
                $error = array();
        
        
                // Verifica se o arquivo é uma imagem
                if(!preg_match("/^image\/(webp|pjpeg|jpeg|png|gif|bmp)$/", $foto_nova_aluno["type"])){
                    $error[1] = "Isso não é uma imagem.";
                    } 
        
                // Pega as dimensões da imagem
                $dimensoes = getimagesize($foto_nova_aluno["tmp_name"]);
        
                // Verifica se a largura da imagem é maior que a largura permitida
                if($dimensoes[0] > $largura) {
                    $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
                }
        
                // Verifica se a altura da imagem é maior que a altura permitida
                if($dimensoes[1] > $altura) {
                    $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
                }
                
                // Verifica se o tamanho da imagem é maior que o tamanho permitido
                if($foto_nova_aluno["size"] > $tamanho) {
                        $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
                }
        
                // Se não houver nenhum erro
                if (count($error) == 0) {
                
                // Pega extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto_nova_aluno["name"], $ext);
        
                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        
                // Caminho de onde ficará a imagem
                $caminho_imagem = "../gerenciar_aluno/foto_upload/" . $nome_imagem;
        
                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto_nova_aluno["tmp_name"], $caminho_imagem);
                }
            }

            else if (!empty($foto_aluno["name"])) {
			
                // Largura máxima em pixels
                $largura = 1500;
                // Altura máxima em pixels
                $altura = 1800;
                // Tamanho máximo do arquivo em bytes
                $tamanho = 10000000;
                //}
                $error = array();
        
        
                // Verifica se o arquivo é uma imagem
                if(!preg_match("/^image\/(webp|pjpeg|jpeg|png|gif|bmp)$/", $foto_aluno["type"])){
                    $error[1] = "Isso não é uma imagem.";
                    } 
        
                // Pega as dimensões da imagem
                $dimensoes = getimagesize($foto_aluno["tmp_name"]);
        
                // Verifica se a largura da imagem é maior que a largura permitida
                if($dimensoes[0] > $largura) {
                    $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
                }
        
                // Verifica se a altura da imagem é maior que a altura permitida
                if($dimensoes[1] > $altura) {
                    $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
                }
                
                // Verifica se o tamanho da imagem é maior que o tamanho permitido
                if($foto_aluno["size"] > $tamanho) {
                        $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
                }
        
                // Se não houver nenhum erro
                if (count($error) == 0) {
                
                // Pega extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto_aluno["name"], $ext);
        
                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        
                // Caminho de onde ficará a imagem
                $caminho_imagem = "../gerenciar_aluno/foto_upload/" . $nome_imagem;
        
                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto_aluno["tmp_name"], $caminho_imagem);
                }
            }
        
            else{	
                $nome_imagem = $foto_antiga_aluno;
                //echo $imgantiga;
            }

            
            $sql = "UPDATE aluno
                    SET
                        nome = '{$nome}',
                        numero_matricula = '{$numero_matricula}',
                        email_institucional = '{$email}',
                        genero = '{$genero}',
                        cidade = '{$cidade}',
                        data_nascimento = '{$data_nascimento}',
                        unidade_federativa = '{$uf}',
                        moradia = '{$moradia}',
                        quant_reprovacao = '{$reprovacoes}',
                        acompanhamento_aee = '{$aee}',
                        acompanhamento_cai = '{$cai}',
                        acompanhamento_saude= '{$saude}',
                        cota = '{$cota}',
                        auxilio_permanencia = '{$auxilio_permanencia}',
                        apoio_psicologico = '{$apoio_psicologico}',
                        projeto_extensao = '{$extensao}',
                        projeto_pesquisa = '{$pesquisa}',
                        projeto_ensino = '{$ensino}',
                        equip_emprest = '{$equip_emprest}',
                        estagio = '{$estagio}',
                        foto = '{$nome_imagem}',
                        id_turma = '{$turma}'

                    WHERE id_aluno=" . $_REQUEST["idaluno"];

            $res = $conexao->query($sql);


            if($res == true){
                echo "<script>alert('Editado com sucesso!');</script>";
                if($_REQUEST["r"]=="aluno"){
                    echo "<script>location.href='?page=aluno&idaluno=". $_REQUEST["idaluno"] ."&idturma=".$_REQUEST["idturma"]."&info=ver_mais';</script>";
                }
                else{
                    echo "<script>location.href='?page=turma&idturma=". $_REQUEST["idturma"] ."';</script>";
                }
            }

            else{
                echo "<script>alert('Não foi possível editar!');</script>";
                if($_REQUEST["r"]=="aluno"){
                    echo "<script>location.href='?page=aluno&idaluno=". $_REQUEST["idaluno"] ."&idturma=".$_REQUEST["idturma"]."';</script>";
                }
                else{
                    echo "<script>location.href='?page=turma&idturma=". $_REQUEST["idturma"] ."';</script>";
                }
            }

            break;
        
        case 'excluir':
            $sql = "DELETE FROM aluno
                        WHERE id_aluno=" . $_REQUEST["idaluno"];
                
                $res = $conexao->query($sql);

                if($res == true){
                    echo "<script>alert('Excluído com sucesso!');</script>";
                    echo "<script>location.href='?page=turma&idturma=". $_REQUEST["idturma"] ."';</script>";
                }
    
                else{
                    echo "<script>alert('Não foi possível excluir!');</script>";
                    echo "<script>location.href='?page=turma&idturma=". $_REQUEST["idturma"] ."';</script>";
                }
                break;
            break;

    }
?>