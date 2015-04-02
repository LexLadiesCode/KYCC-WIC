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

  function getStartTimes(sessions) {
    var startTimes = [];
    for (var i=0; i<sessions.length; i++) {
      startTimes.push($(sessions[i]).attr('data-time-start'));
    }
    return startTimes;
  }

  function getEndTimes(sessions) {
    var endTimes = [];
    for (var i=0; i<sessions.length; i++) {
      endTimes.push($(sessions[i]).attr('data-time-end'));
    }
    return endTimes;
  }

  function updateCurrentSession(startTimes, endTimes) {
    $('#current-session .session').hide();
    var curTime = new Date();
    var sessionStartTime = false, sessionEndTime = false;
    for (var i=0; i<startTimes.length; i++) {
      var startTime = moment(startTimes[i], 'h:mma').toDate();
      var endTime = moment(endTimes[i], 'h:mma').toDate();
      if (startTime <= curTime && curTime < endTime) {
        sessionStartTime = startTimes[i];
        sessionEndTime = endTimes[i];
      }
    }
    if (sessionStartTime && sessionEndTime) {
      var startSelector = '[data-time-start="' + sessionStartTime + '"]';
      var endSelector = '[data-time-end="' + sessionEndTime + '"]';
      var session = $('#current-session .session' + startSelector + endSelector);
      session.show();
    }
  }

  $(function() {
    updateClock();
    $('#clock').show();
    setInterval(updateClock, 1000);

    var sessions = $('#current-session .session');
    var startTimes = getStartTimes(sessions);
    var endTimes = getEndTimes(sessions);
    console.log(startTimes, endTimes);
    // setInterval(function() {
      updateCurrentSession(startTimes, endTimes);
    // }, 1000);
  });
})(jQuery);
