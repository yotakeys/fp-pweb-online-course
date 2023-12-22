<footer class="footer pt-20 bg-primary text-black max-w-7xl mx-auto sm:px-2 md:px-6 lg:px-8">
    <div class="footer__container container flex flex-col sm:flex-row justify-between pb-10">
        <div class="schemacode__logo shrink-0 ">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/schemacode-logo.svg') }}" class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>
        </div>
        <div class="footer__data grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="contact__contaiener">
                <h3 class="footer__title text-2xl font-extrabold">Contact</h3>
                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link hover:text-secondary">Email</a>
                    </li>
                    <li>
                        <a href="https://github.com/" class="footer__link hover:text-secondary">Github</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link hover:text-secondary">Fax</a>
                    </li>
                </ul>
            </div>
            <div class="support__container">
                <h3 class="footer__title text-2xl font-extrabold">Support</h3>
                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link hover:text-secondary">Feature Help</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link hover:text-secondary">Updates</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link hover:text-secondary">Privacy & Policy</a>
                    </li>
                </ul>
            </div>
            <div class="footer__group">
                <form action="" class="footer__form grid lg:grid-cols-1 gap-x-1 mb-2 relative">
                    <input type="opinion" placeholder="Opinion" class="footer__input rounded-xl pl-3 pr-12 py-2">
                    <button class="footer__button button absolute inset-y-0 right-0 mr-3 rounded-xl hover:bg-gray-200 px-1">
                        Send <i class="ri-send-plane-fill"></i>
                    </button>
                </form>

                <div class="footer__social">
                    <a href="https://www.facebook.com/" class="footer__social-link hover:text-secondary">
                        <i class="ri-facebook-circle-fill"></i>
                    </a>
                    <a href="https://www.instagram.com/" class="footer__social-link hover:text-secondary">
                        <i class="ri-instagram-fill"></i>
                    </a>
                    <a href="https://www.youtube.com/" class="footer__social-link hover:text-secondary">
                        <i class="ri-youtube-fill"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copy text-center py-10">
        &#169; 2023 Schemacode. All rights reserved.
    </div>
</footer>