function validarInput(input) {
    var caracteresPermitidos = /^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ' ]+$/;
    if(input.match(caracteresPermitidos)) {
        return true;
    } else {
        return false;
    }
}
