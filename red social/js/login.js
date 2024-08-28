function validarContraseña(){
    var pass = document.getElementById("contraseña").value;
    var confirmarPass = document.getElementById("confirmarContraseña").value;

    if(pass!=confirmarPass){
        alert("Las contraseñas no coinciden");
        return false;
    }
    return true;
}

function togglePasswordVisibility(id){
    var campo = document.getElementById(id);
    var icono = document.getElementById(id + "-toggle");
    if(campo.type === "password"){
        campo.type = "text";
        icono.textContent = "Ocultar";
    }else{
        campo.type = "password";
        icono.textContent = "Mostrar";
    }
}