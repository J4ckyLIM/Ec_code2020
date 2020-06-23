
$(document).ready(function() {

  $( '#sidebarCollapse' ).on( 'click', function() {

    $( '#sidebar' ).toggleClass('open');

  });

});

// Once the actual window loads, it fires this function
window.onload = function() {
  $('#media_duration')[0].textContent = formatDuration($('#media_duration')[0].textContent)
  $('#media_genre')[0].textContent = genreIdConvertor($('#media_genre')[0].textContent)
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

/**
 * Convert the given id to the value corresponding to it in database (eg: 1 = Action ...)
 * @param {String} value genre id of the film/serie 
 * @return {String} the value it is corresponding to (eg: "Genre: Action")
 */
function genreIdConvertor(value) {
  let id = value.split(' ')[0]
  let type = value.split(' ')[1]
  let finalType = type.charAt(0).toUpperCase() + type.slice(1)
  let genre = ""
  switch(id){
    case "1":
      genre = "Action"
      break;
    case "2":
      genre = "Horreur"
      break;
    case "3":
      genre = "Science-Fiction"
      break;
    default:
      genre = "Non défini"
  }
  return (finalType + ' : '+ genre)
}

