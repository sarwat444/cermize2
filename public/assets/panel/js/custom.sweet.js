
function customSweetAlert(type ,title , html , func) {
    var then_function = func || function () {
    };
    Swal.fire({
        title : title,
        icon  : type,
        html  : html,
        showCancelButton: 0,
        confirmButtonColor: "green",
        cancelButtonColor: "red",
    }).then(then_function);
}

function errorCustomSweet() {
    customSweetAlert(
        'error',
        'حدث خطأ غير متوقع .. الرجاء المحاولة لاحقاً'
    );
}
function successCustomSweet(text) {
    customSweetAlert(
        'success',
        text
    );
}
