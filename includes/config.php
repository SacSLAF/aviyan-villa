<?php
// Site-wide settings. Update the contact details below before going live.
$site = [
    'name'      => 'Aviyan Villa',
    'tagline'   => 'Villa & Steak House · Wadduwa, Sri Lanka',
    'address'   => '70 Bhavana Madhyasthanaya Road, 12560 Wadduwa, Sri Lanka',
    'phone'     => '+94 77 261 4571',
    'whatsapp'  => '94772614571',              // Business WhatsApp, digits only - booking requests go here
    'email'     => 'info@aviyanvilla.lk',      // TODO: real email (booking notices go here)
    'price'     => 'US$180',
    'map_query' => '70 Bhavana Madhyasthanaya Road, Wadduwa, Sri Lanka',
];

// Booking requests are appended to this CSV (folder is blocked from the web by .htaccess).
define('BOOKINGS_FILE', __DIR__ . '/../data/bookings.csv');

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
