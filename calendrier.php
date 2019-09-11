<?php
require_once("base/class/main.php");
require("base/include/header.php");
$dateDuJour = date("Y-m-d");
 ?>

<link rel="stylesheet" href="base/css/calendrier.css">
<link href='base/js/fullcalendar/packages/core/main.css' rel='stylesheet'>
<link href='base/js/fullcalendar/packages/daygrid/main.css' rel='stylesheet'>
<link href='base/js/fullcalendar/packages/timegrid/main.css' rel='stylesheet'>
<link href='base/js/fullcalendar/packages/list/main.css' rel='stylesheet'>

<script src='base/js/fullcalendar/packages/core/main.js'></script>
<script src='base/js/fullcalendar/packages/daygrid/main.js'></script>
<script src='base/js/fullcalendar/packages/timegrid/main.js'></script>
<script src='base/js/fullcalendar/packages/list/main.js'></script>


<div id='calendar'></div>

<script type="text/javascript">

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'fr',
    plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
    eventClick: function(info) {
      var eventObj = info.event;

      if (eventObj.url) {

        window.open(eventObj.url);

        info.jsEvent.preventDefault();
      }
    },
    contentHeight: 700,
    firstDay: 1,
    defaultView: 'dayGridMonth',
    defaultDate: '<?php echo $dateDuJour ?>',
    header: {
      left: 'title',
      right: 'prev, next ,today',
      center: 'dayGridMonth, listMonth'
    },
    buttonText: {
      today:    'Aujourd\'hui',
      month:    'mois',
      listMonth: 'liste',
    },
    listDayFormat: {
      day: 'numeric',
      month: 'long',
      year: 'numeric'
    },
    dayGrid: {
      titleFormat: ' MMM, YYYY'
    },
    // allDaySlot: true, //affiche les évenements de toute la journée
    // allDayText: '',
    // listDayAltFormat: true,
    columnHeaderFormat: { weekday: 'long' },
    weekends: true, // on affiche les week end
    showNonCurrentDates: false, // affiche en grisé les jours hors du mois
    fixedWeekCount: false, // affiche 5 semaines et pas 6 ou 7
    weekNumbers: true, // afficher les n° de semaine
    weekNumbersWithinDays: true, // == n° de semaine dans la case
    weekLabel: "S",
    eventLimit: true,
    eventLimitText: 'de plus',
    events: <?php echo $dataJson ?>



  });
  calendar.render();
});
</script>
