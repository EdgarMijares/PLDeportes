<?php
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Ld0mR8UAAAAAFchi8Xf59YrPxrLCV-qVhsdDsQ3',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        echo "<script>alert('Error al enviar el mensaje puedes hacerlo manualmente en ventas@pancholines.com.mx')</script>";
    } else {
        $destino = "ventas@pancholines.com.mx";
        $nombre = $_POST['nombre'];
        $telefono =  $_POST['tel'];
        $email = $_POST["email"];
        $asunto = $_POST["comentario"];

        $comentario = "Nombre: " . $nombre . "\nTelefono: " . $telefono . "\nCorreo: " . $email . "\nMensaje: " . $asunto;

        $asuntode = "Contactar a " . $nombre;
        $headers= 'Form:'.$_POST['email'] . "\r\n" . 'Reply-To:'.$_POST['email']."\r\n".'X-Mailer:PHP/'.phpversion();
        mail($destino, $asuntode, $comentario,  $headers);
        header("Location:home.html");
        //echo '<br><p>CAPTCHA was completed successfully!</p><br>';
    }
?>