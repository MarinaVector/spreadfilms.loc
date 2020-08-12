$(document).on('click','.popup_selector',function (event) {
    event.preventDefault();
    var updateID = $(this).attr('data-inputid'); // Btn id clicked
    var elfinderUrl = '/elfinder/popup/';

    // trigger the reveal modal with elfinder inside
    var triggerUrl = elfinderUrl + updateID;
    $.colorbox({
        href: triggerUrl,
        fastIframe: true,
        iframe: true,
        width: '70%',
        height: '50%'
    });

});
// function to update the file selected by elfinder
function processSelectedFile(filePath, requestingField) {
    let publicPath = $('#public_path').val();
    let privatePath = $('#private_path').val();

    let separator = filePath.includes("/") ? '/' : '\\';

    let folderName = filePath.substr(0, filePath.indexOf(separator));
    let fileRelevantPath = filePath.substr(filePath.indexOf(separator) + 1, filePath.length);
    let path = folderName === 'private' ? privatePath + fileRelevantPath : publicPath + fileRelevantPath;

    $('#' + requestingField).val(path).trigger('change');
    $('#' + requestingField + '-preview').css("background-image", "url("+path+")");

    if (requestingField == 'background-tutorial-image') {
        $('.elfinder-preview-image').css('height', '100%');
    }

    if (requestingField == 'logo-image') {
        $('#logo-image-preview').css('height', '100%');
    }

    if (requestingField == 'background-image') {
        $('#background-image-preview').css('height', '100%');
    }
}
