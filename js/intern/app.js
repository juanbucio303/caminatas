var k
function setFile(){
    var file = fileInput.files[0];
    var storageUrl = 'prueba/';
    var ref = firebase.storage().ref(storageUrl + file.name);

    ref.put(file).then(function(snapshot) {
    }).catch(function(e){
        console.log(e);
    });
}

function getBase64FromFile(img, callback){
    let fileReader = new FileReader();
    fileReader.addEventListener('load', function(evt){
      callback(fileReader.result);
    });
    fileReader.readAsDataURL(img);
}
  
function setFileWalk(key, fileName, fileItem, descripcion){
    $("#modalUpload").modal("show")
    var file = fileItem.files[0];
    var storageUrl = 'walk/';
    var ref;

    if (key!=null) {
        if (file != null) {
            $("#modalUpload").modal("show");
            ref = firebase.storage().ref(storageUrl + fileName);
            var name = file.name
            var type = name.split('.').pop().toLowerCase()
            console.log(type);
            if (type == "mp4") {
                ref.put(file).then(function() {
                    getBase64FromFile(file, function(base64){
                        firebase.database().ref(storageUrl+key).update({
                            type : type.toLowerCase(),
                            descripcionWalk: descripcion,
                            img64: ""
                        }).then(() => {
                            readWalkData();
                            $("#modalUpload").modal("hide");
                            $("#modalWalkEdit").modal("hide");
                        }).catch((e) => {
                            alert("Ha ocurrido un error inesperado intente más tarde");
                        });
                      });
                }).catch((e) => {
                    $("#modalWalkEdit").modal("hide");
                    $("#modalUpload").modal("hide")
                    alert("Ha ocurrido un error inesperado intente más tarde");
                });
            } else {
                getBase64FromFile(file, function(base64){
                    firebase.database().ref(storageUrl+key).update({
                        type : type.toLowerCase(),
                        descripcionWalk: descripcion,
                        img64: base64
                    }).then(() => {
                        readWalkData();
                        setTimeout(function(){$("#modalUpload").modal("hide");$("#modalWalkEdit").modal("hide");},2000)
                    });
                  });
            }
        }else{
            firebase.database().ref(storageUrl+key).update({
                descripcionWalk: descripcion,
            }).then((res) => {
                readWalkData();
                setTimeout(function(){$("#modalUpload").modal("hide");$("#modalWalkEdit").modal("hide");},2000)
            });
        }
    }else{
        var type = file.name.split('.').pop()
        var name = Date.now()+"."+type
        ref = firebase.storage().ref(storageUrl + name);
        if (type == "mp4") {
            ref.put(file).then(function(snapshot) {
                getBase64FromFile(file, function(base64){
                    firebase.database().ref(storageUrl).push({
                        fileName : name,
                        type : type.toLowerCase(),
                        descripcionWalk: descripcion, 
                        img64: ""
                    }).then((res) => {
                        readWalkData();
                        $("#modalUpload").modal("hide");
                        $("#modalWalk").modal("hide");
                        $("#file-input-walk").val("")
                        $("#descripcionWalk").val("")
                    });
                })
            }).catch(function(e){
                $("#modalUpload").modal("hide");
                alert("Ha ocurrido un error inesperado intente más tarde");
                console.log(e);
            });
        }else {
            getBase64FromFile(file, function(base64){
                firebase.database().ref(storageUrl).push({
                    fileName : name,
                    type : type.toLowerCase(),
                    descripcionWalk: descripcion, 
                    img64: base64
                }).then((res) => {
                    setTimeout(function(){readWalkData();$("#modalUpload").modal("hide");$("#modalWalk").modal("hide");$("#file-input-walk").val("");$("#descripcionWalk").val("");$("#src").attr("src", "")},2000)
                });
            })
        }
    }
}

