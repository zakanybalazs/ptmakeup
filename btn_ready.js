function btn_color() {
    $('#color_btn').children('a').each(function () {
      var color = $(this).attr('placeholder');
      $(this).css('background-color',color);
      $(this).css('border-color',color);
      $(this).css('box-shadow',"0 8px 6px -6px black");
    });
  }
