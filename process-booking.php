<?php
require_once __DIR__ . '/includes/config.php';

function back($status)
{
    header('Location: index.php?status=' . $status . '#book');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    back('error');
}

// Bots fill the hidden "website" field; pretend success and drop it.
if (!empty($_POST['website'])) {
    back('success');
}

$name     = trim($_POST['name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$guests   = (int) ($_POST['guests'] ?? 0);
$checkin  = $_POST['checkin'] ?? '';
$checkout = $_POST['checkout'] ?? '';
$message  = trim($_POST['message'] ?? '');

$in    = DateTime::createFromFormat('!Y-m-d', $checkin);
$out   = DateTime::createFromFormat('!Y-m-d', $checkout);
$today = new DateTime('today');

$valid = $name !== ''
    && filter_var($email, FILTER_VALIDATE_EMAIL)
    && $guests >= 1 && $guests <= 10
    && $in && $out && $in >= $today && $out > $in
    && strlen($name) <= 100 && strlen($message) <= 2000;

if (!$valid) {
    back('error');
}

$nights = $in->diff($out)->days;

// Save to CSV
$file  = BOOKINGS_FILE;
$isNew = !file_exists($file);
if ($fp = fopen($file, 'a')) {
    if ($isNew) {
        fputcsv($fp, ['Received', 'Name', 'Email', 'Phone', 'Guests', 'Check-in', 'Check-out', 'Nights', 'Message']);
    }
    // Prefix values that spreadsheet apps would treat as formulas.
    $row = array_map(function ($v) {
        $v = str_replace(["\r", "\n"], ' ', (string) $v);
        return preg_match('/^[=+\-@]/', $v) ? "'" . $v : $v;
    }, [date('Y-m-d H:i:s'), $name, $email, $phone, $guests, $checkin, $checkout, $nights, $message]);
    fputcsv($fp, $row);
    fclose($fp);
}

// Email notification (works once mail/SMTP is configured on the server)
$body = "New booking request - {$site['name']}\n\n"
      . "Name: $name\nEmail: $email\nPhone: $phone\nGuests: $guests\n"
      . "Check-in: $checkin\nCheck-out: $checkout\nNights: $nights\n\nMessage:\n$message\n";
$headers = "From: {$site['email']}\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";
@mail($site['email'], "Booking request: $name ($checkin to $checkout)", $body, $headers);

// Forward to the business WhatsApp: the guest is sent to WhatsApp with the request pre-filled.
$waText = "*New Booking Request - {$site['name']}*\n\n"
        . "Name: $name\nEmail: $email\n" . ($phone !== '' ? "Phone: $phone\n" : '')
        . "Guests: $guests\nCheck-in: " . $in->format('D, d M Y') . "\nCheck-out: " . $out->format('D, d M Y')
        . "\nNights: $nights" . ($message !== '' ? "\n\nSpecial requests: $message" : '');

session_start();
$_SESSION['whatsapp_link'] = 'https://wa.me/' . $site['whatsapp'] . '?text=' . rawurlencode($waText);

back('success');
