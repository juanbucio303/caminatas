<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Caminatas caninas</title>
        <link rel="shortcut icon" href="img/2-1.png" >
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mdb.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/lightbox.css">
        <link rel="stylesheet" href="css/walk.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
        <script src="js/popper.min.js" charset="utf-8"></script>
        <script src="js/mdb.min.js" charset="utf-8"></script>
        <script src="js/bootstrap.min.js" charset="utf-8"></script>
        <script src="js/lightbox.js" charset="utf-8"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/fontawesome-all.js" charset="utf-8"></script>
        <script src="js/parallax.js" charset="utf-8"></script>
        <script src="js/scrollreveal.js"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <script src="js/intern/init.js?v=<?php echo(rand()); ?>"></script>

        <style>
          .fade-in {
            animation: fadeIn ease 5s;
            -webkit-animation: fadeIn ease 5s;
            -moz-animation: fadeIn ease 5s;
            -o-animation: fadeIn ease 5s;
            -ms-animation: fadeIn ease 5s;
            }
            @keyframes fadeIn {
            0% {opacity:0;}
            100% {opacity:1;}
            }

            @-moz-keyframes fadeIn {
            0% {opacity:0;}
            100% {opacity:1;}
            }

            @-webkit-keyframes fadeIn {
            0% {opacity:0;}
            100% {opacity:1;}
            }

            @-o-keyframes fadeIn {
            0% {opacity:0;}
            100% {opacity:1;}
            }

            @-ms-keyframes fadeIn {
            0% {opacity:0;}
            100% {opacity:1;}
            }

            @keyframes myanimation {
              0%   {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1)
              }
              50%  {
                -webkit-transform: scale(2);
                -moz-transform: scale(2);
                -o-transform: scale(2);
                -ms-transform: scale(2);
                transform: scale(2)
              }
              100%  {
                -webkit-transform: scale(1);
                -moz-transform: scale(1);
                -o-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1)
              }
            }

            #div {
              width: 100px;
              height: 100px;
              position: relative;
              left: 50px;
              top: 50px;
              background-color:rgba(21,21,21,0);
              animation-name: myanimation;
              animation-duration: 5s;
              animation-iteration-count: infinite;
            }
        </style>

        <script>
            
            $(document).ready(function(){
              localStorage.clear()
              $(".seeMore").hide()
              $(".btn-see-less").hide()

                $(".ing").hide();

                $('.botonF1').click(function(){
                  $('.btn').addClass('animacionVer');
                })
                $('.contenedor').mouseleave(function(){
                  $('.btn').removeClass('animacionVer');
                })
                var id = 0
                $(".btn-see").click(function(){
                  id = $(".text-news").data("id");
                  $(".btn-see").hide();
                  $(".btn-see-less").show();
                  $(".seeMore").show();
                })
                $(".btn-see-less").click(function(){
                  $(".btn-see-less").hide();
                  $(".btn-see").show();
                  $(".seeMore").hide();
                })

                $(".toAdopt").click(function(){
                  window.location.href = "#adoption"
                })

                $(".mailpetadop").click(function(){
                  window.open("https://mail.google.com/mail/?compose=1&view=cm&fs=1&to=info@ayudog.com&su=subject&body=hola buen dia",'_blank');
                })

                $(".mailtoInfo").click(function(){
                  window.open("https://mail.google.com/mail/?compose=1&view=cm&fs=1&to=info@ayudog.com&su=subject&body=hola buen dia",'_blank');
                })

                $("#btn-show-adoption").click(function(){
                  $(".adopt-hiden").removeClass("d-none");
                  $("#btn-show-adoption").addClass("d-none");
                  $("#btn-hide-adoption").removeClass("d-none");
                })

                $("#btn-hide-adoption").click(function(){
                  $(".adopt-hiden").addClass("d-none");
                  $("#btn-hide-adoption").addClass("d-none");
                  $("#btn-show-adoption").removeClass("d-none");
                })
            })

        </script>
        
    </head>
  
    <body>
      <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-storage.js"> </script>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-firestore.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-messaging.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-functions.js"></script>
        <script src="js/intern/data.js?v=<?php echo(rand()); ?>"></script>

        <script>
          $(document).ready(function(){
            
            $('.main').hide()
            readWalkData2()
            readAdoptionData()
            readNewsData()
            setTimeout(function(){$(".main").show("");$("#load").hide();},4000)
            setTimeout(function(){$('.parallax-window').parallax({imageSrc: 'img/perro_walk_2.jpg'});$(".mask").addClass("d-none")},4500)
            
            
            $("#newsRender").on("click", ".btn-see", function(){
              var id = $(this).data("id")
              $(".seeLess"+id).addClass("d-none")
              $(".seeMore"+id).removeClass("d-none")
            })
            $("#newsRender").on("click", ".btn-see-less", function(){
              var id = $(this).data("id")
              $(".seeMore"+id).addClass("d-none")
              $(".seeLess"+id).removeClass("d-none")

            })
            $("#adoptionRender").on("click",".seeDetail", async function(){
              $("#genero").html($(this).data("genero"))
              $("#nombre").html($(this).data("nombre"))
              var desc = $(this).data("descripcion").replaceAll("\n","<br>")
              $("#descripcion").html(desc)
              $("#desparasitado").html("Desparasitado: "+$(this).data("desparasitado"))
              $("#edad").html($(this).data("edad"))
              $("#tamanio").html($(this).data("tamanio"))
              $("#vacunado").html("Vacunado: "+$(this).data("vacunado"))
              $("#esterilizado").html("Esterilizado: "+$(this).data("esterilizado"))
              
              $("#imagen").attr("src", $(this).data("image"))
            
              $("#infoModal").modal("show")
            })

            $("#showElements").click(function(){
              $(".maxElements").addClass("minElements")
              $(".maxElements").removeClass("maxElements")
              $(this).addClass("d-none")
              $("#hideElements").removeClass("d-none")
            })

            $("#hideElements").click(function(){
              $(".minElements").addClass("maxElements")
              $(".minElements").removeClass("minElements")
              $(this).addClass("d-none")
              $("#showElements").removeClass("d-none")
            })

            $("#showElementsNews").click(function(){
              $(".maxElementsNews").addClass("minElementsNews")
              $(".maxElementsNews").removeClass("maxElementsNews")
              $(this).addClass("d-none")
              $("#hideElementsNews").removeClass("d-none")
            })

            $("#hideElementsNews").click(function(){
              $(".minElementsNews").addClass("maxElementsNews")
              $(".minElementsNews").removeClass("minElementsNews")
              $(this).addClass("d-none")
              $("#showElementsNews").removeClass("d-none")
            })

            $("#showElementsWalk").click(function(){
              $(".maxElementsWalk").addClass("minElementsWalk")
              $(".maxElementsWalk").removeClass("maxElementsWalk")
              $(this).addClass("d-none")
              $("#hideElementsWalk").removeClass("d-none")
            })

            $("#hideElementsWalk").click(function(){
              $(".minElementsWalk").addClass("maxElementsWalk")
              $(".minElementsWalk").removeClass("minElementsWalk")
              $(this).addClass("d-none")
              $("#showElementsWalk").removeClass("d-none")
            })
            
            $("#walkRender").on("click",".showData", function(){
              var id = $(this).data("id")
              $("#data-"+id).removeClass("d-none")
              $("#arrow-"+id).removeClass("d-none")
              $(this).addClass("d-none")
            })

            $("#walkRender").on("click",".hideData", function(){
              var id = $(this).data("id")
              $("#data-"+id).addClass("d-none")
              $(this).addClass("d-none")
              $("#arrow-down-"+id).removeClass("d-none")
            })
            
            $('.navbutton').click(function(){
                $('.navbar-collapse').collapse('hide');
            });
          })
        </script>
        <style>
          .maxElements {
            display: none;
          }
          .maxElementsNews {
            display: none;
          }
          .maxElementsWalk {
            display: none;
          }
          iframe {
            max-width: 100%;
          }
          .tam {
            width: 25%;
          }
          @media only screen and (max-width: 600px) {
            .tam {
              width: 60%;
            }
          }

          @media only screen and (min-width: 600px) {
            .tam {
              width: 75%;
            }
          }

          .iconDog {
              height: 80px;
              width: 180px;
          }
          .iconWalk {
            height: 80px;
          }

          @media only screen and (max-width: 420px) {
            .iconDog {
              height: 70px;
              width: 130px;
            }
            .iconWalk {
              height: 70px;
            }
          }

          @media only screen and (max-width: 320px) {
            .iconDog {
              height: 55px;
              width: 110px;
            }
            .iconWalk {
              height: 60px;
            }
          }

          @media only screen and (min-width: 768px) {
            .tam {
              width: 40%;
            }
          }
          
        </style>
        <div class="container" id="load">
          <div class="row" >
              <div class="col-12">
                <div class="text-center">
                  <img src="img/favicon.png"  class="animate__animated animate__pulse animate__infinite	infinite tam" style="height: auto;" alt="">
                  <p><strong class="text-white">Cargando... </strong></p>
                </div>
              </div>
          </div>
        </div>
          <nav class="navbar navbar-expand-lg navbar-dark bg-hue fixed-top main">
            <div class="container">
              <a class="navbar-brand px-lg-4 mr-0 d-lg-none" href="#home">
                <img src="img/caminata_white.png" class="animate__animated animate__bounce iconWalk" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
              aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <a class="navbar-brand px-lg-4 mr-0 d-lg-none" href="#home">
                <img src="img/ayudog_nav.png" class="animate__animated animate__bounce iconDog" alt="">
              </a>
              <div class="collapse navbar-collapse justify-content-center font-weight-bold" id="basicExampleNav">
                <a class="navbar-brand px-lg-4 mr-0 d-none d-lg-block" data-scroll href="#home">
                <img src="img/caminata_white.png" class="animate__animated animate__bounce" style="height: 90px;width: 150px;" alt="">
                </a>
                <ul class="navbar-nav">
                  <li class="nav-item font3" style="margin: auto;">
                    <a class="nav-link" data-scroll href="About">
                      <div class="esp animate__animated animate__bounce">
                        Acerca de nosotros
                      </div>
                      <div class="ing">
                        <i class="fa fa-envelope" aria-hidden="true"></i> About
                      </div>
                    </a>
                  </li>
                    <li class="nav-item font3" style="margin: auto;">
                      <div class="d-none d-lg-block">
                        <a class="nav-link" class="btn" href="#walk">
                        <div class="esp animate__animated animate__bounce">
                          Caminatas Caninas
                        </div>
                        <div class="ing animate__animated animate__bounce">
                          Dog Walks
                        </div>
                      </a>
                      </div>
                      <div class="d-block d-md-block d-lg-none">
                        <a class="nav-link navbutton" href="#walk">
                        <div class="esp animate__animated animate__bounce">
                          Caminatas Caninas
                        </div>
                        <div class="ing animate__animated animate__bounce">
                          Dog Walks
                        </div>
                        </a>
                      </div>
                    </li>
                    <li class="nav-item font3" style="margin: auto;">
                      <a class="nav-link navbutton" data-scroll href="#adoption">
                        <div class="esp animate__animated animate__bounce">
                          Adopciones
                        </div>
                        <div class="ing animate__animated animate__bounce">
                          Adoptions
                        </div>
                      </a>
                    </li>
                    <li class="nav-item font3" style="margin: auto;">
                      <a class="nav-link navbutton" data-scroll href="#news">
                        <div class="esp animate__animated animate__bounce">
                          Noticias
                        </div>
                        <div class="ing animate__animated animate__bounce">
                          News
                        </div>
                      </a>
                    </li>
                    <li class="nav-item font3" style="margin: auto;">
                      <a class="nav-link navbutton" data-scroll href="#ubication">
                        <div class="esp animate__animated animate__bounce">
                          Ubicación
                        </div>
                        <div class="ing">
                          <i class="fa fa-envelope" aria-hidden="true"></i> Ubication
                        </div>
                      </a>
                    </li>
                  <li class="nav-item font3" style="margin: auto;">
                    <a class="nav-link navbutton" data-scroll href="#contact">
                      <div class="esp animate__animated animate__bounce">
                        Contáctanos
                      </div>
                      <div class="ing">
                        <i class="fa fa-envelope" aria-hidden="true"></i> Contact
                      </div>
                    </a>
                  </li>
                  <a class="navbar-brand px-lg-4 mr-0 d-none d-lg-block" data-scroll href="https://ayudog.com/">
                    <img src="img/ayudog_nav.png" class="animate__animated animate__bounce" style="height: 80px;width: 160px;" alt="">
                    </a>
              </ul>
            </div>
        
                
          </nav>
  
            <div id="home" class="parallax-window full-height main" style="background:rgba(21,21,21,0.2)"></div>
          
          <div class="container main">
              <div class="contenedor">
                <a class="botonF1 mailtoInfo">
                  <i class="fas fa-envelope" style="color: white;"></i>
                </a>
              </div>
              
              <div class="container" id="walk">
                <div class="color-txt display-4 font-weight-light mt-5 p-4 text-center" style="border-bottom: solid 3px #ff5757;">
                    <div class="row text-center">
                        <div class="col-12">
                            Caminatas Caninas
                        </div>
                    </div>
                </div>
                <div class="row" id="walkRender"></div>
                <div class="row" id="groupButtonWalk">
                  <div style="margin: auto; margin-top: 20px;">
                    <a id="showElementsWalk" class="btn btn-danger">Mostrar más</a>
                    <a id="hideElementsWalk" class="btn btn-danger d-none">Mostrar menos</a>
                  </div>

                  <style>
                    
                  </style>
                </div>
              </div>

              <div class="container" id="adoption" >
                <div class="color-txt display-4 font-weight-light mt-5 p-4 text-center" style="border-bottom: solid 3px #ff5757;">
                  Adopción
                </div>
                <div class="row" id="adoptionRender"></div>
                <div class="row" id="groupButtonAdoption">
                  <div style="margin: auto; margin-top: 20px;">
                    <a id="showElements" class="btn btn-danger">Mostrar más</a>
                    <a id="hideElements" class="btn btn-danger d-none">Mostrar menos</a>
                  </div>
                </div>
              </div>

              
    
              <div class="container" id="news">
                <div class="">
                  <div class="color-txt display-4 font-weight-light mt-5 p-4 text-center" style="border-bottom: solid 3px #ff5757;">
                        Noticias y Avisos
                  </div>
                  <div class="row" id="newsRender"></div>
                  <div class="row" id="groupButtonNews">
                    <div style="margin: auto; margin-top: 20px;">
                      <a id="showElementsNews" class="btn btn-danger">Mostrar más</a>
                      <a id="hideElementsNews" class="btn btn-danger d-none">Mostrar menos</a>
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="container" id="ubication">
                <div class="color-txt display-4 font-weight-light mt-5 p-4 text-center" style="border-bottom: solid 3px #ff5757;">
                    Ubicación
                </div>
                <div class="row" style="margin-top: 20px;">
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <p class="text-white" style="font-size: 20px;font-weight: bold;">
                      El Centro Canino se encuentra a 4 km, de la gasera y gasolinera de Los Saúcos, rumbo a Temascaltepec, tomando en la "Y" el camino de la derecha. 
                      <br><br>
                      Encontrarás una recta muy larga y casi al final de esta, se ubica el Centro Canino  a mano izquierda verás el letrero de Centro Canino y Felino de Valle de Bravo. 
                      <br><br>
                      Ten cuidado es una carretera donde transitan a altas velocidades.
                      <br><br>
                      Las adopciones y caminatas son los martes y viernes de 10:30 a 2 pm.</p>
                  </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.7287806477125!2d-100.06066798509815!3d19.1195506870629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDA3JzEwLjQiTiAxMDDCsDAzJzMwLjUiVw!5e0!3m2!1ses!2smx!4v1603858200143!5m2!1ses!2smx" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                  </div>
    
                </div>
              </div>
    
          </div>
    </body>
    <footer class="page-footer font-small blue bg-hue main" style="margin-top: 20px;" id="contact">

        <div class="footer-copyright text-center py-5">
    
            <div class="col-md-12 col-12 "list-inline>
              <div class="row">
                <div class="col-12">
                  <div class="esp">
                    <h5 class="font text-white">Proyecto desarrollado por:
                    </h5>
                  </div>
                  <div class="ing">
                    <h5 class="font text-white">Project developed by:
                    </h5>
                  </div>
                  <div class=" d-lg-none d-print-block">
                    <img src="img/logo-direc.png" width="40%" alt="">
                  </div>
                  <div class=" d-none d-lg-block d-print-block">
                    <img src="img/logo-direc.png" width="10%" alt="">
                  </div>
                </div>
              </div>
              <a href="https://www.facebook.com/Ayudogmx-998884180275726" target="_blank" class="list-inline-item"><h4 class="font"><i class="fab fa-facebook-square" id="fac"></i> /ayudogmx</h4></a>
              <a class="list-inline-item"><h2 class="font3">|</h2></a>
              <a href="https://www.instagram.com/ayudogmx/" target="_blank" class="list-inline-item"><h4 class="font"><i class="fab fa-instagram" id="inst"></i> ayudogmx</h4></a></p>
              <a class="font text-white" style="font-size:1.5em">info@ayudog.com</a>
    
            </div>
    
          </div>
    </footer>

    <!-- Central Modal Small -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <!-- Change class .modal-sm to change the size of the modal -->
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <img id="imagen" src="" style="border-radius: 5px;width: 100%;"  alt="">
              </div>
              <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="row" style="font-weight: bold;font-size: 25px;">
                    <p id="nombre" style="margin: 16px;"></p>
                </div>
                <div class="row">
                  <div class="col-12">
                    <span class="badge badge-pill badge-primary"><p style="margin-bottom: 0px;" id="genero"></p> </span>
                    <span class="badge badge-pill badge-warning"><p style="margin-bottom: 0px;" id="edad"></p> </span>
                    <span class="badge badge-pill badge-success"><p style="margin-bottom: 0px;" id="desparasitado"></p> </span>
                    <span class="badge badge-pill badge-info"><p style="margin-bottom: 0px;" id="vacunado"></p> </span>
                    <span class="badge badge-pill badge-danger"><p style="margin-bottom: 0px;" id="esterilizado"></p> </span>
                    
                    <hr style="background: #ff5757;">
                    <div class="row text-justify" style="margin: 16px;"><p id="descripcion"></p></div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Central Modal Small -->

</html>
