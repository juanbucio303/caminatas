firebase.initializeApp(getInit());
            $(document).ready(function(){
                readAdoptionData()
                $("#render").sortable();
                $("#render").disableSelection();
                detectChangeList()
                $("#add").click(function(){
                    $("#modal").modal("show");
                });

                $("#accept").click(function(){
                    var name = $("#nombre").val();
                    var genero = $("#genero").val();
                    var edad = $("#edad").val();
                    var descripcion= $("#descripcionAdoption").val();
                    var tamanio= $("#tamanio").val();
                    var file = $("#file-input-adoption")[0];
                    var vacunado = $("#vacunado").val();
                    var desparasitado = $("#desparasitado").val();
                    var esterilizado = $("#esterilizado").val();
                    var adopted = $("#adopted").val()
                    var items = $(".update-btn")
                    writeAdoption(name, descripcion, genero, edad, tamanio, file, vacunado, desparasitado, esterilizado, adopted, (items.length*-1));
                    
                });

                $("#render").on("click", ".delete-btn",function(){
                    var key = $(this).data("id");
                    var imageName = $(this).data("image");
                    deleteConfirm(key, imageName)
                })

                $("#yesdelete").click(() => {
                    var key = k
                    var imageName = $("#yesdelete").data("image");
                    $("#modalDeleteConfirm").modal("hide")
                    deleteAdoption(key,imageName)
                })

                $("#notDelete").click(() => {
                    $("#modalDeleteConfirm").modal("hide")
                })

                $("#render").on("click", ".update-btn", async function(){
                    var key = $(this).data("id");
                    var imageName = $(this).data("image");
                    var videoName = $(this).data("video");
                    var tamanio = $(this).data("tamanio");
                    var descripcion = $(this).data("description");
                    var edad = $(this).data("edad");
                    var genero = $(this).data("genero");
                    var nombre = $(this).data("name");
                    var vacunado = $(this).data("vacunado");
                    var desparasitado = $(this).data("desparasitado");
                    var esterilizado = $(this).data("esterilizado");
                    var adopted = $(this).data("adopted")
                    
                    $("#key").val(key)
                    $("#nombreE").val(nombre)
                    $("#imageName").val(imageName)
                    $("#tamanioE").val(tamanio)
                    $("#generoE").val(genero)
                    $("#edadE").val(edad)
                    $("#descripcionOptionEdit").val(descripcion)
                    $("#vacunadoE").val(vacunado)
                    $("#desparasitadoE").val(desparasitado)
                    $("#esterilizadoE").val(esterilizado)
                    $("#adoptedE").val(adopted)

                    $("#modalUpdate").modal("show");
                })
                
                $("#acceptEdit").click( function(){
                    var form = getFormData($("#form"));
                    var image = $("#file-input-adoption-edit")[0]; 
                    $("#modalUpload").modal("show")

                    setFileAdoption(form.key, form.imageName, form.nombre, form.descripcion, form.genero, form.edad, form.tamanio, image, form.vacunado, form.desparasitado, form.esterilizado, form.adopted);
                })

                $("#saveList").click(()=>{
                    setList()
                })
            })

            function detectChangeList(){
                $("#render").sortable({
                    start: function(event, ui) {
                        ui.item.data('start_pos', ui.item.index());
                    },
                    stop: function(event, ui) {
                        var start_pos = ui.item.data('start_pos');
                        if (start_pos != ui.item.index()) {
                            // the item got moved
                        }
                    },
                    update: function(event, ui) {
                        $("#saveList").removeClass("d-none");
                    }
                });
            }

            function setList() {
                $(".update-btn").each((i, e)=>{
                    var key = $(e).data("id");
                    firebase.database().ref("adoption/"+key).update({
                        order: i
                    }).then((r) => {
                        console.log("success: "+i);
                    }).catch((e)=>{
                        alert("Ha ocurrido un error inesperado intente más tarde");
                        console.log(e);
                    });
                })
                $("#saveList").addClass("d-none");
            }

            async function readAdoptionData() {
                var cad
                const user_list_item = await (new Promise((resolve) => {
                    firebase.database()
                        .ref(`/adoption/`)
                        .orderByChild("order")
                        .on('child_added', async snapshot => {  
                            var key = snapshot.key
                            var item = snapshot.val()
                            var image;
                        var adopted = "No"
                        adopted = item.adopted == "1"? "Si":"No"
                        image = item.img64//await tangRef.getDownloadURL()
                        if (item.type == "mp4") {
                            var ref = firebase.storage().ref("adoption/");
                            var tangRef = ref.child(item.fileName);
                            image = await tangRef.getDownloadURL()
                        }
                        cad+= '<tr style="cursor:move" class="item">'+
                            '<td>'+
                                '<img style="background-size: cover;width: auto;height: 100px;" src="'+image+'"/>'+
                            '</td>'+
                            '<td>'+
                                item.nombre+
                            '</td>'+
                            '<td>'+
                                item.descripcion.substring(0,50)+
                            '</td>'+
                            '<td>'+
                                item.edad+
                            '</td>'+
                            '<td>'+
                                item.genero+
                            '</td>'+
                            '<td>'+
                                item.tamanio+
                            '</td>'+
                            '<td>'+
                                item.vacunado+
                            '</td>'+
                            '<td>'+
                                item.desparasitado+
                            '</td>'+
                            '<td>'+
                                item.esterilizado+
                            '</td>'+
                            '<td>'+
                                adopted+
                            '</td>'+
                            '<td>'+
                                '<button type="button" class="btn btn-danger btn-sm delete-btn" data-id="'+key+'" data-image="'+item.fileName+'"><i class="fas fa-trash-alt"></i></button>'+
                                '<button type="button" class="btn btn-warning btn-sm update-btn" data-id="'+key+'" data-image="'+item.fileName+'" data-name="'+item.nombre+'" data-description="'+item.descripcion+'" data-edad="'+item.edad+'" data-genero="'+item.genero+'" data-tamanio="'+item.tamanio+'" data-vacunado="'+item.vacunado+'" data-desparasitado="'+item.desparasitado+'" data-video="'+item.video+'" data-esterilizado="'+item.esterilizado+'" data-adopted="'+item.adopted+'"><i class="fas fa-edit"></i></button>'+
                            '</td>'+
                            '</tr>';

                            resolve(snapshot.val());
                        });
                }));

                $("#render").html(cad);
            }

            function readAdoptionData2() {
                var cad = "";
                var ref = firebase.database().ref('/adoption/').orderByChild("order")
                ref.on('value', async function(snapshot) {
                    var arr = []
                    var items = snapshot.val()
                    for(var key in items){
                        arr.push(key)
                    }
                    arr.reverse()
                    for(var key in arr){
                        var item = snapshot.val()[arr[key]];
                        var image;
                        var adopted = "No"
                        adopted = item.adopted == "1"? "Si":"No"
                        image = item.img64//await tangRef.getDownloadURL()
                        if (item.type == "mp4") {
                            var ref = firebase.storage().ref("adoption/");
                            var tangRef = ref.child(item.fileName);
                            image = await tangRef.getDownloadURL()
                        }
                        cad+= '<tr style="cursor:move" class="item">'+
                            '<td>'+
                                '<img style="background-size: cover;width: auto;height: 100px;" src="'+image+'"/>'+
                            '</td>'+
                            '<td>'+
                                item.nombre+
                            '</td>'+
                            '<td>'+
                                item.descripcion.substring(0,50)+
                            '</td>'+
                            '<td>'+
                                item.edad+
                            '</td>'+
                            '<td>'+
                                item.genero+
                            '</td>'+
                            '<td>'+
                                item.tamanio+
                            '</td>'+
                            '<td>'+
                                item.vacunado+
                            '</td>'+
                            '<td>'+
                                item.desparasitado+
                            '</td>'+
                            '<td>'+
                                item.esterilizado+
                            '</td>'+
                            '<td>'+
                                adopted+
                            '</td>'+
                            '<td>'+
                                '<button type="button" class="btn btn-danger btn-sm delete-btn" data-id="'+arr[key]+'" data-image="'+item.fileName+'"><i class="fas fa-trash-alt"></i></button>'+
                                '<button type="button" class="btn btn-warning btn-sm update-btn" data-id="'+arr[key]+'" data-image="'+item.fileName+'" data-name="'+item.nombre+'" data-description="'+item.descripcion+'" data-edad="'+item.edad+'" data-genero="'+item.genero+'" data-tamanio="'+item.tamanio+'" data-vacunado="'+item.vacunado+'" data-desparasitado="'+item.desparasitado+'" data-video="'+item.video+'" data-esterilizado="'+item.esterilizado+'" data-adopted="'+item.adopted+'"><i class="fas fa-edit"></i></button>'+
                            '</td>'+
                            '</tr>';
                    }
                    $("#render").html(cad);
                });
            }
        
            function writeAdoption(nombre, descripcion, genero, edad, tamanio, image, vacunado, desparasitado, esterilizado, adopted, order) {
                $("#modalUpload").modal("show")
                setFileAdoption(null, null, nombre, descripcion, genero, edad, tamanio, image, vacunado, desparasitado, esterilizado, adopted, order);
            }
        
            function deleteConfirm(key, image) {
                $("#modalDeleteConfirm").modal("show")
                k = key
                $("#yesdelete").attr("data-image", image)

            }
            
            function deleteAdoption(key, image){
                $("#modalDelete").modal("show")
                var key = key;
                var image = image;
                var ref = firebase.storage().ref("adoption/");
                var tangRef = ref.child(image);
                if (image.substring(image.length-3).toLowerCase() == "mp4") {
                    tangRef.delete().then(function() {
                        firebase.database().ref('/adoption/'+key).remove()
                        readAdoptionData()
                        setTimeout(()=>{$("#modalDelete").modal("hide")}, 1500)
                        
                    }).catch(function(error) {
                        console.log(error);
                        firebase.database().ref('/adoption/'+key).remove()
                        readAdoptionData()
                        setTimeout(()=>{$("#modalDelete").modal("hide")}, 1500)
                    });
                } else {
                    firebase.database().ref('/adoption/'+key).remove()
                    readAdoptionData()
                    k = ""
                    setTimeout(()=>{$("#modalDelete").modal("hide");}, 1500)
                }
            }
        