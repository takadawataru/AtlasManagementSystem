$(function () {
  $('.js-modal-open').on('click', function () {
    $('.modal').fadeIn();
    var day = $(this).attr('date-day');
    var part = $(this).attr('date-part');
    $('.modal-day').text(day);
    $('.modal-part').text(part);
    $('.hidden_day').val(day);
    $('.hidden_part').val(part);

    return false;
  })
  $('.js-modal-close').on('click', function () {
    $('.modal').fadeOut();
    return false;
  })
});
