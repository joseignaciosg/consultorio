<?php
    include("Template.php");
    $myTemplate= new Template();
    $myTemplate->PATH ="plantillas/";
    define("MAXIMO",6,true); // 16 imagenes por pagina.
    define("IMAGENESMINIATURAS","imagenes/miniaturas", true); // carpeta de las imagenes miniaturas
    define("IMAGENES","imagenes/originales", true); // carpeta las imagenes originales
    $imagenesMiniaturas=glob("{".IMAGENESMINIATURAS."/*.jpg,".IMAGENESMINIATURAS."/*.png,".IMAGENESMINIATURAS."/*.gif,".IMAGENESMINIATURAS."/*.bmp}",GLOB_BRACE);
    $imagenes=glob("{".IMAGENES."/*.jpg,".IMAGENES."/*.png,".IMAGENES."/*.gif,".IMAGENES."/*.bmp}",GLOB_BRACE); 
    $totalImagenes= count($imagenesMiniaturas); //total de imagenes en la IMAGENESMINIATURAS imagenes

/************************************************* VALIDACION *************************************************/

    function paginaValida($numeroPagina){
        global $totalImagenes;
        //si el numero de pagina es mayor que cero y menor que el total de imagenes($totalImagenes) entre(/)
        // la cantidad de imagenes por pagina(MAXIMO)
        if (MAXIMO<=0){die ("el mmo de p&aacute;gina debe ser mayor que cero"); exit(); }
        return (($numeroPagina>0) && ($numeroPagina<=ceil(($totalImagenes/MAXIMO)))); 
    }
    // Si no existe la variable pagina por el metodo GET
    // o en tal caso de que exista y no sea vda
    // mostramos la primera pna, que para nuestro caso es igual a 0 :P
    if ((!isset($_GET['pagina'])) || (!paginaValida($_GET['pagina']))){
        $inicio= 0; 
    } else{ //sino mostramos la primera pna
            $inicio= ($_GET['pagina']-1); 
    }
    

/************************************************* VALIDACION *************************************************/    

/************************************************** IMAGENES **************************************************/    

    $IMAGENES="";
    $myTemplate->setTemplate("imagen");     
    for ($i=($inicio*MAXIMO);($i!=$totalImagenes) && ($i<($inicio*MAXIMO)+MAXIMO);$i++){
        $descImagen=getimagesize($imagenes[$i]); //extraigo los atributos de la imagen, ancho, alto y tipo de imagen [png,jpg, etc.]
        $tipoImagen=str_replace("image/","",$descImagen["mime"]);//extraigo el tipo de imagen sin el image/ que me coloca getimagesize
        $myTemplate->setVars(array("imagenOriginal"=>$imagenes[$i],"imagen" => $imagenesMiniaturas[$i], "descImagen0" => $descImagen[0], "descImagen1"=>$descImagen[1], "tipoImagen"=> $tipoImagen));
        $IMAGENES.= $myTemplate->show();            
        
    }
    
/************************************************** IMAGENES **************************************************/    



/************************************************* PAGINACION *************************************************/

    $PAGINAS="";
    $i=1;
    while ($totalImagenes>0){
        if (($i-1)==$inicio){
            $myTemplate->setTemplate("paginaActual");       
        } else {
            $myTemplate->setTemplate("paginas");        
        }
        $myTemplate->setVars(array("numPagina" => $i));
        $PAGINAS.= $myTemplate->show();
        
        $totalImagenes-=MAXIMO;
        $i++;
    }
/************************************************* PAGINACION *************************************************/    

/********************************************** MOSTRAMOS EL CONTENIDO ****************************************/    
    $myTemplate->setTemplate("galeria");
    $myTemplate->setVars(array("IMAGENES" => $IMAGENES, "PAGINAS"=>$PAGINAS, "PAGINA" => $inicio+1));
    echo $myTemplate->show();
    

/********************************************** MOSTRAMOS EL CONTENIDO ****************************************/    
?>