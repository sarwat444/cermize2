$(document).ready(function (){


/** Uploading Images Function preview */
jQuery(document).ready(function () {
    fileUpload();
});

function fileUpload() {
    var fileWrap = "";
    var fileArray = [];

    $('.upload__inputfile1').each(function () {
        $(this).on('change', function (e) {
            fileWrap = $(this).closest('.upload__box').find('.upload__file-wrap');
            var maxLength = $(this).attr('data-max_length');

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function (f, index) {

                if (fileArray.length >= maxLength) {
                    return false;
                } else {
                    var len = 0;
                    for (var i = 0; i < fileArray.length; i++) {
                        if (fileArray[i] !== undefined) {
                            len++;
                        }
                    }
                    if (len >= maxLength) {
                        return false;
                    } else {
                        fileArray.push(f);

                        var fileName = f.name;
                        var fileExtension = fileName.split('.').pop().toLowerCase();
                        var fileIconClass = getFileIconClass(fileExtension);

                        var html = "<div class='upload__file-box'><div class='file-icon " + fileIconClass + "'></div><div class='file-name'>" + fileName + "</div><div class='upload__file-close' data-file='" + fileName + "'>&times;</div></div>";
                        fileWrap.append(html);
                        iterator++;
                    }
                }
            });
        });
    });

    $('body').on('click', ".upload__file-close", function (e) {
        var file = $(this).data("file");
        for (var i = 0; i < fileArray.length; i++) {
            if (fileArray[i].name === file) {
                fileArray.splice(i, 1);
                break;
            }
        }
        $(this).parent().remove();
    });
}

// Function to get file icon class based on file extension
function getFileIconClass(extension) {
    // Add more file extensions and their corresponding icon classes as needed
    switch (extension) {
        case 'mp4':
        case 'avi':
        case 'mov':
        case 'mkv':
            return 'fa fa-file-video';
        case 'doc':
        case 'docx':
            return 'fa fa-file-word';
        case 'pdf':
            return 'fa fa-file-pdf';
        case 'xls':
        case 'xlsx':
            return 'fa fa-file-excel';
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
            return 'fa fa-file-image'; // Change to appropriate image icon class
        // Add more cases for other file types
        default:
            return 'fa fa-file';
    }
}

/** Upload First Images */
jQuery(document).ready(function () {
    ImgUpload23();
});

function ImgUpload23() {
    var imgWrap = "";
    var imgArray = [];

    $('.upload__inputfile23').each(function () {
        $(this).on('change', function (e) {
            imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap23');
            var maxLength = $(this).attr('data-max_length');

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function (f, index) {

                if (!f.type.match('image.*')) {
                    return;
                }

                if (imgArray.length > maxLength) {
                    return false
                } else {
                    var len = 0;
                    for (var i = 0; i < imgArray.length; i++) {
                        if (imgArray[i] !== undefined) {
                            len++;
                        }
                    }
                    if (len > maxLength) {
                        return false;
                    } else {
                        imgArray.push(f);

                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                            imgWrap.append(html);
                            iterator++;
                        }
                        reader.readAsDataURL(f);
                    }
                }
            });
        });
    });

    $('body').on('click', ".upload__img-close", function (e) {
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
                imgArray.splice(i, 1);
                break;
            }
        }
        $(this).parent().parent().remove();
    });
}

/** Uploading  Image Function  privew */
jQuery(document).ready(function () {
    ImgUpload();
});

