$(function () {
  $('.js-modal-open').on('click', function () {
    $('modal').fadeIn();
    console.log('ok');
    return false;
  })
  $('js-modal-close').on('click', function () {
    $('modal').fadeOut();
    return false;
  })
});
