$("#btnnewuser").on("click", function () {
    $(".modal-title").html("Create new user");
    $("#formuser")[0].reset();
    document.getElementById("btnsave").innerText = "save changes";
    $("#Modaluser").modal("show");
});

const validateEmailUser = (email) => {
    var format =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return format.test(email);
};

function validaUser() {
    var valido = true;
    var name = $("#nameuser").val();
    var email = $("#emailuser").val();
    var phone = $("#phoneuser").val();
    var typeRole = $("#typeRole").val();
    var password = $("#passworduser").val();
    var password2 = $("#passwordconfir").val();

    if (name == "") {
        Swal.fire("¡Add User name!");
        $("#nameuser").focus();
        return (valido = false);
    }

    if (phone == "") {
        Swal.fire("¡Add phone!");
        $("#Phone").focus();
        return (valido = false);
    }

    if (password == "") {
        Swal.fire("¡Add password!");
        $("#passworduser").focus();
        return (valido = false);
    }

    if (typeRole == "") {
        Swal.fire("¡Add Rol!");
        return (valido = false);
    }

    if (password != password2) {
        Swal.fire("¡password do not match!");
        return (valido = false);
    }

    if (email != "") {
        if (validateEmailUser(email) == false) {
            Swal.fire("¡Incorrect email format error!");
            //$('#iditemprimero').tab('show');
            return (valido = false);
        }
    }
    return valido;
}

function tblUsers() {
    var usertbl = $("#datatables-reponsiveUser").DataTable();
    usertbl.destroy();

    var usertbl = $("#datatables-reponsiveUser").DataTable({
        responsive: true,
        ajax: {
            url: principalUrl + "condiciones/Users",
            dataSrc: "",
        },
        columns: [
            { data: "name" },
            { data: "email" },
            { data: "phone" },
            {
                data: "id",
                render: function (data) {
                    return (
                        "<div class='btn-group'><button type='button' class='btn mb-1 btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Options </button><div class='dropdown-menu' style=''><a class='dropdown-item opcionesUser' id='editUser' href='#'><input type='hidden' class='data' value=" +
                        data +
                        " ><i class='align-middle me-2 fas fa-fw fa-ellipsis-v' data-feather='more-vertical'></i> Edit</a><div class='dropdown-divider'></div><a class='dropdown-item opcionesUser'  id='deleteUser' data-bs-toggle='modal' data-bs-target=''><input type='hidden' class='data' value=" +
                        data +
                        " ><i class='align-middle me-2 far fa-fw fa-edit' data-feather='edit'></i> Delete</a><div class='dropdown-divider'></div>"
                    );
                },
            },
        ],
    });
}

$(document).ready(function () {
    tblUsers();
    RolesUser();
    $("#phoneuser").mask("(000) 000-0000");
});

$(document).on("click", ".opcionesUser", function () {
    var idUser = $(this).find(".data").val();

    if (this.id == "editUser") {
        axios
            .post(principalUrl + "user/edita/" + idUser)
            .then((respuesta) => {
                $(".modal-title").html("edit User");
                $("#iduser").val(respuesta.data.id);
                $("#nameuser").val(respuesta.data.name);
                $("#emailuser").val(respuesta.data.email);
                $("#phoneuser").val(respuesta.data.phone);
                $("#passworduser").val("********");
                $("#passwordconfir").val("********");
                $("#nameuser").focus();
                document.getElementById("btnsave").innerText = "Update";
                $("#Modaluser").modal("show");

                console.log(respuesta.data);
            })
            .catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                }
            });
    } else if (this.id == "deleteUser") {
        Swal.fire({
            title: "Delete User",
            text: "Are you sure to delete the user?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Continuer",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                axios
                    .post(principalUrl + "user/delete/" + idUser)
                    .then((respuesta) => {
                        respuesta.data;
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "registro actualizado!",
                            showConfirmButton: false,
                            timer: 1000,
                        });
                        tblUsers();
                    })
                    .catch((error) => {
                        if (error.response) {
                            console.log(error.response.data);
                        }
                    });
            } else {
            }
        });
    }
});

$("#btnsave").on("click", function () {
    if (validaUser() == false) {
        return;
    }

    var user = new FormData();
    user.append("id", $("#iduser").val());
    user.append("name", $("#nameuser").val());
    user.append("email", $("#emailuser").val());
    user.append("phone", $("#phoneuser").val());
    user.append("password", $("#password").val());
    user.append("typeRole", $("#typeRole").val());
    user.append("password", $("#passwordconfir").val());

    if ($("#iduser").val() != "") {
        axios
            .post(principalUrl + "user/actualiza", user)
            .then((respuesta) => {
                $("#btnsave").text("Save changes");
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "actualized User!",
                    showConfirmButton: false,
                    timer: 1200,
                });
                tblUsers();
                $("#iduser").val("");
                $("#nameuser").val("");
                $("#emailuser").val("");
                $("#password").val("");
                $("#passwordconfir").val("");
                $("#nameuser").focus();
                $("#Modaluser").modal("hide");
            })
            .catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                }
            });
    } else {
        axios
            .post(principalUrl + "condicion/agregaruser", user)
            .then((respuesta) => {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "added User!",
                    showConfirmButton: false,
                    timer: 1200,
                });

                tblUsers();
                $("#iduser").val("");
                $("#nameuser").val("");
                $("#emailuser").val("");
                $("#phoneuser").val("");
                $("#passworduser").val("");
                $("#passwordconfir").val("");
                $("#Modaluser").modal("hide");
            })
            .catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                }
            });
    }
});

function RolesUser(){
    $("#typeRole").empty();
    axios.post(principalUrl + "user/roles")
    .then((respuesta) => {
        respuesta.data
        $("#typeRole").append("<option value='' selected>Choose...</option>"); 
    
        respuesta.data.forEach(function (element) {
           $("#typeRole").append("<option value="+element.name+" >"+element.name+"</option>"); 
        });
    
    })
    .catch((error) => {
        if (error.response) {
            console.log(error.response.data);
        }
    });

}

console.log("archivo de user.js");
