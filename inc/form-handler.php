<?php
add_action('init', 'handle_contact_form_submission');
function handle_contact_form_submission()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kz_contact_form_nonce']) && wp_verify_nonce($_POST['kz_contact_form_nonce'], 'kz_contact_form')) {
        if (!empty($_POST['honeypot_field'])) return;

        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name  = sanitize_text_field($_POST['last_name']);
        $email      = sanitize_email($_POST['email']);
        $message    = sanitize_textarea_field($_POST['message']);

        $to      = get_option('admin_email');
        $subject = '📩 Yeni İletişim Formu Mesajı';
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        $body    = "
            <strong>İsim:</strong> $first_name<br>
            <strong>Soyisim:</strong> $last_name<br>
            <strong>Email:</strong> $email<br>
            <strong>Mesaj:</strong><br>$message
        ";

        wp_mail($to, $subject, $body, $headers);

        wp_redirect(add_query_arg('contact_status', 'success', wp_get_referer()));
        exit;
    }
}

// Gönderen adı ve maili
add_filter('wp_mail_from_name', fn($name) => 'Kaplan & Zorer - Avukatlık ve Hukuk Bürosu');
add_filter('wp_mail_from', fn($email) => 'iletisim@kzhukuk.com');
