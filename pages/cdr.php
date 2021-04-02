<?php
include('connection.php');

session_start();
//
//if(isset($_GET['us'])){
//    $user = $_GET['us'];
//}
//else{
//    echo "<script>
//       location.href='index.php';
//       </script>";
//}

function cdrpage_getpost_ifset($test_vars)
{
	if (!is_array($test_vars)) {
		$test_vars = array($test_vars);		
	}
	foreach($test_vars as $test_var) { 
		if (isset($_POST[$test_var])) { 
			global $$test_var;
			$$test_var = $_POST[$test_var]; 
		} elseif (isset($_GET[$test_var])) {
			global $$test_var; 
			$$test_var = $_GET[$test_var];
		}
	}
}


cdrpage_getpost_ifset(array('s', 't'));


//$array = array ("INTRODU&Ccedil;&Atilde;O", "RELAT&Oacute;RIO CDR", "COMPARA&Ccedil;&Atilde;O DE CHAMADAS", "TR&Aacute;FEGO MENSAL","CARGA DI&Aacute;RIA", "CONTATO");

$array = array ("RELAT&Oacute;RIO CDR", "COMPARA&Ccedil;&Atilde;O DE CHAMADAS", "TR&Aacute;FEGO MENSAL","CARGA DI&Aacute;RIA");
$s = $s ? $s : 0;
$section="section$s$t";
$racine=$PHP_SELF;
$update = "Setembro/2014";

$paypal="NOK"; //OK || NOK
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>		
		<title>ASTCDR - Asterisk Libre</title>
		<meta http-equiv="Content-Type" content="text/html">
                <link rel="shortcut icon" href="images/logo.ico"/>
		<link rel="stylesheet" type="text/css" media="print" href="/css/print.css">
		<SCRIPT LANGUAGE="JavaScript" SRC="./encrypt.js"></SCRIPT>
		<style type="text/css" media="screen">
			@import url("css/layout.css");
			@import url("css/content.css");
			@import url("css/docbook.css");
		</style>
		<meta name="MSSmartTagsPreventParsing" content="TRUE">
	</head>
	<body>
	
	

	
	
		<!-- header BEGIN -->
		<div id="fedora-header">
			
			<div id="fedora-header-logo">
				 <table border="0" cellpadding="0" cellspacing="0"><tr><td><img src="images/logo.png"  alt="ASTCDR Asterisk Libre"></td><td>
				 <H1><font color="#004a25">&nbsp;&nbsp;&nbsp;Registros Detalhados de Chamadas</font></H1></td></tr></table>
			</div>

		</div>
		<div id="fedora-nav"></div>
		<!-- header END -->
		
		<!-- leftside BEGIN -->
		<div id="fedora-side-left">
		<div id="fedora-side-nav-label">Navega&ccedil;&atilde;o Local:</div>	<ul id="fedora-side-nav">
		<? 
			$nkey=array_keys($array);
    		$i=0;
    		while($i<sizeof($nkey)){
			
				$op_strong = (($i==$s) && (!is_string($t))) ? '<strong>' : '';
				$cl_strong = (($i==$s) && (!is_string($t))) ? '</strong>' : '';
									
        		if(is_array($array[$nkey[$i]])){
					
					
					
					echo "\n\t<li>$op_strong<a href=\"$racine?s=$i\">".$nkey[$i]."</a>$cl_strong";
									
					$j=0;
					while($j<sizeof($array[$nkey[$i]] )){
						$op_strong = (($i==$s) && (isset($t)) && ($j==intval($t))) ? '<strong>' : '';
						$cl_strong = (($i==$s) && (isset($t))&& ($j==intval($t))) ? '</strong>' : '';						
						echo "<ul>";						
						echo "\n\t<li>$op_strong<a href=\"$racine?s=$i&t=$j\">".$array[$nkey[$i]][$j]."</a>$cl_strong";
						echo "</ul>";
						$j++;						
					}
						
        		}else{					
					echo "\n\t<li>$op_strong<a href=\"$racine?s=$i\">".$array[$nkey[$i]]."</a>$cl_strong";
				}
				echo "</li>\n";
        		
        		$i++;
    		}
              
		?>
                    <!-- <li><a href='http://200.236.221.110/pbxvst/'> SAIR </a></li> -->
			
			</ul>
			
		<? if ($paypal=="OK"){?>
		<center>
			<br><br>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="support@asterisklibre.org">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="REAL">
<input type="hidden" name="tax" value="0">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but04.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
</center>
			<? } ?>
			
		</div>

		<!-- leftside END -->

		<!-- content BEGIN -->
		<div id="fedora-middle-two">
<!--			<div class="fedora-corner-tr">&nbsp;</div>
			<div class="fedora-corner-tl">&nbsp;</div>-->
			<div id="fedora-content">



