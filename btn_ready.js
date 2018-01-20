function btn_color() {
    $('#color_btn').children('a').each(function () {
      var color = getRandomColor();
      $(this).css('background-color',color);
      $(this).css('border-color',color);
      $(this).css('box-shadow',"0 8px 6px -6px black");
    });
  }

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }
