<?php 
/*
Template Name: email

*/


get_header();?>

<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC-8');
require 'PHPMailerAutoload.php';

//Email do destinatario FROM
$dest_mail = $_POST["email_receita"];

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Change Charset
$mail->CharSet = 'UTF-8';

//Set the hostname of the mail server
$mail->Host = 'smtp.casadoce.com.br ';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
//Usuário que irá autenticar o SMTP - Use o email completo para gmail
$mail->Username = "site.enovafoods";

//Password to use for SMTP authentication
//Senha do usuário SMTP
$mail->Password = "Enova@123";

//Set who the message is to be sent from
//Para qual o destinatário a mensagem será enviada
$mail->setFrom($_POST["email"], $_POST["email"]);

//Definir qual o email que será respondido
//Set an alternative reply-to address
$mail->addReplyTo($_POST["email"], $_POST["email"]);

//Set who the message is to be sent from
//Para qual o destinatário a mensagem será enviada
$mail->AddAddress('site.enovafoods@enovafoods.com.br', 'Enova Foods');

//Set the subject line
//Definir assunto
$mail->Subject = 'Contato via Website Enova Foods';


//Email body
//Corpo do email completo
$html .= "<table>";
$html .= "	<tr> <td>Nome: </td> <td>". $_POST["nome"] ."</td> </tr>";
$html .= "	<tr> <td>Email: </td> <td>". $_POST["email"] ."</td> </tr>";
$html .= "	<tr> <td>Contato: </td> <td>". $_POST["telefone"] ."</td> </tr>";
$html .= "	<tr> <td>Assunto: </td> <td>". $_POST["assunto"] ."</td> </tr>";
$html .= "	<tr> <td colspan='2'>Mensagem: </td> </tr>";
$html .= "	<tr> <td colspan='2'>". $_POST["mensagem"] ."</td> </tr>";
// $html .= "	<tr> <td>Anexo</td> <td>". $_FILE["arquivo"] ."</td> </tr>";
$html .="</table>";

//Converte o HTML para email em texto limpo
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($html);

//Mensagem caso o mail msgHTML não esteja preenchido
//Replace the plain text body with one created manually
$mail->AltBody = 'Mensagem enviada do site Enova Foods';


if (!$mail->send()) {
	?>
	<header>
		<section class="container-fluid" style="background:url('<?php echo get_theme_root_uri(); ?>/enovafoods/img/email-background.jpg');background-size: cover; background-position: center;">
			<div class="container col-xs-12 col-sm-10 col-md-11 col-lg-8 col-centered">
				<div class="row m-t-80 p-t-50 m-b-80 p-b-50">
					<div class="col-xs-12 col-sm-10 col-md-8 col-lg-7 col-centered">
						<div class="col-xs-12 conteudo-banner-contatos">
							<div class="col-xs-12 text-center m-t-20 m-b-20 ft-w-b ft-s-15">
								<?php _e( 'Falha ao enviar a mensagem.', 'enova-foods'); ?>
							</div>
							<div class="col-xs-12 text-center">
								<a href="<?php print $_SERVER['HTTP_REFERER'];?>">
									<button type="button" class="btn btn-lg pink p-r-50 p-l-50">
										<?php _e( 'Voltar', 'enova-foods'); ?>
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</header>
	<?php
} else {
	?>
	<header>
		<section class="container-fluid" style="background:url('<?php echo get_theme_root_uri(); ?>/enovafoods/img/email-background.jpg');background-size: cover; background-position: center;">
			<div class="container col-xs-12 col-sm-10 col-md-11 col-lg-8 col-centered">
				<div class="row m-t-80 p-t-50 m-b-80 p-b-50">
					<div class="col-xs-12 col-sm-10 col-md-8 col-lg-7 col-centered">
						<div class="col-xs-12 conteudo-banner-contatos">
							<div class="col-xs-12 text-center m-t-20 m-b-20 ft-w-b ft-s-15">
								Mensagem enviada com sucesso.
							</div>
							<div class="col-xs-12 text-center">
								<a href="<?php print $_SERVER['HTTP_REFERER'];?>">
									<button type="button" class="btn btn-lg pink p-r-50 p-l-50">
										Voltar
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</header>
	<?php
}

?>

<?php get_footer(); ?>