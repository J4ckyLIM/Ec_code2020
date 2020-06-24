
$(document).ready(function() {

  $( '#sidebarCollapse' ).on( 'click', function() {

    $( '#sidebar' ).toggleClass('open');

  });

});

// Once the actual window loads, it fires this function
window.onload = function() {
  $('#media_duration')[0].textContent = formatDuration($('#media_duration')[0].textContent)
}

/**
 * Convert a duration to xx:mm format (eg: 05h28)
 * @param {Number} minutes 
 * @return {String} final value (eg: "Durée: 05h28")
 */
function formatDuration(minutes){
  let h = Math.floor(minutes / 60);
  let m = minutes % 60;
  h = h < 10 ? '0' + h : h;
  m = m < 10 ? '0' + m : m;
  return ("Durée: " + h + "h" + m);
}


