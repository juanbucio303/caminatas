          firebase.initializeApp(getInit());
          var userAgent = navigator.userAgent || navigator.vendor || window.opera;
          
          function readWalkData2() {
            var cad = "";
            firebase.database().ref('/walk/').once('value').then(async function(snapshot) {
              var cont = 0
              var arr = []
              for(var key in snapshot.val()){
                arr.push(key)
              }
              arr.reverse()
                for(var key in arr){
                    var item = snapshot.val()[arr[key]];
                    var image;
                    //var ref = firebase.storage().ref("walk/");
                    //var tangRef = ref.child(item.fileName);
                    var blank = item.descripcionWalk!=null?item.descripcionWalk:"";
                    var padding = 'style="padding: 0rem;"'
                    var hide = "d-none"
                    if (item.descripcionWalk!=null && item.descripcionWalk.trim()!="") {
                      padding = 'style="max-height: 100px; overflow-y: auto; background:#5C5C5C;"'
                      hide = ""
                    }
                    var number = 6
                    
                    if (/android/i.test(userAgent) || (/iPhone|iPod/.test(userAgent) && !window.MSStream) || /windows phone/i.test(userAgent)) {
                      number = 3   
                    }
                    if(item.type == "mp4"){
                      //var ref = firebase.storage().ref("walk/");
                      //var tangRef = ref.child(item.fileName);
                      image = "repo/video/walk/"+item.fileName//await tangRef.getDownloadURL();
                    }else {
                      image = item.img64 //await tangRef.getDownloadURL();
                    }
                    var con = cont>=number ? "maxElementsWalk":""
                    cad+= '<div class=" col-xs-12 col-sm-12 col-md-4 '+con+' mt-4">'+
                    '<div class="card card-cascade">'+
                      '<div class="view view-cascade" style="background:#5C5C5C;">'
                        if (item.type == "mp4") {
                          cad+= '<iframe style="height: 270px; object-fit: cover; width: 100%; border-radius:5px;" class="card-img-top" src="'+image+'" frameborder="0" allowfullscreen></iframe>'
                        }else{
                          cad+= '<img src="'+image+'" style="height: 270px; object-fit: cover; width: 100%; border-radius:5px;" class="card-img-top" alt="narrower">'
                        }
                        cad+='<a><div class="mask rgba-white-slight"></div></a>'+
                      '</div>'+
                      '<div class="card-body card-body-cascade text-center" '+padding+'>'+
                        '<a class="text-white showData '+hide+'" id="arrow-down-'+key+'" data-id="'+key+'"><i class="fas fa-chevron-down"></i></a>'+
                        '<a class="text-white hideData d-none" id="arrow-'+key+'" data-id="'+key+'"><i class="fas fa-chevron-up"></i></a>'+
                        '<p class="card-text text-white d-none" id="data-'+key+'">'+blank+'</p>'+
                      '</div></div>'
                    
                    cad+= '</div>';
                    cont++
                }
                if (cont <= 9) {
                  $("#groupButtonWalk").addClass("d-none")
                }
                $("#walkRender").html(cad);
            });
          }

          function readWalkData() {
              var cad = "";
              firebase.database().ref('/walk/').once('value').then(async function(snapshot) {
                var cont = 0
                var arr = []
                for(var key in snapshot.val()){
                  arr.push(key)
                }
                arr.reverse()
                var number = 9
          
                if (/android/i.test(userAgent) || (/iPhone|iPod/.test(userAgent) && !window.MSStream) || /windows phone/i.test(userAgent)) {
                  number = 3   
                }
                  for(var key in arr){
                      var item = snapshot.val()[arr[key]];
                      var image;
                      var ref = firebase.storage().ref("walk/");
                      var tangRef = ref.child(item.fileName);
                      var blank = item.descripcionWalk!=null?item.descripcionWalk:"";
                      image = await tangRef.getDownloadURL();
                      var con = cont>=number ? "maxElementsWalk":""
                      cad+= '<div class=" col-xs-12 col-sm-12 col-md-4 container2 '+con+'">'
                      if (item.type == "mp4") {
                        cad+= '<iframe style="height: 270px; object-fit: cover; width: 100%; border-radius:5px;" class="mt-4" src="'+image+'" frameborder="0" allowfullscreen></iframe></iframe>'
                      }else{
                        cad+= '<img src="'+image+'" style="height: 270px; object-fit: cover; width: 100%; border-radius:5px;" class="mt-4" alt="narrower">'
                      }
                      if (blank!=null && blank.trim()!="") {
                        cad+= '<div class="overlay">'+
                        '<div class="row">'+
                          '<div class="offset-1 col-10" style="overflow-y:auto;max-height:100px;">'+
                            '<label class="text-center" style="font-size:14px;font-weight: bold;">'+blank+'</label>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                      }
                      cad+= '</div>';
                      cont++
                  }
                  if (cont <= number) {
                    $("#groupButtonWalk").addClass("d-none")
                  }
                  $("#walkRender").html(cad);

              });
          }

          async function readAdoptionData() {
             
              
              firebase.database().ref('/adoption/').once('value').then(async function(snapshot) {
                var cad = ""
                var cont = 0
                var arr = []
                for(var key in snapshot.val()){
                  arr.push(key)
                }
                arr.reverse()
                var number = 8
          
                if (/android/i.test(userAgent) || (/iPhone|iPod/.test(userAgent) && !window.MSStream) || /windows phone/i.test(userAgent)) {
                  number = 3   
                }
                  for(var key in arr){
                      var item = snapshot.val()[arr[key]];
                      var image;
                      var descripcion = item.descripcion.substring(0, 133)
                      //var ref = firebase.storage().ref("adoption/");
                      //var tangRef = ref.child(item.fileName);
                      image = item.img64 //await tangRef.getDownloadURL()
                      var con = cont>=number ? "maxElements":""
                      if(item.adopted == 1){
                        cad+= '<div class="col-md-3 col-sm-12 col-xs-12" style="margin-top: 10px;">'+
                        '<div class="cardS">'+
                          '<div class="image-box__overlay" style="border-radius: 7px; height: 100%;background-image: url('+image+');background-size: cover;">'+
                            '<div class="image" style="height: 100%;background-color: rgba(0, 0, 0, .5);background-size: cover;">'+
                              '<img style="background-size: cover;width: 60%;height: auto;margin: 20%;margin-top: 65%;" src="img/adoptado-white.png"/>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'
                      }else {
                        cad+= 
                        '<div class="col-md-3 col-sm-12 col-xs-12 '+con+'" style="margin-top: 10px;"><div class="cardS"><div class="image">'+
                          '<img style="background-size: cover;width: 100%;height: 100%;" src="'+image+'"/>'+
                          '</div><div class="details">'+
                            '<div class="center"><h1>'+item.nombre+'<br><span>Perro en adopción</span></h1>'+
                              '<p class="text-justify" style="font-size: 10px;margin-bottom: 0;">'+descripcion+'<a class="seeDetail" data-id="'+key+'" data-genero="'+item.genero+'" data-nombre="'+item.nombre+'" data-descripcion="'+item.descripcion+'" data-desparasitado="'+item.desparasitado+'" data-edad="'+item.edad+'" data-tamanio="'+item.tamanio+'" data-vacunado="'+item.vacunado+'" data-esterilizado="'+item.esterilizado+'" data-image="'+image+'"  style="text-decoration: underline #FF5757; background: none; color:#FF5757;font-weight: bold;"> Ver más</a></p>'+
                              '<table class="table table-sm" style="margin-top: 0; margin-bottom: 0;"><thead><tr><td>Género</td><td>Edad</td><td>Tamaño</td></tr></thead><tbody><tr><td>'+item.genero+'</td><td>'+item.edad+'</td><td>'+item.tamanio+'</td></tr></tbody></table>'+
                              '<div class="btn-group" role="group" aria-label="Basic example">'+
                                '</div></div></div></div></div>'
                      }
                      cont++
                  }
                  if (cont <= number) {
                    $("#groupButtonAdoption").addClass("d-none")
                  }
                  $("#adoptionRender").html(cad);
              });
              
            }

          function readNewsData() {
              var cad = "";
              firebase.database().ref('/news/').once('value').then(async function(snapshot) {
                var cont = 0
                var arr = []
                for(var key in snapshot.val()){
                  arr.push(key)
                }
                arr.reverse()
                var number = 6
          
                if (/android/i.test(userAgent) || (/iPhone|iPod/.test(userAgent) && !window.MSStream) || /windows phone/i.test(userAgent)) {
                  number = 3   
                }
                  for(var key in arr) {
                    var item = snapshot.val()[arr[key]];
                    var image;
                    //var ref = firebase.storage().ref("news/");
                    //var tangRef = ref.child(item.fileName);
                    console.log(item.fileName);
                    if(item.type == "mp4"){
                      image = "repo/video/news/"+item.fileName
                      //var ref = firebase.storage().ref("news/");
                      //var tangRef = ref.child(item.fileName);
                      //image = await tangRef.getDownloadURL();
                    }else {
                      image = item.img64//await tangRef.getDownloadURL();
                    }
                    var text = item.descripcionNews.replaceAll("\n","<br>");
                    var maxLenght = text.substring(0, 87).includes("<br>")?76:87
                    var hideButton = item.descripcionNews.length<=81?"d-none":""
                    var text1 = text.substring(0, maxLenght);
                    var text2 = text.substring(0, text1.lenght);
                    var hideItems = cont>=number ? "maxElementsNews":""
                    if(item.isPrincipal == 1){
                      cad+= '<div class="col-12 '+hideItems+'" style="margin-top:20px;">'+
                        '<div class="row">'+
                          '<div class="col-xs-12 col-sm-12 col-md-4" style="margin: auto;">'
                            if(item.type == "mp4"){
                              //var ref = firebase.storage().ref("news/");
                              //var tangRef = ref.child(item.fileName);
                              //await tangRef.getDownloadURL();
                              cad+= '<iframe style="height: 270px; object-fit: cover; width: 100%; border-radius:5px;" class="mt-4" src="'+image+'" frameborder="0" allowfullscreen></iframe></iframe>'
                            }else {
                              cad+='<img src="'+image+'" style="border-radius: 7%;" class="card-img-top col-12" alt="narrower">'
                            }
                          cad+='</div>'
                          '<div class="col-md-8 col-sm-12 col-xs-12 text-white text-justify">'+item.descripcionNews+'</div>'+
                          '</div>'+
                        '</div>';
                    }else{
                      cad+='<div class="col-xs-12 col-sm-12 col-md-4 text-news '+hideItems+'"><div class="mt-4 text-white" style="overflow: hidden; background: #5c5c5c; border-radius: 5px; min-height: 446.188px;"> <div class="row" style="margin: auto; margin-right: -1rem; margin-left: -1rem;">'
                      if(item.type == "mp4"){
                        cad+= '<iframe style="height: 270px; object-fit: cover; width: 100%; border-radius:5px;" class="mt-4" src="'+image+'" frameborder="0" allowfullscreen></iframe></iframe>'
                      }else {
                        cad+=  '<img src="'+image+'" style="max-height:400px; margin: auto; margin-top: 10px; width: 85%;" class="card-img-top" alt="narrower">'
                      }
                        cad+= '</div><div class="p-4 text-justify seeLess'+key+'">'+text1+' <strong><a class="text-white btn-see '+hideButton+'" id="'+key+'" data-id="'+key+'" style="text-decoration: underline white; font-weight: bold;">Ver más...</a></strong></div><div class="p-4 text-justify seeMore'+key+' d-none" id="'+key+'">'+text2+' <a class="text-white btn-see-less" data-id="'+key+'" id="'+key+'" style="text-decoration: underline white; font-weight: bold;">Ver menos</a></div></div></div>'
                    }
                    cont++
                  }
                  if (cont <= number) {
                    $("#groupButtonNews").addClass("d-none")
                  }
                  $("#newsRender").html(cad);
              });
          }

          function readHomeData() {
            
            var cad = '<div class="carousel-item active"><img class="d-block w-100" style="border-radius: 12px; margin-bottom: 30px;" src="img/collage/collage2.jpg" alt="Second slide"></div>';
            firebase.database().ref('/home/').once('value').then(async function(snapshot) {
                for(var key in snapshot.val()){
                    var item = snapshot.val()[key];
                    var image;
                    var ref = firebase.storage().ref("home/");
                    var tangRef = ref.child(item.fileName);
                    image = await tangRef.getDownloadURL();
                    
                    cad += '<div class="carousel-item"><img class="d-block w-100" style="border-radius: 12px; margin-bottom: 30px;" src="'+image+'" alt="First slide"></div>'   
                }
                $("#carruselId").html(cad);
            });
          }

          function authentication(back) {
              $('#sidebarCollapse').click(function () {
                  $('#sidebar').toggleClass('active');
              });
              if(sessionStorage.length>0){
                if(sessionStorage.access != null || sessionStorage.access != "" || sessionStorage.access != " "){

                    $("#logout").click(function(){
                        firebase.auth().signOut().then(function() {
                        sessionStorage.clear();
                        location.href = back;
                        
                        }).catch(function(error) {
                        sessionStorage.clear();
                        location.href = back;

                        });
                    });
                    
                }else{
                    location.href = back;
                }
            }else{
                location.href = back;
            }
          }

          function readNav() {
            
            firebase.database().ref('/nav/').once('value').then(async function(snapshot) {
              var item;  
              for(var key in snapshot.val()){
                  item = snapshot.val()[key];
                  console.log(item);
              }
              if(item == 0){
                $(".caninNav").removeClass("d-lg-block")
                $(".caninNav").addClass("d-none")
              }
            });
          }

          function readColorData() {
            if(firebase.database().ref('/color/') != null){
              firebase.database().ref('/color/').once('value').then(async function(snapshot) {
                var item;  
                for(var key in snapshot.val()){
                    item = snapshot.val()[key];
                    console.log(item);
                }
                $("#colorPicker").val(item)
                $("#mainBody").css("background", item.color)
              });
            }
          }