
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container d-flex justify-content-between">
        <a class="" href="#">
            <img class="logo" src="{{ asset(config('constants.asset_path').'assets/front/images/logo.png') }}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">{{__('Home')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('studio')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('Lounge')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('contact')}}</a>
                </li>
                <li style="display: none" class="custom_nav" >
                    <div class="contact_info d-flex">
                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                </span>
                        <div class="info">
                            <h4>02841 4062387</h4>
                            <p>{{__('call us')}}</p>
                        </div>
                    </div>
                </li>
                <li style="display: none"  class="custom_nav">
                    <div class="contact_info d-flex">
                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                </span>
                        <div class="info">
                            <h4>02841 4062387</h4>
                            <p>{{__('call us')}}</p>
                        </div>
                    </div>
                </li>

            </ul>
        </div>

            <div class="contact_info d-flex">
                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                </span>
                <div class="info">
                    <h4>02841 4062387</h4>
                    <p>{{__('call us')}}</p>
                </div>
          
            </div>

    </div>
</nav>