<? if ($section=="section0"){?>

<!--<h1>
 <center>AstStatsCDR: Analizador de CDR</center>
</h1>
						<h3>Registro Detalhados de Chamadas</h3>
						<p>Independentemente do seu tamanho, a maioria dos PABX (Private Automatic Branch Exchange, cuja tradu&ccedil;&atilde;o 
						&eacute; Troca Autom&aacute;tica de Ramais Privados) e PMS (Property Management Systems, que se traduz em Sistemas de Gest&atilde;o 
            de Propriedade) produzem <b>Registos Detalhados de Chamadas (CDR)</b>. Geralmente, estes s&atilde;o criados no 
						final de uma chamada, mas em alguns sistemas de telefones os dados est&atilde;o dispon&iacute;veis durante a chamada. Estes dados 
						s&atilde;o produzidos apartir do sistema de telefones por um link serial conhecido como Station Message Detail Recording port(SMDR, 
						cuja tradu&ccedil;&atilde;o &eacute; Porta da Esta&ccedil;&atilde;o de Mensagens de Grava&ccedil;&atilde;o Detalhada). <b>Alguns dos detalhes inclu&iacute;dos 
						nos registos de chamadas s&atilde;o: Hora, Data, Dura&ccedil;&atilde;o das Chamadas, N&uacute;mero Marcado, Identifica&ccedil;&atilde;o das Chamadas, Localiza&ccedil;&atilde;o
						de Informa&ccedil;&otilde;es, Extens&atilde;o, Linha/Tronco, Custo, Status de Conclus&atilde;o das Chamadas.</b><br>
						<br>
						Os Registos Detalhados de Chamadas, tanto local como de longa dist&acirc;ncia, podem ser usados para a verifica&ccedil;&atilde;o de uso,
						a reconcilia&ccedil;&atilde;o de faturamento. Podemos fazer a gest&atilde;o da rede e principalmente monitoriza&ccedil;&atilde;o do uso de telefones para determinar o
						volume de utiliza&ccedil;&atilde;o, bem como o abuso do sistema de telefonia.
						O ASCDR ajuda no planejamento das necessidades de telecomunica&ccedil;&otilde;es do PBX IP.<br>
						<br>
						A an&aacute;lise do CDR permite-lhe:
						<ul>

							<li>Rever com exatid&atilde;o todos os CDRs; 
							<li>Verificar o uso;
							<li>Resolver as discrep&acirc;ncias com fornecedores;
							<li>Desconectar servi&ccedil;os n&atilde;o utilizados;
							<li>Rescindir contratos de aluguel de equipamentos n&atilde;o utilizados;
							<li>Impedir ou detectar fraudes;
							<li>etc ...
						</ul>-->


	<?require("call-log.php");?>


<?}elseif ($section=="section1"){?>

	<?require("call-log.php");?>


<?}elseif ($section=="section2"){?>

	<?require("call-last-month.php");?>

<?}elseif ($section=="section3"){?>

	<?require("call-daily-load.php");?>


<?}

//elseif ($section=="section5"){?>
<!--		<h1>Contato</h1>        		
        <table width="90%">
          
		  <tr> 
            <td>
				<h3>Arezqui Bela<br> <i>Barcelona - Belgium</i></h3>
				<h3>Danielle Schinniger<br> <i>Caranda&iacute; - MG - Brasil</i></h3>
				<h3>Angelo Delphini<br> <i>Conselheiro Lafaiete - MG - Brasil</i></h3>
                <h3>Fabricio Piccinin<br> <i>Barbacena - MG - Brasil</i></h3>
				<h3>Eduardo Reis dos Anjos<br> <i>Porto - Portugal</i></h3>
				<h3>Eduardo Coelho Azevedo<br> <i>Linhares - ES - Brasil</i></h3>
				<br>
				<a href="mailto:support@asterisklibre.org">Nosso e-mail! </a> 
				<br><br><i>Sinta-se livre para nos enviar as suas sugest&otilde;es de forma a melhorar a aplica&ccedil;&atilde;o ;)</i>
            </td>
          </tr>          
          
        </table>
		<br><br><em><strong>&Uacute;ltima atualiza&ccedil;&atilde;o:</strong></em> <?php // =$update?><br>
-->

<? //}else{?>
	<!--<h1>Em breve ...</h1>-->
   
<? //}?>

		
		<br><br><br><br><br><br>
		</div>

<!--			<div class="fedora-corner-br">&nbsp;</div>
			<div class="fedora-corner-bl">&nbsp;</div>-->
		</div>
		<!-- content END -->
		
		<!-- footer BEGIN -->
		<div id="fedora-footer">

			<br>			
		</div>
		<!-- footer END -->
	</body>
</html>
