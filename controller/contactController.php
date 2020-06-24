<?php

/****************************
* --- LOAD CONTACT PAGE -----
****************************/

function contactPage( $post ) {

    $email = $post['email'];
    $message = $post['message'];

    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email))
    {
        $error_msg = "Format de mail non valide.";
    }
    elseif (empty($message))
    {
        $error_msg = "Veuillez saisir votre message.";
    }
    else
    {
        sendContactMail($email, $message);
        $success_msg = "Votre message a été envoyé à l'équipé CodFlix.";
    }

    require('view/contactView.php');
}

function sendContactMail($userMail, $message) {
    $subject = "Réponse de l'équipe Cod'Flix";
    $header = 'From: '.$userMail.''; // Header of the email to reply the user
    // mail('contact@codflix.com​', $subject, $message, $header); Can't use it right now 
}