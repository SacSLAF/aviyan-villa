<?php
require_once __DIR__ . '/includes/config.php';

$status = $_GET['status'] ?? '';

// WhatsApp link with the booking details, set by process-booking.php (shown once).
session_start();
$whatsappLink = $_SESSION['whatsapp_link'] ?? '';
unset($_SESSION['whatsapp_link']);

$facilities = [
    ['📶', 'Free WiFi'],
    ['🚐', 'Airport Shuttle'],
    ['🅿️', 'Free Private Parking'],
    ['🍽️', 'Restaurant & Steak House'],
    ['🍸', 'Bar'],
    ['🛎️', 'Room Service'],
    ['❄️', 'Air Conditioning'],
    ['🏋️', 'Fitness Room'],
    ['🧘', 'Yoga Classes'],
    ['🌳', 'Garden & Verandah'],
    ['🛁', 'Open-air Bath'],
    ['🛝', 'Children\'s Playground'],
    ['👨‍👩‍👧', 'Family Rooms'],
    ['♿', 'Facilities for Disabled Guests'],
    ['🐾', 'Pet Friendly (on request)'],
    ['🕐', '24-hour Front Desk'],
];

$gallery = [
    ['g14-garden-gazebo.jpg', 'Thatched garden huts at dusk'],
    ['g01-villa-night.jpg', 'The villa by night'],
    ['g05-steak-house.jpg', 'Aviyan Steak House'],
    ['g03-bedroom.jpg', 'King bedroom'],
    ['g02-living-room.jpg', 'Living room with antique furniture'],
    ['g06-verandah-night.jpg', 'Verandah in the evening'],
    ['g08-garden-path.jpg', 'Garden path'],
    ['g10-lounge.jpg', 'Verandah lounge'],
    ['g07-entrance.jpg', 'Entrance'],
    ['g11-bedroom.jpg', 'Bedroom'],
    ['g12-bathroom.jpg', 'Bathroom'],
    ['g13-sitting-area.jpg', 'Sitting area'],
    ['g09-garden-lawn.jpg', 'Garden lawn'],
    ['g15-french-doors.jpg', 'Colonial-style doors'],
    ['g16-bedroom.jpg', 'Bedroom with seating'],
];

$nearby = [
    'Beaches' => [
        ['Wadduwa Beach', '1.2 km'],
        ['Panadura Beach', '5 km'],
        ['Pothupitiya Beach', '5 km'],
        ['Waskaduwa Beach', '6 km'],
        ['Kalutara Beach', '9 km'],
    ],
    'Attractions' => [
        ['Pohaddaramulla Recreation Club', '4.6 km'],
        ['Kalutara Bodhiya', '11 km'],
        ['Aluthgama Wewa (lake)', '13 km'],
        ['Richmond Castle', '15 km'],
        ['White Heaven Park', '18 km'],
    ],
    'Getting here' => [
        ['Pinwatta Train Station', '1.8 km'],
        ['Wadduwa Train Station', '2.7 km'],
        ['Mount Lavinia Bus Stand', '19 km'],
        ['Bandaranaike International Airport', '60 km'],
    ],
];

include __DIR__ . '/includes/header.php';
?>

<!-- HERO -->
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <p class="eyebrow">Wadduwa · Sri Lanka</p>
        <h1>Aviyan Villa</h1>
        <p class="hero-text">A tranquil four-bedroom garden villa &amp; steak house, a short walk from Wadduwa Beach.</p>
        <div class="hero-actions">
            <a href="#book" class="btn">Reserve Your Stay</a>
            <a href="#rooms" class="btn btn-outline">Explore the Villa</a>
        </div>
        <ul class="hero-badges">
            <li>Entire villa – 278 m²</li>
            <li>4 Bedrooms · 5 Bathrooms</li>
            <li>From <?= e($site['price']) ?> / night</li>
        </ul>
    </div>
</section>

