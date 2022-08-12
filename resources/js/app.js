require('./bootstrap');
require('./html5imageupload.js');

var csrfToken = $('meta[name="csrf-token"]').attr('content');

$.ajaxSetup({ headers: {'X-CSRF-TOKEN': csrfToken } });

/** dropzone related functions */

function resetError(el)
{
    el.next('em.state-error').remove();
    el.removeClass('state-error');
}
function setError(el, image_id)
{
    if (!el.hasClass('state-error')) {
        el.addClass('state-error');
    }
    $('#' + image_id).val('');
    $('#file_id_' + image_id).val('');
    if ($('#' + image_id + '-error').size() > 0) {
        $('#' + image_id + '-error').html('This field is required.').show();
    } else if ($('#file_id_' + image_id + '-error').size() > 0){
        $('#file_id_' + image_id + '-error').html('This field is required.').show();
    } else {
        el.after('<em class="state-error image-error" id="' + image_id + '-error">This field is required.</em>');
    }
}

/** candy bar form */

var candyBarForm = $('#candy_bar_form');
var image_widget = $('#dropzone_id_image');
var image = $('#image');
var image_required = image_widget.data('required') === true;
var image_deleted = image.val() === "";
var create = $('input:hidden[name="_method"]').length === 0;

alert(candyBarForm.attr('id'));

image_widget.html5imageupload({
    onAfterSelectImage: function() {
        resetError($(this.element));
    },
    onAfterProcessImage: function() {
        image.val($(this.element).data('newFileName'));
        resetError($(this.element));
        image_deleted = false;
    },
    onAfterCancel: function() {
        if (image_required) {
            setError($(this.element), 'image');
        }
        image_deleted = true;
    },
    onAfterRemoveImage: function() {
        image.val('');
        if (image_required) {
            setError($(this.element), 'image');
        }
        image_deleted = true;
    }
});

