<!--/ footer Star /-->
<section class="section-footer">
    <div class="container">

    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="nav-footer">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="/">Home</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('aboutus')}}">Hakkımızda</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('contact')}}">İletişim</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('faq')}}">SSS</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('references')}}">Referanslarımız</a>
                        </li>
                    </ul>
                </nav>
                <div class="socials-a">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{$setting->facebook}}">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{$setting->twitter}}">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{$setting->instagram}}">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="copyright-footer">
                    <p class="copyright color-text-a">
                        &copy; Copyright
                        <span class="color-a"><a href="https://www.instagram.com/dyguualtunaay_">DUYGU ALTUNAY</a></span> All Rights Reserved.
                    </p>
                </div>
                <div class="credits">
                    <!--
                      All the links in the footer should remain intact.
                      You can delete the links only if you purchased the pro version.
                      Licensing information: https://bootstrapmade.com/license/
                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
                    -->
                    DUYGU ALTUNAY 2025
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ Footer End /-->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!-- JavaScript Libraries -->
<script src="{{ asset('assets')}}/lib/jquery/jquery.min.js"></script>
<script src="{{ asset('assets')}}/lib/jquery/jquery-migrate.min.js"></script>
<script src="{{ asset('assets')}}/lib/popper/popper.min.js"></script>
<script src="{{ asset('assets')}}/lib/bootstrap/{{ asset('assets')}}/js/bootstrap.min.js"></script>
<script src="{{ asset('assets')}}/lib/easing/easing.min.js"></script>
<script src="{{ asset('assets')}}/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{ asset('assets')}}/lib/scrollreveal/scrollreveal.min.js"></script>
<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('assets')}}/js/main.js"></script>

</body>
</html>