<!-- ABOUT -->
<section id="about" class="section">
    <div class="container two-col">
        <div class="reveal">
            <p class="eyebrow">Welcome</p>
            <h2>A peaceful escape with romance &amp; character</h2>
            <p>Aviyan Villa is a beautifully designed, tranquil villa set on a 70-perch plot with a lush, thick-grown garden, a soft grass patch and a relaxing verandah. Antique-style vintage furniture and quiet corners throughout make it a perfect choice for honeymooners, families and anyone who loves calm, simple living.</p>
            <p>Enjoy candle-light dinners on the verandah, a homely bar with soft music, and steaks cooked the way you like them – all served by our extremely friendly staff.</p>
            <p>It is also an ideal transit stop to recover from jet lag before heading down south to Galle, Mirissa, Ahangama or Tangalle – or to unwind before your flight home.</p>
        </div>
        <div class="reveal">
            <img class="about-image" src="assets/images/about.jpg" alt="Living room opening onto the verandah at Aviyan Villa" loading="lazy">
            <div class="about-stats">
                <div><strong>278 m²</strong><span>Entire place</span></div>
                <div><strong>4</strong><span>Bedrooms</span></div>
                <div><strong>5</strong><span>Bathrooms</span></div>
                <div><strong>1.2 km</strong><span>To the beach</span></div>
            </div>
        </div>
    </div>
</section>

<!-- ROOMS -->
<section id="rooms" class="section section-alt">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Accommodation</p>
            <h2>Villa with Garden View</h2>
            <p>Book the entire villa – up to 10 guests across four bedrooms, a living room and private garden.</p>
        </div>
        <div class="room-card reveal">
            <div class="room-image" style="background-image:url('assets/images/room.jpg')"></div>
            <div class="room-body">
                <h3>Entire Villa · Garden View</h3>
                <ul class="room-beds">
                    <li><strong>Bedroom 1</strong> 1 king bed</li>
                    <li><strong>Bedroom 2</strong> 1 king bed</li>
                    <li><strong>Bedroom 3</strong> 1 king bed</li>
                    <li><strong>Bedroom 4</strong> 1 queen bed</li>
                    <li><strong>Living room</strong> 3 sofa beds</li>
                </ul>
                <ul class="tags">
                    <li>Sleeps 10</li><li>Air conditioning</li><li>5 bathrooms</li><li>Free WiFi</li><li>Garden view</li><li>Private check-in</li>
                </ul>
                <div class="room-footer">
                    <p class="price">From <strong><?= e($site['price']) ?></strong> / night <small>(entire villa)</small></p>
                    <a href="#book" class="btn">Request Booking</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FACILITIES -->
<section id="facilities" class="section">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Amenities</p>
            <h2>Facilities</h2>
        </div>
        <div class="facility-grid">
            <?php foreach ($facilities as [$icon, $label]): ?>
                <div class="facility reveal"><span class="icon"><?= $icon ?></span><?= e($label) ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- DINING -->
<section id="dining" class="section dining">
    <div class="container two-col">
        <div class="reveal">
            <p class="eyebrow">Aviyan Steak House</p>
            <h2>Dining &amp; Bar</h2>
            <p>Our family-friendly on-site restaurant serves breakfast, brunch, lunch, dinner and cocktail hour – from sizzling steaks and chips to local Sri Lankan favourites.</p>
            <p><strong>Cuisines:</strong> Steakhouse, Grill/BBQ, Seafood, Local, Asian, Chinese, Indian, Italian, Mediterranean, Mexican, Pizza &amp; American.</p>
            <p><strong>Breakfast:</strong> Continental, Full English/Irish, American, Asian, Vegetarian, Vegan, Halal &amp; breakfast to go.</p>
            <p><strong>Dietary options:</strong> Halal, Vegetarian, Vegan, Dairy-free.</p>
            <p>Corporate packages available at reasonable prices with prior booking.</p>
        </div>
        <div class="dining-image reveal" style="background-image:url('assets/images/dining.jpg')"></div>
    </div>
</section>

<!-- GALLERY -->
<section id="gallery" class="section section-alt">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Take a look</p>
            <h2>Gallery</h2>
        </div>
        <div class="gallery-grid">
            <?php foreach ($gallery as [$file, $caption]): ?>
                <button class="gallery-item reveal" data-src="assets/images/<?= e($file) ?>" data-caption="<?= e($caption) ?>"
                        style="background-image:url('assets/images/<?= e($file) ?>')">
                    <span><?= e($caption) ?></span>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="lightbox" hidden>
    <button class="lightbox-close" aria-label="Close">&times;</button>
    <img src="" alt="">
    <p class="lightbox-caption"></p>
</div>

