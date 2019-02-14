<?php

$where_form_is="http://".$_SERVER['SERVER_NAME'].strrev(strstr(strrev($_SERVER['PHP_SELF']),"/"));

session_start();
// if( ($_SESSION['security_code']==$_POST['security_code']) && (!empty($_POST['security_code'])) ) {
// File upload handling
if($_FILES['anexo']['name']!=''){
$field_4_filename = "cv_".date("sihdmY").substr($_FILES['anexo']['name'],strlen($_FILES['anexo']['name'])-4);
if(!move_uploaded_file($_FILES['anexo']['tmp_name'], "./files/".$field_4_filename)){
die("File " .  $_FILES['anexo']['name'] . " was not uploaded.");
}
}

// Checkbox handling
// $field_5_opts = $_POST['field_5'][0].",". $_POST['field_5'][1].",". $_POST['field_5'][2].",". $_POST['field_5'][3].",". $_POST['field_5'][4].",". $_POST['field_5'][5];
$field_5_opts = $_POST['field_5'][0].",". $_POST['field_5'][1].",". $_POST['field_5'][2].",". $_POST['field_5'][3].",". $_POST['field_5'][4].",". $_POST['field_5'][5].",". $_POST['field_5'][6].",". $_POST['field_5'][7].",". $_POST['field_5'][8].",". $_POST['field_5'][9].",". $_POST['field_5'][10].",". $_POST['field_5'][11].",". $_POST['field_5'][12];

//      Formulário
// =================================================== //

// campos

$data                   = date("d/m/Y - H:i");
$nome                   = $_POST['nome_candidato'];
$email                  = $_POST['email_candidato'];
$telefone               = $_POST['Telefone'];
$salario                = $_POST['pretensao-salarial'];
$url_perfil             = $_POST['linkedin_candidato'];

//      EMAIL QUE CHEGA ATE VOCE
// =================================================== //

//$para        = "mhigaki@svlabs.com.br,luciana@svlabs.com.br,shirae@svlabs.com.br";
$para          = "mhigaki@svlabs.com.br";
$titulo        = "Formulário :: OPORTUNIDADES";
$header        = "
<b>Nome:</b>    $nome <br>
<b>E-Mail:</b>    $email <br>
<b>Telefone:</b>    $telefone <br>
<b>Pretenção Salarial:</b>   $salario <br>
<b>Linkedin:</b>   $url_perfil<br>
<br>
<b>Anexo CV:</b> ".$where_form_is."files/".$field_4_filename." (original file name: " . $_FILES['anexo']['name'] . ") <br>
<br>
<b>Assunto:</b>	$titulo <br>
<br>
<b>Cargos Selecionados:</b><br>
<br>
$field_5_opts
<br>
<br>
";

// Funcao HTML
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html;charset=utf-8\r\n";
$headers .= "From: SVLabs <faleconosco@svlabs.com.br>\r\n";

$resp_assunto   = "$titulo";
$header2                = "
<br>
Olá <b>$nome</b>,<br>
<br>
Obrigado pelo envio do seu currículo.<br>
<br>
<br>
==============================================<br>
      Atenciosamente,<br>
      <br>
      SVLabs - The Systems Validation Company<br>
==============================================<br>
";

// Funcao HTML
$headers2 .= "MIME-Version: 1.0\r\n";
$headers2 .= "Content-type: text/html;charset=utf-8\r\n";
$headers2 .= "From: SVLabs <faleconosco@svlabs.com.br>\r\n";

// Envia para voc�
mail($para,$titulo,$header,$headers);

// Envia para quem preencheu o form
mail($email, $resp_assunto, $header2,$headers2);

include("confirm.html");
// }
// echo "Invalid Captcha String.";
// }
?>