function setFileNews(key, fileName, fileItem, descripcion, isPrincipal){//Ok
    var file = fileItem.files[0];
    var storageUrl = 'news/';
    var ref;
    if (key != null) {
        if (file != null) {
            $("#modalUpload").modal("show");
            var type = file.name.split('.').pop().toLowerCase()
            if (type == "mp4") {
                ref = firebase.storage().ref(storageUrl + fileName);
                ref.put(file).then(function(snapshot) {
                    getBase64FromFile(file, function(base64){
                        firebase.database().ref(storageUrl+key).update({
                            descripcionNews: descripcion,
                            isPrincipal: isPrincipal,
                            img64: base64
                        }).then((res) => {
                            readNewsData();
                            $("#modalUpload").modal("hide");
                            $("#modalNewsEdit").modal("hide");
                        });
                    })
                }).catch(function(e){
                    $("#modalUpload").modal("hide");
                    alert("Ha ocurrido un error inesperado intente más tarde");
                    console.log(e);
                });
            } else {
                getBase64FromFile(file, function(base64){
                    firebase.database().ref(storageUrl+key).update({
                        descripcionNews: descripcion,
                        isPrincipal: isPrincipal,
                        img64: base64
                    }).then((res) => {
                        readNewsData();
                        $("#modalUpload").modal("hide");
                        $("#modalNewsEdit").modal("hide");
                    });
                })
            }
        }else{
            firebase.database().ref(storageUrl+key).update({
                descripcionNews: descripcion,
                isPrincipal: isPrincipal
            }).then((res) => {
                readNewsData();
                $("#modalUpload").modal("hide");
                $("#modalNewsEdit").modal("hide");
            });
        }
        
    }else{
        var type = file.name.split('.').pop().toLowerCase()
        var name = Date.now()+"."+type
        if (type == "mp4") {
            ref = firebase.storage().ref(storageUrl + name);
            ref.put(file).then(function(snapshot) {
                firebase.database().ref(storageUrl).push({
                    descripcionNews: descripcion,
                    fileName : name,
                    isPrincipal: isPrincipal,
                    type: type
                }).then((res) => {
                    readNewsData();
                    $("#modalUpload").modal("hide");
                    $("#modalNews").modal("hide");
                    $("#descripcionNews").val("");
                    $("#file-input-news").val("");
                    $("#isPrincipal").is(':checked', false);
                });
            }).catch(function(e){
                $("#modalUpload").modal("hide");
                alert("Ha ocurrido un error inesperado intente más tarde");
            });
        }else {
            getBase64FromFile(file, function(base64){
                firebase.database().ref(storageUrl).push({
                    descripcionNews: descripcion,
                    fileName : name,
                    isPrincipal: isPrincipal,
                    type: type,
                    img64:base64
                }).then((res) => {
                    readNewsData();
                    setTimeout(() => {
                        $("#modalUpload").modal("hide");
                        $("#modalNews").modal("hide");
                        $("#descripcionNews").val("");
                        $("#file-input-news").val("");
                        $("#isPrincipal").is(':checked', false);
                     }, 2000)
                });
            })
        }
    }
    
}

function setFileAbout(key, fileName, fileItem, descripcion){
   
    var file = fileItem.files[0];
    
    var storageUrl = 'about/';
    var ref;

    if (key!=null) {
        if(file != null){
            $("#modalUpload").modal("show");
            ref = firebase.storage().ref(storageUrl + fileName);
            ref.put(file).then(function(snapshot) {
                getBase64FromFile(file, function(base64){
                    firebase.database().ref(storageUrl+key).update({
                        descripcionAbout: descripcion,
                        img64: base64
                    }).then((res) => {
                        readAboutData();
                        $("#modalUpload").modal("hide")
                        $("#modalAbout").modal("hide");
                    });
                })
                
            }).catch(function(e){
                alert("Ha ocurrido un error inesperado intente más tarde");
                $("#modalUpload").modal("hide");
                console.log(e);
            })
        }else{
            firebase.database().ref(storageUrl+key).update({
                descripcionAbout: descripcion
            }).then((res) => {
                readAboutData();
                $("#modalAbout").modal("hide");
                $("#modalUpload").modal("hide")
            });
        }
    }else{
        
        $("#modalUpload").modal("show");
        var type = file.name.split('.').pop()
        var name = Date.now()+"."+type
        getBase64FromFile(file, function(base64){
            firebase.database().ref(storageUrl).push({
                descripcionAbout: descripcion,
                fileName : name,
                img64: base64
            }).then((res) => {
                readAboutData();
                $("#modalUpload").modal("hide")
                $("#modalAbout").modal("hide");
            });
        })
    }
    $("#file-input-about").val("")
    $("#keyAbout").val("")
    $("#imageNameAbout").val("")
    $("#descripcionAbout").val("")
    $("#acceptAbout").removeClass("d-none")
    $("#acceptAboutE").addClass("d-none")
    
}

