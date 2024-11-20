function menuBar() {
    var x = document.getElementById("links");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
    
  }

function onload() {
    const url = window.location.href.substring(window.location.href.lastIndexOf('/') + 1); //god bless stackoverflow
    console.log(url);
    active = document.getElementById("active");
    active.innerHTML = urlPageNames[url];
    active.href = window.location.href;
    var elements = document.getElementById('links').children;
    for (const element of elements) {
      if (element.innerHTML == active.innerHTML) {
        element.style.display = "none";
      }
    }
}

const urlPageNames = { //DOES NOT UPDATE DYNAMICALLY!!!
  'countdown.php': 'Countdown',
  'double-t.php': 'Double-T',
  'green_box.php': 'Green Boxes',
  'schedule.php': 'Schedule',
  'request-switch.php': 'Request to Switch'
}

window.onload = onload();