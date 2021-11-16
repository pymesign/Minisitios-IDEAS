jQuery(document).ready(function ($) {
  var mediaUploader;

  $('#upload-button').on('click', function (e) {
    e.preventDefault();
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose a Profile Picture',
      button: {
        text: 'Choose Picture',
      },
      multiple: false,
    });

    mediaUploader.on('select', function () {
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#profile-picture').val(attachment.url);
      $('#profile-picture-preview').css(
        'background-image',
        'url(' + attachment.url + ')'
      );
    });

    mediaUploader.open();
  });

  var mediaUploaderCarousel;

  $('.upload-button').on('click', function (e) {
    e.preventDefault();
    var buttonID = $(this).data('group');

    if (mediaUploaderCarousel) {
      mediaUploaderCarousel.open();
      return;
    }

    mediaUploaderCarousel = wp.media.frames.file_frame = wp.media({
      title: 'Choose a Hotel Picture',
      button: {
        text: 'Choose Picture',
      },
      multiple: false,
    });

    mediaUploaderCarousel.on('select', function () {
      attachment = mediaUploaderCarousel
        .state()
        .get('selection')
        .first()
        .toJSON();
      $('#carousel-image-' + buttonID).val(attachment.url);
      $('#carousel-image-preview' + buttonID).css(
        'background-image',
        'url(' + attachment.url + ')'
      );
    });
    mediaUploaderCarousel.open();
  });
});
