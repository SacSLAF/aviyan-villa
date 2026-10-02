<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <a href="#top" class="logo">Aviyan<span>Villa</span></a>
            <p>A tranquil garden villa &amp; steak house in Wadduwa – made for honeymoons, families and relaxed transit stays.</p>
        </div>
        <div>
            <h4>Contact</h4>
            <p><?= e($site['address']) ?></p>
            <p><a href="tel:<?= e(preg_replace('/\s+/', '', $site['phone'])) ?>"><?= e($site['phone']) ?></a></p>
            <p><a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a></p>
        </div>
        <div>
            <h4>Quick Links</h4>
            <p><a href="#rooms">The Villa</a></p>
            <p><a href="#dining">Steak House</a></p>
            <p><a href="#book">Booking Request</a></p>
        </div>
    </div>
    <p class="copyright">&copy; <?= date('Y') ?> <?= e($site['name']) ?> Wadduwa. All rights reserved.</p>
</footer>

<a class="whatsapp-float" href="https://wa.me/<?= e($site['whatsapp']) ?>" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
    <svg viewBox="0 0 24 24" width="28" height="28" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm0 18.2a8.2 8.2 0 0 1-4.2-1.2l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 1 1 12 20.2zm4.5-6.1c-.2-.1-1.5-.7-1.7-.8s-.4-.1-.6.1-.7.8-.8 1-.3.2-.5.1a6.7 6.7 0 0 1-3.3-2.9c-.3-.4.2-.4.7-1.4.1-.2 0-.3 0-.4l-.8-1.8c-.2-.5-.4-.4-.6-.4h-.5a1 1 0 0 0-.7.3 3 3 0 0 0-.9 2.2 5.2 5.2 0 0 0 1.1 2.7 11.8 11.8 0 0 0 4.5 4c1.7.7 2.3.8 3.2.6a2.7 2.7 0 0 0 1.8-1.2 2.2 2.2 0 0 0 .2-1.3c-.1-.1-.3-.2-.5-.3z"/></svg>
</a>

<script src="assets/js/main.js"></script>
</body>
</html>
