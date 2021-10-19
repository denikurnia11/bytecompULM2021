<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/favicon/favicon-16x16.png" />
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="<?= base_url() ?>/assets/bootstrap-5.1.1/css/bootstrap.min.css" rel="stylesheet" />
    <!-- My Css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css" />

    <title>Bytecomp 2021</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="
                background: linear-gradient(180deg, #6bc1a7 30%, #478484 500%);
            ">
        <div class="container">
            <a class="navbar-brand" href="#">
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url() ?>/assets/img/logo/logo.png" style="height: 75px; width: 75px" alt="logo" />
                </a>
            </a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#lomba">Kompetisi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#timeline">TimeLine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#narahubung">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Guidebook</a>
                    </li>
                    <li class="nav-item">
                        <a style="width: 83px;background: #58A391;border-radius: 360px;" class="nav-link" href=" <?= base_url(); ?>/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <section class="masthead">
        <div class="container intro-text text-center">
            <div class="row">
                <div class="col">
                    <span class="intro-lead-in">Borneo Youth Tech Competition</span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="intro-heading">ByteComp 2021</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <span class="prize-pool">Prize Pool</span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <span class="prize">IDR 12.000.000</span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <a href="#info" class="selengkapnya mt-5" id="info">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Wave -->
    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
			<path
				fill="#478484"
				fill-opacity="1"
				d="M0,224L40,202.7C80,181,160,139,240,128C320,117,400,139,480,154.7C560,171,640,181,720,165.3C800,149,880,107,960,112C1040,117,1120,171,1200,170.7C1280,171,1360,117,1400,90.7L1440,64L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"
			></path>
		</svg> -->

    <!-- Informasi -->
    <section class="info">
        <div class="container">
            <div class="row">
                <div class="
                            col-lg-3 col-12
                            offset-lg-1
                            text-center text-lg-start
                            mb-5
                        ">
                    <img class="img-fluid" src="<?= base_url() ?>/assets/img/logo/logo2.png" alt="Logo Bytecomp" />
                </div>
                <div class="
                            col-lg-7 col-12
                            offset-lg-1
                            text-center text-lg-start
                        ">
                    <h2 class="info-judul">Apa Itu ByteComp?</h2>
                    <p class="info-isi">
                        Borneo Youth Tech Competition atau ByteComp
                        merupakan acara tahunan Program Studi Ilmu Komputer
                        Universitas Lambung Mangkurat (ULM). Dengan tema
                        <b>“Be Competitive in New Digital Era with
                            Creative and Ingenious Attitude.”</b>
                        disini kami mengajak partisipasi langsung
                        pelajar-pelajar SLTA sederajat untuk berkompetisi
                        mengadu ide dan pemikiran pada 4 cabang lomba yang
                        ada di ByteComp 2021. Lomba-lomba yang diadakan
                        antara lain Web Design, Olimpiade Komputer, Desain
                        Grafis, dan Video Kreatif.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mountains -->
    <div class="mountains">
        <img src="<?= base_url() ?>/assets/img/bg/mountains.png" style="width: 100%" />
    </div>

    <!-- Lomba -->
    <section class="lomba" id="lomba">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <span class="head-lomba">Perlombaan</span>
                </div>
            </div>
            <div class="row mt-5 justify-content-around">
                <div class="col-lg-3 col-md-5 mt-3 card-lomba">
                    <!-- <a href="#web-design" data-bs-toggle="modal">
                            <div class="card-lomba"></div>
                        </a> -->
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <img src="<?= base_url() ?>/assets/img/logo/Video_Kreatif.png" style="width: 279px; margin-top:41px;">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 6px;">
                        <div class="col text-center">
                            <span class="judul-lomba">Video Kreatif</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 mt-3 card-lomba">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <img src="<?= base_url() ?>/assets/img/logo/Desaind_Poster.png" style="width: 279px; margin-top:27px;">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 26px;">
                        <div class="col text-center">
                            <span class="judul-lomba">Desain Poster</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 mt-3 card-lomba">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <img src="<?= base_url() ?>/assets/img/logo/Desaind_Web.png" style="width: 279px; margin-top:41px; margin-right:7px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center" style="margin-top: 28px;">
                            <span class="judul-lomba">Desain Website</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 mt-3 card-lomba">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <img src="<?= base_url() ?>/assets/img/logo/Olimpiade.png" style="width: 279px; margin-top:47px; margin-left:7px;">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 34px;">
                        <div class="col text-center">
                            <span class="judul-lomba">Olimpiade Komputer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <!-- Web Design -->
    <div class="modal fade" id="web-design" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Web Design
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Est obcaecati veniam nulla illum repellat rerum impedit
                    quis asperiores iste quisquam itaque perferendis soluta
                    atque, eveniet omnis cum sit sapiente ratione, vero
                    libero incidunt officia temporibus? Animi laudantium,
                    nisi hic totam tempore velit labore veniam. Dolorem
                    saepe non ipsa perferendis qui.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Olimpiade -->
    <div class="modal fade" id="olimpiade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Olimpiade
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Adipisci eaque atque libero, doloribus at minima quod
                    aliquam asperiores in, debitis, saepe tenetur nostrum
                    inventore error tempora perspiciatis quidem harum magnam
                    vel quas. Itaque numquam eveniet corporis libero id
                    expedita modi quod, enim minus, eius dolorum explicabo
                    delectus, dolor sapiente officiis.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Design Grafis -->
    <div class="modal fade" id="desain-grafis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Design Grafis
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Repudiandae beatae labore perspiciatis in quod natus
                    dolor, laudantium tenetur ipsum. Quos, in quod totam
                    quaerat soluta ut mollitia, cumque sint exercitationem
                    impedit alias ipsum eos expedita neque nobis inventore
                    praesentium earum cupiditate veniam architecto provident
                    dolorem ab iste perferendis? Architecto, nemo!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Kreatif -->
    <div class="modal fade" id="video-kreatif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Video Kreatif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Amet accusamus vitae et veniam eum nostrum blanditiis
                    tempora doloremque debitis rem? Ad dolorum, repudiandae
                    eum ipsum ipsa veniam, voluptates magnam dolore suscipit
                    labore iusto eius nam vero aspernatur corporis eaque
                    recusandae? Repudiandae laboriosam officiis aliquid,
                    totam atque possimus dicta officia numquam.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Timeline -->
    <section class="timeline mt-5" id="timeline">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto"><span>Timeline</span></div>
            </div>
        </div>
        <div class="process-wrapper">
            <div id="progress-bar-container">
                <ul>
                    <li class="step step01 active">
                        <div class="step-inner">HOME WORK</div>
                    </li>
                    <li class="step step02">
                        <div class="step-inner">RESPONSIVE PART</div>
                    </li>
                    <li class="step step03">
                        <div class="step-inner">Creative cREATIONS</div>
                    </li>
                    <li class="step step04">
                        <div class="step-inner">TESTIMONIALS PART</div>
                    </li>
                    <li class="step step05">
                        <div class="step-inner">OUR LOCATIONS</div>
                    </li>
                </ul>

                <div id="line">
                    <div id="line-progress"></div>
                </div>
            </div>

            <div id="progress-content-section">
                <div class="section-content discovery active">
                    <h2>HOME SECTION</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Donec neque justo, consequat non fermentum ac,
                        tempor eu turpis. Proin nulla eros, placerat non
                        ipsum ut, dapibus ullamcorper ex. Nulla in dapibus
                        lorem. Suspendisse vitae velit ac ante consequat
                        placerat ut sed eros. Nullam porttitor mattis mi, id
                        fringilla ex consequat eu. Praesent pulvinar
                        tincidunt leo et condimentum. Maecenas volutpat
                        turpis at felis egestas malesuada. Phasellus sem
                        odio, venenatis at ex a, lacinia suscipit orci.
                    </p>
                </div>

                <div class="section-content strategy">
                    <h2>GALLERY SECTION</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Donec neque justo, consequat non fermentum ac,
                        tempor eu turpis. Proin nulla eros, placerat non
                        ipsum ut, dapibus ullamcorper ex. Nulla in dapibus
                        lorem. Suspendisse vitae velit ac ante consequat
                        placerat ut sed eros. Nullam porttitor mattis mi, id
                        fringilla ex consequat eu. Praesent pulvinar
                        tincidunt leo et condimentum. Maecenas volutpat
                        turpis at felis egestas malesuada. Phasellus sem
                        odio, venenatis at ex a, lacinia suscipit orci.
                    </p>
                </div>

                <div class="section-content creative">
                    <h2>Creative CREATIONS</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Donec neque justo, consequat non fermentum ac,
                        tempor eu turpis. Proin nulla eros, placerat non
                        ipsum ut, dapibus ullamcorper ex. Nulla in dapibus
                        lorem. Suspendisse vitae velit ac ante consequat
                        placerat ut sed eros. Nullam porttitor mattis mi, id
                        fringilla ex consequat eu. Praesent pulvinar
                        tincidunt leo et condimentum. Maecenas volutpat
                        turpis at felis egestas malesuada. Phasellus sem
                        odio, venenatis at ex a, lacinia suscipit orci.
                    </p>
                </div>

                <div class="section-content production">
                    <h2>TESTIMONIALS NOW</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Donec neque justo, consequat non fermentum ac,
                        tempor eu turpis. Proin nulla eros, placerat non
                        ipsum ut, dapibus ullamcorper ex. Nulla in dapibus
                        lorem. Suspendisse vitae velit ac ante consequat
                        placerat ut sed eros. Nullam porttitor mattis mi, id
                        fringilla ex consequat eu. Praesent pulvinar
                        tincidunt leo et condimentum. Maecenas volutpat
                        turpis at felis egestas malesuada. Phasellus sem
                        odio, venenatis at ex a, lacinia suscipit orci.
                    </p>
                </div>

                <div class="section-content analysis">
                    <h2>OUR LOCATIONS</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Donec neque justo, consequat non fermentum ac,
                        tempor eu turpis. Proin nulla eros, placerat non
                        ipsum ut, dapibus ullamcorper ex. Nulla in dapibus
                        lorem. Suspendisse vitae velit ac ante consequat
                        placerat ut sed eros. Nullam porttitor mattis mi, id
                        fringilla ex consequat eu. Praesent pulvinar
                        tincidunt leo et condimentum. Maecenas volutpat
                        turpis at felis egestas malesuada. Phasellus sem
                        odio, venenatis at ex a, lacinia suscipit orci.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sponsorship -->
    <section class="sponsor mt-5" id="sponsor">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <span class="head-sponsor">Sponsorship</span>
                </div>
            </div>
            <div class="row mt-5 justify-content-around">
                <div class="col-3 card-sponsor mt-4"></div>
                <div class="col-3 card-sponsor mt-4"></div>
                <div class="col-3 card-sponsor mt-4"></div>
                <div class="col-3 card-sponsor mt-4"></div>
            </div>
        </div>
    </section>

    <!-- Narahubung -->
    <section class="narahubung mt-5" id="narahubung">
        <div class="container">
            <div class="row justify-content-center head-narahubung">
                <div class="col-auto">
                    <span>Narahubung</span>
                </div>
            </div>
            <div class="row mt-4">
                <h4>Diaken Ramadhani Yoseph</h4>
                <p class="text-muted">
                    No. HP (WA): 087830397806
                </p>
                <h4>Dwa Meizadewa</h4>
                <p class="text-muted">
                    No. HP (WA): 089698786852
                </p>
            </div>
        </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?= base_url() ?>/assets/bootstrap-5.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(".step").click(function() {
            $(this).addClass("active").prevAll().addClass("active");
            $(this).nextAll().removeClass("active");
        });

        $(".step01").click(function() {
            $("#line-progress").css("width", "3%");
            $(".discovery")
                .addClass("active")
                .siblings()
                .removeClass("active");
        });

        $(".step02").click(function() {
            $("#line-progress").css("width", "25%");
            $(".strategy")
                .addClass("active")
                .siblings()
                .removeClass("active");
        });

        $(".step03").click(function() {
            $("#line-progress").css("width", "50%");
            $(".creative")
                .addClass("active")
                .siblings()
                .removeClass("active");
        });

        $(".step04").click(function() {
            $("#line-progress").css("width", "75%");
            $(".production")
                .addClass("active")
                .siblings()
                .removeClass("active");
        });

        $(".step05").click(function() {
            $("#line-progress").css("width", "100%");
            $(".analysis")
                .addClass("active")
                .siblings()
                .removeClass("active");
        });

        // Navbar scroll
        (function() {
            var documentElem = $(document),
                nav = $("nav"),
                lastScrollTop = 0;

            documentElem.on("scroll", function() {
                var currentScrollTop = $(this).scrollTop();

                // scroll down
                if (currentScrollTop > lastScrollTop)
                    nav.addClass("navbar-scroll");
                // scrollTop
                else nav.removeClass("navbar-scroll");

                lastScrollTop = currentScrollTop;
            });
        })();
    </script>
</body>

</html>