<!--
author: milton noboru higaki
Email: milton.higaki@gmail.com
repositorio git: https://github.com/mhigaki/svlabs
-->
<?php

//      Formulário
// =================================================== //

// campos

$data                   = date("d/m/Y - H:i");
$nome                   = $_POST['Nome'];
$email                  = $_POST['Email'];
$empresa                = $_POST['Empresa'];
$telefone                = $_POST['Telefone'];
$assunto				= $_POST['Assunto'];
$mensagem				= $_POST['Messagem'];

//      Email que chega at� voc�
// =================================================== //


// $para          = "faleconosco@svlabs.com.br,mhigaki@svlabs.com.br,luciana@svlabs.com.br,shirae@svlabs.com.br";
$para 				= "mhigaki@svlabs.com.br";
$titulo        = "Formulário: FALE CONOSCO";
$header         = "
<b>Nome:</b>    $nome <br>
<b>Empresa:</b>    $empresa <br>
<b>Email:</b>   $email<br>
<b>Telefone:</b>   $telefone<br>
<br>
<b>Assunto:</b>	$titulo<br>
<br>
<b>Messagem:</b><br>
<br>
$mensagem
<br>
<br>
";

// Funcao HTML
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html;charset=utf-8\r\n";
$headers .= "From: $nome <$email>\r\n";

//      Resposta que vai ao Cliente/Visitante
// =================================================== //

$resp_assunto   = "Formulário: FALE CONOSCO";
$header2                = "
<br>
Olá <b>$nome</b>,<br>
<br>
Obrigado pelo seu contato.<br>
<br>
Recebemos sua solicitação e em breve entraremos em contato.<br>
<br>
==============================================<br>
        Atenciosamente,<br>
        <br>TESTE DE FORMULARIO
        SVLabs - The Systems Validation Company<br>
==============================================<br>
";

// Funcao HTML
$headers2 .= "MIME-Version: 1.0\r\n";
$headers2 .= "Content-type: text/html;charset=utf-8\r\n";
$headers2 .= "From: SVLabs <faleconosco@svlabs.com.br>\r\n";

// Envia para voc�
mail($para, $assunto, $header, $headers);
// Envia para quem preencheu o form
mail($email, $resp_assunto, $header2,$headers2);

echo "<script>window.location='confirm.html'</script>";
?>