function setFileAdoption(key, imageName, nombre, descripcion, genero, edad, tamanio, fileItem, vacunado, desparasitado, esterilizado, adopted, order){
    var file = fileItem.files[0];
    var storageUrl = 'adoption/';
    var ref;
    if(key!=null){
        ref = firebase.storage().ref(storageUrl + imageName);
        if(file != null){
            $("#modalLoading").modal("show");
            getBase64FromFile(file, function(base64){
                firebase.database().ref(storageUrl+key).update({
                    nombre: nombre,
                    descripcion: descripcion,
                    genero: genero,
                    edad: edad,
                    tamanio: tamanio,
                    vacunado: vacunado,
                    desparasitado: desparasitado,
                    esterilizado: esterilizado,
                    adopted: adopted,
                    img64: base64
                }).then(() => {
                    $("#modalLoading").modal("hide");
                    $("#modalUpload").modal("hide");
                    $("#modalUpdate").modal("hide");
                    $("#modalAdoptionDetail").modal("hide");
                    $("#file-input-adoption-edit").val("")
                    readAdoptionData();
                }).catch(function(e){
                    alert("Ha ocurrido un error inesperado intente más tarde");
                    $("#modalUpload").modal("hide");
                    console.log(e);
                });
            })
        }else{
            firebase.database().ref(storageUrl+key).update({
                nombre: nombre,
                descripcion: descripcion,
                genero: genero,
                edad: edad,
                tamanio: tamanio,
                vacunado: vacunado,
                desparasitado: desparasitado,
                esterilizado: esterilizado,
                adopted: adopted
            }).then(async ()  => {
                $("#modalLoading").modal("hide");
                $("#modalAdoptionDetail").modal("hide");
                setTimeout(function(){ $("#modalUpload").modal("hide");$("#modalUpdate").modal("hide");}, 2000);
                readAdoptionData();
            }).catch(function(e){
                alert("Ha ocurrido un error inesperado intente más tarde");
                $("#modalUpload").modal("hide");
                console.log(e);
            });success = true
        }
    }else{
        var type = file.name.split('.').pop()
        var name = Date.now()+"."+type
        ref = firebase.storage().ref(storageUrl + name);
        getBase64FromFile(file, function(base64){
            firebase.database().ref(storageUrl).push({
                nombre: nombre,
                descripcion: descripcion,
                genero: genero,
                edad: edad,
                tamanio: tamanio,
                fileName : name,
                vacunado : vacunado,
                desparasitado : desparasitado,
                esterilizado: esterilizado,
                adopted: adopted,
                img64: base64, 
                order: order
            }).then(() => {
                setTimeout(() => { 
                    readAdoptionData();
                    $("#modalUpdate").modal("hide");
                    $("#modalUpload").modal("hide");
                    $("#modalAdoption").modal("hide");
                    $("#modal").modal("hide");
                    $("#nombre").val("");
                    $("#genero").val("");
                    $("#edad").val("");
                    $("#descripcionAdoption").val("");
                    $("#tamanio").val("");
                    $("#file-input-adoption").val("");
            }, 2000)
            }).catch(function(e){
                alert("Ha ocurrido un error inesperado intente más tarde");
                $("#modalUpload").modal("hide");
            });
        })
    }
}

function setFileExperience(fileItem){
    var file = fileItem.files[0];// use the Blob or File API.
    //var blob = new Blob(file, {type: 'image/jpge'});
    var storageUrl = 'experience/';
    var ref = firebase.storage().ref(storageUrl + file.name);

    ref.put(file).then(function(snapshot) {
        location.reload()
    }).error(function(e){
        location.reload()
        console.log(e);
    });
}

function setFileHome(key, fileName, fileItem){
    var file = fileItem.files[0];;
    var storageUrl = 'home/';

    if (key!=null) {
        if (file != null) {
            $("#modalUpload").modal("show");
            var name = file.name
            var type = name.split('.').pop()
            getBase64FromFile(file, (base64) =>{
                firebase.database().ref(storageUrl+key).update({
                    type : type.toLowerCase(),
                    img64: base64
                }).then((res) => {
                    readData();
                    setTimeout(()=>{$("#modalUpload").modal("hide");$("#modalEdit").modal("hide");}, 1500)
                });
            })
        }
    }else{
        var type = file.name.split('.').pop()
        var name = Date.now()+"."+type
        getBase64FromFile(file, (base64)=>{
            firebase.database().ref(storageUrl).push({
                fileName : name,
                type : type.toLowerCase(),
                img64: base64
            }).then((res) => {
                readData();
                setTimeout(()=>{$("#modalUpload").modal("hide");$("#modalAdd").modal("hide");}, 1500)
                
            });
        })
    }
}

function setColor(color, key) {
    var storageUrl = 'color/';
    firebase.database().ref(storageUrl).remove()
        firebase.database().ref(storageUrl).push({
            color: color
        }).then(() => {
            readColorData(); 
        });
    
}
