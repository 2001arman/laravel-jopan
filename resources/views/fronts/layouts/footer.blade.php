<footer class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 order-1 order-lg-0">
                <h5 class="text-white mb-4 pb-1">{{ __('messages.web.contact_us') }}</h5>
                <div class="footer-info">
                    <div class="d-flex align-items-center footer-info__block mb-3 pb-1">
                        <div class="footer-info__footer-icon fs-5 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-phone text-primary "></i>
                        </div>
                        <a href="tel:+{{ getSettingValue('region_code') }} {{ getSettingValue('contact_no') }}"
                           class="text-decoration-none text-white footer-info__contact-label">
                            +{{ getSettingValue('region_code') }} {{ getSettingValue('contact_no') }}
                        </a>
                    </div>
                    <div class="d-flex align-items-center footer-info__block mb-3 pb-1">
                        <div class="footer-info__footer-icon fs-5 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-envelope text-primary "></i>
                        </div>
                        <a href="mailto:{{getSettingValue('email')}}"
                           class="text-decoration-none text-white footer-info__contact-label">
                            {{ getSettingValue('email') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 order-4 border-top-primary text-center mt-lg-5 mt-4">
                <p class="text-white fw-light py-4 mb-0">{{__('messages.web.all_rights_reserved')}} © {{ date('Y') }} {{ getAppName() }}</p>
            </div>
        </div>
    </div>
</footer>
