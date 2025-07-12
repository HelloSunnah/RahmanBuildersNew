<header class="header">
    <div class="primary-header">
        <div class="container">
            <div class="primary-header-inner">
                <div class="header-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo-dark.png') }}" alt="Logo">
                    </a>
                </div>

                <div class="header-menu-wrap">
                    <ul class="dl-menu">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about.company') }}">About</a></li>
                        <li><a href="{{ route('service') }}">Services</a></li>
                        <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="{{ route('project') }}">Our Projects</a></li>
                                <li><a href="{{ route('team') }}">Our Team</a></li>
                                <li><a href="{{ route('testimonial') }}">Testimonial</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</header>
