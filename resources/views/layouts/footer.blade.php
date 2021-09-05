<footer class="footer">

    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-about">
                        <div class="footer-logo">
                            <img src="{{ asset('assets/img/footer-logo.png') }}" alt="logo">
                        </div>
                        <div class="footer-about-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <div class="social-icon">
                                <ul>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">Para Estudantes</h2>
                        <ul>
                            @guest
                            <li><a href="{{ route('login') }}"><i class="fas fa-angle-double-right"></i> Login</a></li>
                            <li><a href="{{ route('register') }}"><i class="fas fa-angle-double-right"></i> Cadastro</a></li>
                            @else
                            <li><a href="{{ route('resultados.index') }}"><i class="fas fa-angle-double-right"></i>Meus Resultados</a></li>
                            <li><a href="{{ route('pedidos.index') }}"><i class="fas fa-angle-double-right"></i>Cursos Pagos</a></li>
                            <li><a href="{{ route('perfil.index') }}"><i class="fas fa-angle-double-right"></i>Meu Perfil</a></li>
                            @endguest
                        </ul>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">Para Tutores</h2>
                        <ul>
                            @guest
                            <li><a href="{{ route('login') }}"><i class="fas fa-angle-double-right"></i> Login</a></li>
                            <li><a href="{{ route('register') }}"><i class="fas fa-angle-double-right"></i> Cadastro</a></li>
                            @else
                            <li><a href="{{ route('login') }}"><i class="fas fa-angle-double-right"></i> Linkar Curso</a></li>
                            <li><a href="{{ route('login') }}"><i class="fas fa-angle-double-right"></i> Cursos</a></li>
                            <li><a href="{{ route('login') }}"><i class="fas fa-angle-double-right"></i> Painel de Controle</a></li>
                            @endguest
                        </ul>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-contact">
                        <h2 class="footer-title">Contacte-nos</h2>
                        <div class="footer-contact-info">
                            <div class="footer-address">
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                <p> 24 de Julho, Ahmed Sekou Toure,<br> Maputo, MZ 11100 </p>
                            </div>
                            <p>
                                <i class="fas fa-phone-alt"></i>
                                +258 84 524 8888
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-envelope"></i>
                                info@academiadesenvolver.co.mz
                            </p>
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

            </div>
        </div>
    </div>
    <!-- /Footer Top -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container-fluid">

            <!-- Copyright -->
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="copyright-text">
                            <p class="mb-0">Criadao & Sustentado por <a href="tel:+258825248888">Kelton Cumbe</a>.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">

                        <!-- Copyright Menu -->
                        <div class="copyright-menu">
                            <ul class="policy-menu">
                                <li><a href="{{ route('termos.index') }}">Termos e Condiçoes</a></li>
                                <li><a href="{{ route('termos.index') }}">Politicas</a></li>
                            </ul>
                        </div>
                        <!-- /Copyright Menu -->

                    </div>
                </div>
            </div>
            <!-- /Copyright -->

        </div>
    </div>
    <!-- /Footer Bottom -->

</footer>