<!-- LOCATION -->
<section id="location" class="section">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Area info</p>
            <h2>Location &amp; Nearby</h2>
            <p><?= e($site['address']) ?></p>
        </div>
        <div class="location-grid">
            <div class="map reveal">
                <iframe title="Map of Aviyan Villa" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        src="https://maps.google.com/maps?q=<?= urlencode($site['map_query']) ?>&z=14&output=embed"></iframe>
            </div>
            <div class="nearby reveal">
                <?php foreach ($nearby as $group => $places): ?>
                    <h4><?= e($group) ?></h4>
                    <ul>
                        <?php foreach ($places as [$place, $distance]): ?>
                            <li><span><?= e($place) ?></span><span><?= e($distance) ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- HOUSE RULES -->
<section id="rules" class="section section-alt">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Good to know</p>
            <h2>House Rules</h2>
        </div>
        <div class="rules-grid">
            <div class="rule reveal"><h4>Check-in</h4><p>From 1:00 AM to 11:00 PM. Please let us know your arrival time in advance.</p></div>
            <div class="rule reveal"><h4>Check-out</h4><p>From 8:00 AM to 11:00 AM.</p></div>
            <div class="rule reveal"><h4>Children</h4><p>Children of all ages are welcome. Guests aged 13+ are charged as adults. Cribs and extra beds are not available.</p></div>
            <div class="rule reveal"><h4>Pets</h4><p>Pets are allowed on request. Charges may apply.</p></div>
            <div class="rule reveal"><h4>Cancellation</h4><p>Cancellation and prepayment policies vary by stay. We'll confirm the terms with your booking.</p></div>
            <div class="rule reveal"><h4>Languages</h4><p>English and Tamil spoken.</p></div>
        </div>
    </div>
</section>

<!-- BOOKING -->
<section id="book" class="section book">
    <div class="container">
        <div class="section-head reveal">
            <p class="eyebrow">Reservations</p>
            <h2>Request a Booking</h2>
            <p>Send us your dates and the request will be forwarded to our WhatsApp – we'll confirm availability and price right away.</p>
        </div>

        <?php if ($status === 'success' && $whatsappLink): ?>
            <div class="alert alert-success wa-confirm" data-wa-link="<?= e($whatsappLink) ?>">
                <p><strong>Thank you! Your request has been saved.</strong></p>
                <p>Opening WhatsApp so you can send the booking details to us. Just press <strong>Send</strong> in WhatsApp to complete your request.</p>
                <a href="<?= e($whatsappLink) ?>" class="btn btn-whatsapp" target="_blank" rel="noopener">Send Booking via WhatsApp</a>
            </div>
        <?php elseif ($status === 'success'): ?>
            <div class="alert alert-success">Thank you! Your booking request has been received. We'll get back to you shortly.</div>
        <?php elseif ($status === 'error'): ?>
            <div class="alert alert-error">Sorry, please check the form – some details were missing or invalid.</div>
        <?php endif; ?>

        <form class="booking-form reveal" action="process-booking.php" method="post" novalidate>
            <div class="field">
                <label for="name">Full name *</label>
                <input type="text" id="name" name="name" required autocomplete="name">
            </div>
            <div class="field">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required autocomplete="email">
            </div>
            <div class="field">
                <label for="phone">Phone / WhatsApp</label>
                <input type="tel" id="phone" name="phone" autocomplete="tel">
            </div>
            <div class="field">
                <label for="guests">Guests *</label>
                <select id="guests" name="guests" required>
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <option value="<?= $i ?>" <?= $i === 2 ? 'selected' : '' ?>><?= $i ?> <?= $i === 1 ? 'guest' : 'guests' ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="field">
                <label for="checkin">Check-in *</label>
                <input type="date" id="checkin" name="checkin" required>
            </div>
            <div class="field">
                <label for="checkout">Check-out *</label>
                <input type="date" id="checkout" name="checkout" required>
            </div>
            <div class="field field-full">
                <label for="message">Special requests</label>
                <textarea id="message" name="message" rows="4" placeholder="Airport shuttle, arrival time, dinner reservation…"></textarea>
            </div>
            <!-- Honeypot field to catch spam bots -->
            <input type="text" name="website" class="hp" tabindex="-1" autocomplete="off">
            <p class="form-summary field-full" aria-live="polite"></p>
            <button type="submit" class="btn field-full">Send Booking Request via WhatsApp</button>
        </form>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
