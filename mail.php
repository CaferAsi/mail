<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    // E-posta adresinizi buraya girin
    $recipient = "kralimben1988@gmail.com";

    // E-posta başlığı
    $email_subject = "Web sitenizden bir iletişim formu gönderisi: $subject";

    // E-posta içeriği
    $email_content = "İsim: $name\n";
    $email_content .= "E-posta: $email\n\n";
    $email_content .= "Mesaj:\n$message\n";

    // E-posta başlıkları
    $email_headers = "From: $name <$email>";

    // E-postayı gönder
    if (mail($recipient, $email_subject, $email_content, $email_headers)) {
        echo "Mesajınız gönderildi.";
    } else {
        echo "Bir hata oluştu. Lütfen daha sonra tekrar deneyin.";
    }

} else {
    echo "Bu sayfaya doğrudan erişilemez.";
}
?>
