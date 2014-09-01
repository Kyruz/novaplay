<?php
    include 'dbConnect.php';
    include 'dbDisconect.php';
    
    $nome = $codigo = $produtor = $quantidade = $categoria = $preco = $tags = $tags_outras = $detalhes = "";
    $pack_peso = $pack_larg = $pack_compr = $pack_altura = 0;
    $nomeErr = $codigoErr = $precoErr = $produtorErr = $quantidadeErr = $categoriaErr = $tagsErr = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $readyToStore = true;
        if(empty($_POST["nome"])){
            $nomeErr = "Inserir nome do produto";
            $readyToStore = false;
        }else{
            $nome = test_input($_POST["nome"]);
        }
        if(empty($_POST["codigo"])){
            $codigoErr = "Inserir código do produto";
            $readyToStore = false;
        }else{
            $codigo = test_input($_POST["codigo"]);
        }
        if(empty($_POST["preco"]) or !is_numeric($_POST["preco"]) or (float)test_input($_POST["preco"] == 0)){
            $precoErr = "Inserir preço do produto";
            $readyToStore = false;
        }else{
            $preco = (float)test_input($_POST["preco"]);
        }
        if(empty($_POST["desc_blt"]) or !is_numeric($_POST["desc_blt"])){
            $desc_bltErr = "Inserir valor do desconto";
            $readyToStore = false;
        }else{
            $desc_blt = (((float)test_input($_POST["desc_blt"]))/100);
        }
        if(empty($_POST["quantidade"]) or !is_numeric(test_input($_POST["quantidade"]))){
            $quantidadeErr = "Indique quantos produtos serão adicionados ao estoque";
            $readyToStore = false;
        }else{
            $quantidade = (int)test_input($_POST["quantidade"]);
        }
        if(empty($_POST["codCategoria"])){
            $categoriaErr = "Indicar a categoria do produto";
            $readyToStore = false;
        }else{
            $categoria = test_input($_POST["codCategoria"]);
        }
        if(empty($_POST["produtor"])){
            $produtorErr = "Inserir a marca ou produtora";
            $readyToStore = false;
        }else{
            $produtor = test_input($_POST["produtor"]);
        }
        if(empty($_POST["tags_outras"]) and empty($_POST["tags"])){
            $tagsErr = "Adicionar tags para o produto";
            $readyToStore = false;
        }else{
            $tagsArray = "tags[1]=1&tags[2]=2&tags[3]=3";
            $tagsList = implode(" ", $_POST['tags']);
            $tags_outras = test_input($_POST["tags_outras"]);
        }
        if(!empty($_POST['pack_peso'])){
            $pack_peso = $_POST['pack_peso'];
        }
        if(!empty($_POST['pack_altura'])){
            $pack_altura = $_POST['pack_altura'];
        }
        if(!empty($_POST['pack_larg'])){
            $pack_larg = $_POST['pack_larg'];
        }
        if(!empty($_POST['pack_compr'])){
            $pack_compr = $_POST['pack_compr'];
        }
        $detalhes = test_input($_POST['detalhes']);
    }
    
    if($readyToStore){
        
        $addProdQuery = "INSERT INTO produto (nome_prod,codigo_prod,cod_categoria,produtor,preco,qtd_estoque,tags,descricao,desc_blt, pack_peso, pack_altura, pack_larg, pack_compr) VALUES ('$nome','$codigo','$categoria','$produtor','$preco','$quantidade','$tagsList $tags_outras','$detalhes','$desc_blt','$pack_peso','$pack_altura','$pack_larg','$pack_compr')";
        if(mysqli_query($dbCon,$addProdQuery)){
            $prodIdArr = mysqli_fetch_array(mysqli_query($dbCon,"SELECT id_produto FROM produto order by id_produto DESC LIMIT 1"));
            $prodId = $prodIdArr[0];
            mkPageDir($prodId);
            createPage($prodId);
            
            saveFile($_FILES['cover'], $prodId);
            saveFile($_FILES['img1'], $prodId);
            saveFile($_FILES['img2'], $prodId);
            saveFile($_FILES['img3'], $prodId);
            //move_uploaded_file($_FILES['cover']['tmp_name'], "../produtos/".$prodId."/media/b_".$_FILES['cover']['name']);
            
            makeXml($prodId, $categoria, $_FILES['cover']['name'], $_FILES['img1']['name'], $_FILES['img2']['name'], $_FILES['img3']['name'], $_POST['videoURL']);
            
            dbDisconect($dbCon);
            header('Location: http://localhost/playstart_2/cadastroProd.php?message=1');
        }else{
            dbDisconect($dbCon);
            header('Location: http://localhost/playstart_2/cadastroProd.php?message=3');
        }
    }else{
        dbDisconect($dbCon);
        header('Location: http://localhost/playstart_2/cadastroProd.php?message=2&nome='.$nome.'&codigo='.$codigo.'&preco='.$preco.'&categoria='.$categoria.'&produtor='.$produtor.'&quantidade='.$quantidade.'&tags='.$tagsArray.'&tags_outras='.$tags_outras.'&detalhes='.$detalhes.'&nomeErr='.$nomeErr.'&codigoErr='.$codigoErr.'&precoErr='.$precoErr.'&categoriaErr='.$categoriaErr.'&produtorErr='.$produtorErr.'&quantidadeErr='.$quantidadeErr.'&tagsErr='.$tagsErr.'&tagList='.$tagsList.'&desc_blt='.$desc_blt);
    }
    
    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        $data = mb_strtolower($data,'UTF-8');
        return $data;
    }
    
    function saveFile($file, $prodID){
        
        $filePath = $file['name'];
        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        $uploadedFile = $file['tmp_name'];
        
        if($ext == "jpg" || $ext == "jpeg"){
            $src = imagecreatefromjpeg($uploadedFile);
        }elseif($ext == "png"){
            $src = imagecreatefrompng($uploadedFile);
        }else{
            $src = imagecreatefromgif($uploadedFile);
        }
        
        list($width, $height) = getimagesize($uploadedFile);
        
        $newHeight_m = 450;
        $newWidth_m = ($width/$height)*$newHeight_m;
        if($newWidth_m > 500){
            $brandNewWidth = 500;
            $brandNewHeight = ($newHeight_m/$newWidth_m)*$brandNewWidth;
            $newWidth_m = $brandNewWidth;
            $newHeight_m = $brandNewHeight;
        }
        $tmp_m = imagecreatetruecolor($newWidth_m, $newHeight_m);
        imagecopyresampled($tmp_m, $src, 0, 0, 0, 0, $newWidth_m, $newHeight_m, $width, $height);
        $filneName = "../produtos/".$prodID."/media/".$file["name"];
        imagejpeg($tmp_m, $filneName, 100);
        
        
        $newHeight_s = 100;
        $newWidth_s = ($width/$height)*$newHeight_s;
        if($newWidth_s > 120){
            $brandNewWidth = 120;
            $brandNewHeight = ($newHeight_s/$newWidth_s)*$brandNewWidth;
            $newWidth_s = $brandNewWidth;
            $newHeight_s = $brandNewHeight;
        }
        $tmp_s = imagecreatetruecolor($newWidth_s, $newHeight_s);
        imagecopyresampled($tmp_s, $src, 0, 0, 0, 0, $newWidth_s, $newHeight_s, $width, $height);
        $filneName = "../produtos/".$prodID."/media/s_".$file["name"];
        imagejpeg($tmp_s, $filneName, 100);
        
        move_uploaded_file($file['tmp_name'], "../produtos/".$prodID."/media/b_".$file['name']);
        
        imagedestroy($src);
        imagedestroy($tmp_m);
        imagedestroy($tmp_s);
    }
    
    function mkPageDir($prod_id){
        mkdir('../produtos/'.$prod_id);
        mkdir('../produtos/'.$prod_id.'/media');
    }
    
    function createPage($prod_id){
        $pgTop = fopen("../blocks/pgProd/pgTop.php",'r');
        $topCont = fread($pgTop,2048);
        fclose($pgTop);
        $pgBot = fopen("../blocks/pgProd/pgBot.php",'r');
        $botCont = fread($pgBot,16348);
        fclose($pgBot);
        $xmlDir = "produtos/".$prod_id."/data.xml";
        $pgCont = $topCont.$xmlDir.$botCont;
        $prodPage = fopen("../produtos/".$prod_id."/main.php", 'w');
        fwrite($prodPage, $pgCont);
        fclose($prodPage);
    }
    
    function makeXml($prod_id, $Code, $cover, $img1, $img2, $img3, $videoURL){
        if(stristr($videoURL, "youtube.com") != false){
            if(stristr($videoURL,"https:") != false){
                $videoURL = substr($videoURL, 6);
                $readyURL = substr_replace($videoURL, "embed/", 18, 8);
                $retVal = 0;
            }elseif(stristr($videoURL,"http:") != false){
                $videoURL = substr($videoURL, 5);
                $readyURL = substr_replace($videoURL, "embed/", 18, 8);
                $retVal = 0;
            }else{
                return 1;
            }
        }else{
            return 2;
        }
        //$catCode = (int)$Code;
        switch ($Code){
            case 5 :
                $catName = "Celular / Smartphone";
                break;
            case 14 :
                $catName = "Jogos";
                break;
            case 12 :
                $catName = "Automação Comercial";
                break;
            case 1 :
                $catName = "Nootebook / Ultrabook";
                break;
            case 7 :
                $catName = "PC / Desktop";
                break;
            case 31 :
                $catName = "Armazenamento";
                break;
            case 6 :
                $catName = "Consoles e Acessórios";
                break;
            case 30 :
                $catName = "Teclados";
                break;
            case 28 :
                $catName = "Fones, Headfones e Headsets";
                break;
            case 29 :
                $catName = "Mouses";
                break;
            case 2 :
                $catName = "Impressoras e Multifuncionais";
                break;
            case 4 :
                $catName = "Energia e Alimentação";
                break;
            case 15 :
                $catName = "Tablets e Acessórios";
                break;
            case 11 :
                $catName = "Suprimentos";
                break;
            case 21 :
                $catName = "Mini-System";
                break;
            case 8 :
                $catName = "Telas";
                break;
            case 17 :
                $catName = "GPS";
                break;
            case 25 :
                $catName = "Iluminação";
                break;
            case 3 :
                $catName = "Datashows";
                break;
            case 24 :
                $catName = "Conversores";
                break;
            case 19 :
                $catName = "Blu-Ray / DVD Player";
                break;
            case 22 :
                $catName = "Som / Home Theater";
                break;
            case 26 :
                $catName = "Adaptadores";
                break;
            case 20 :
                $catName = "Calculadoras";
                break;
            case 9 :
                $catName = "Peças / Componentes";
                break;
            case 23 :
                $catName = "Antenas e afins";
                break;
            case 18 :
                $catName = "Câmeras e Filmadoras";
                break;
            case 10 :
                $catName = "Redes / LAN / Wireless";
                break;
            case 13 :
                $catName = "Telefonia Fixa";
                break;
            case 16 :
                $catName = "Automotivos";
                break;
            case 27 :
                $catName = "Caboes / Extensões";
                break;
            case 32 :
                $catName = "Perfumes";
                break;
            case 0 :
                $catName = "";
                break;
            default:
                $catName = "Undentified";
        }
        $xmlCont = "<?xml version='1.0' encoding='utf-8'?><produto><id>".$prod_id."</id><categoria>".$catName."</categoria><cover>".$cover."</cover><img1>".$img1."</img1><img2>".$img2."</img2><img3>".$img3."</img3><videoURL>".$readyURL."</videoURL></produto>";
        if($xmlFile = fopen("../produtos/".$prod_id."/data.xml", 'w')){
            $retVal = 0;
        }else{
            $retVal = 3;
        }
        if(fwrite($xmlFile, $xmlCont)){
            $retVal = 0;
        }else{
            $retVal = 4;
        }
        return $retVal;
    }