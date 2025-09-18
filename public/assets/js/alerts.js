
function showSuccess(msg) {
    toastr.success(msg);
}

function showWarning(msg) {
    toastr.warning(msg);
}

function showDanger(msg) {
    toastr.error(msg);
}


function showError(msg) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: msg,
    });
}