function ImgUpload() {
    var imgWrap = "";
    var imgArray = [];

    $('.upload__inputfile2').each(function () {
        $(this).on('change', function (e) {
            imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
            var maxLength = $(this).attr('data-max_length');

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function (f, index) {

                if (!f.type.match('image.*')) {
                    return;
                }

                if (imgArray.length > maxLength) {
                    return false
                } else {
                    var len = 0;
                    for (var i = 0; i < imgArray.length; i++) {
                        if (imgArray[i] !== undefined) {
                            len++;
                        }
                    }
                    if (len > maxLength) {
                        return false;
                    } else {
                        imgArray.push(f);

                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                            imgWrap.append(html);
                            iterator++;
                        }
                        reader.readAsDataURL(f);
                    }
                }
            });
        });
    });

    $('body').on('click', ".upload__img-close", function (e) {
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
                imgArray.splice(i, 1);
                break;
            }
        }
        $(this).parent().parent().remove();
    });
}

/*** Upload Image 4 */
jQuery(document).ready(function () {
    ImgUpload4();
});

function ImgUpload4() {
    var imgWrap = "";
    var imgArray = [];

    $('.upload__inputfile4').each(function () {
        $(this).on('change', function (e) {
            imgWrap = $(this).closest('.upload__box').find('.upload__img4-wrap');
            var maxLength = $(this).attr('data-max_length');

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function (f, index) {

                if (!f.type.match('image.*')) {
                    return;
                }

                if (imgArray.length > maxLength) {
                    return false
                } else {
                    var len = 0;
                    for (var i = 0; i < imgArray.length; i++) {
                        if (imgArray[i] !== undefined) {
                            len++;
                        }
                    }
                    if (len > maxLength) {
                        return false;
                    } else {
                        imgArray.push(f);

                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                            imgWrap.append(html);
                            iterator++;
                        }
                        reader.readAsDataURL(f);
                    }
                }
            });
        });
    });

    $('body').on('click', ".upload__img-close", function (e) {
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
                imgArray.splice(i, 1);
                break;
            }
        }
        $(this).parent().parent().remove();
    });
}

/** Uploading File Function preview */
jQuery(document).ready(function () {
    fileUploadAndImages();
});

function fileUploadAndImages() {
    var fileWrapp = "";
    var fileArrayy = [];

    $('.upload__inputfile').on('change', function (e) {
        fileWrapp = $(this).closest('.upload__box').find('.upload__img-wrap2');
        var maxLength = $(this).attr('data-max_length');

        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        var iterator = 0;
        filesArr.forEach(function (f, index) {

            if (fileArrayy.length >= maxLength) {
                return false;
            } else {
                var len = 0;
                for (var i = 0; i < fileArrayy.length; i++) {
                    if (fileArrayy[i] !== undefined) {
                        len++;
                    }
                }
                if (len >= maxLength) {
                    return false;
                } else {
                    fileArrayy.push(f);

                    var fileName = f.name;
                    var fileExtension = fileName.split('.').pop().toLowerCase();

                    var html = "<div class='upload__file-box upload_images_files'>";
                    // Check if the uploaded file is an image
                    if (f.type.match('image.*')) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            html += "<div class='file-preview' style='background-image: url(" + e.target.result + ")'></div>";
                            html += "<div class='upload__file-close' data-file='" + fileName + "'>&times;</div>";
                            fileWrapp.append(html);
                        }
                        reader.readAsDataURL(f);
                    } else {
                        // For non-image files, display only the file name
                        html += "<div class='file-icon fa fa-file'></div>";
                        html += "<div class='file-name'>" + fileName + "</div>";
                        html += "<div class='upload__file-close' data-file='" + fileName + "'>&times;</div>";
                        fileWrapp.append(html);
                    }
                    iterator++;
                }
            }
        });
    });

    $('body').on('click', ".upload__file-close", function (e) {
        var file = $(this).data("file");
        for (var i = 0; i < fileArrayy.length; i++) {
            if (fileArrayy[i].name === file) {
                fileArrayy.splice(i, 1);
                break;
            }
        }
        $(this).parent().remove();
    });
}

$(document).ready(function () {
    $('input[name="gender"]').change(function () {
        if ($(this).val() === 'Female') {
            $('.female_status').removeClass('d-none');
        } else {
            $('.female_status').addClass('d-none');
        }
    });

});

});
