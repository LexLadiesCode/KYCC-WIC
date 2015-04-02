(function($) {
  function updateClock() {
    var hourLine = $('line.hour');
    var minuteLine = $('line.minute');
    var secondLine = $('line.second');
    var now = new Date();
    var hourRotation = 360 * now.getHours() / 12;
    var minuteRotation = 360 * now.getMinutes() / 60;
    var secondRotation = 360 * now.getSeconds() / 60;
    var hourTransform = 'rotate(' + hourRotation + ' 100 100)';
    var minuteTransform = 'rotate(' + minuteRotation + ' 100 100)';
    var secondTransform = 'rotate(' + secondRotation + ' 100 100)';
    hourLine.attr('transform', hourTransform);
    minuteLine.attr('transform', minuteTransform);
    secondLine.attr('transform', secondTransform);
    $('#current-date').text(moment().format('MMMM Do'));
    $('#current-time').text(moment().format('h:mm:ss a'));
  }

  $(function() {
    updateClock();
    $('#clock').show();
    setInterval(updateClock, 1000);
  });
})(jQuery);
