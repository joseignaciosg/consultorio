<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="CSS/styles.css" rel="stylesheet" type="text/css" />
<title>Galer&iacute;a de im&aacute;genes con Plantillas y CSS - Página {PAGINA}</title>
<script language="JavaScript" type="text/javascript">
function popUp (URL,w,h){
    var margen=35;
    if ((w+margen>screen.width) || (h+margen>screen.height)){
        window.open(URL,"ventana1","width="+(w+margen)+", height="+(h+margen)+", scrollbars=yes, menubar=no, location=no, resizable=no");
    } else{
        window.open(URL,"ventana1","width="+(w+margen)+", height="+(h+margen)+", scrollbars=no, menubar=no, location=no, resizable=no");
    }
}
</script>
</head>

<body>
<div id="main">
    <h1>Galer&iacute;a de Im&aacute;genes</h1>
    <p>Este es un claro ejemplo de separar el dise&ntilde;o de la programaci&oacute;n con la clase Template escrita por <a href="http://www.cristalab.com/foros/profile.php?mode=viewprofile&amp;u=306">Dano</a>.</p>
    <div class="paginador">{PAGINAS} <div class="clearit"></div></div>
    <div id="imagenes">
        {IMAGENES}
        <div class="clearit"></div>             
    </div>
    <div class="paginador">{PAGINAS}<div class="clearit"></div></div>
    <p>Ejemplo realizado por <a href="http://www.cristalab.com/foros/profile.php?mode=viewprofile&amp;u=2645">Maikel</a> para la documentación de la clase Template.</p>
    <p align="center"><a href="http://validator.w3.org/check?uri=referer"><img
                                    src="http://www.w3.org/Icons/valid-xhtml10"
                                    alt="Valid XHTML 1.0 Transitional" style="border:0;width:88px;height:31px" /></a> <a href="http://jigsaw.w3.org/css-validator/check/referer">
   <img style="border:0;width:88px;height:31px"
                            src="http://jigsaw.w3.org/css-validator/images/vcss" 
                            alt="¡CSS Válido!" />
 </a></p>
</div>
</body>
</html>