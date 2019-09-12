<?php
require_once("base/class/main.php");
require("base/include/header.php");
$dateDuJour = date("Y-m-d");

if (isset($_POST['creer'])) {
  $horraireDebut = $_POST['heure_debut']. ':' .$_POST['minute_debut']. ':00';
  $horraireFin = $_POST['heure_fin']. ':' .$_POST['minute_fin']. ':00';
  $dateDebut = Calendrier::joinDateHour($_POST['date_debut'], $horraireDebut);
  $dateFin = Calendrier::joinDateHour($_POST['date_fin'], $horraireFin);
  Calendrier::addEvent($_POST['nom'], $_POST['description'], $dateDebut, $dateFin, $_SESSION['id_utilisateur']);
}

$events = Calendrier::eventsDataBase();
$i = 1;
while ($event = $events->fetch()) {
  $debut = substr($event['DATE_DEBUT'], 0, 10).'T'.substr($event['DATE_DEBUT'], 11, 19);
  $fin = substr($event['DATE_FIN'], 0, 10).'T'.substr($event['DATE_FIN'], 11, 19);
  if ($i % 3 == 0) {
    $color = '#2ca8ff';
  }
  elseif ($i % 3 == 1) {
    $color = '#048b9a';
  }
  else {
    $color = '#cecece';
  }
  $dataEvent[] = array(
    'title'       => $event['NOM'],
    'start'       => $debut,
    'end'         => $fin,
    'color'       => $color
  );
  $i = $i + 1;
}

$dataEventJson = json_encode($dataEvent);

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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Créer un évenement</button>

<div id='calendar'></div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class=""  method="post">
          <div class="form-row">
            <div class="form-group  col-md-4">
              <label for="">Titre de l'évenement</label>
              <input class="form-control" type="text" name="nom" value="" placeholder="Nommer votre évenement">
            </div>
            <div class="form-group  col-md-4">
              <label for="">Date de début</label>
              <input class="form-control" type="date" name="date_debut" value="">
            </div>
            <div class="form-group  col-md-4">
              <label for="">Date de fin</label>
              <input class="form-control" type="date" name="date_fin" value="">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Heure de début</label>
              <div class="row">
                <div class="col-md-6">
                  <select class="form-control" name="heure_debut">
                    <option value="07">7H</option>
                    <option value="08">8H</option>
                    <option value="09">9H</option>
                    <option value="10">10H</option>
                    <option value="11">11H</option>
                    <option value="12">12H</option>
                    <option value="13">13H</option>
                    <option value="14">14H</option>
                    <option value="15">15H</option>
                    <option value="16">16H</option>
                    <option value="17">17H</option>
                    <option value="18">18H</option>
                    <option value="19">19H</option>
                    <option value="20">20H</option>
                    <option value="21">21H</option>
                    <option value="22">22H</option>
                    <option value="23">23H</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <select class="form-control" name="minute_debut">
                    <option value="00">00MIN</option>
                    <option value="15">15MIN</option>
                    <option value="30">30MIN</option>
                    <option value="45">45MIN</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="">Heure de fin</label>
              <div class="row">
                <div class="col-md-6">
                  <select class="form-control" name="heure_fin">
                    <option value="07">7H</option>
                    <option value="08">8H</option>
                    <option value="09">9H</option>
                    <option value="10">10H</option>
                    <option value="11">11H</option>
                    <option value="12">12H</option>
                    <option value="13">13H</option>
                    <option value="14">14H</option>
                    <option value="15">15H</option>
                    <option value="16">16H</option>
                    <option value="17">17H</option>
                    <option value="18">18H</option>
                    <option value="19">19H</option>
                    <option value="20">20H</option>
                    <option value="21">21H</option>
                    <option value="22">22H</option>
                    <option value="23">23H</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <select class="form-control" name="minute_fin">
                    <option value="00">00MIN</option>
                    <option value="15">15MIN</option>
                    <option value="30">30MIN</option>
                    <option value="45">45MIN</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group col-md-12">
              <textarea class="form-control" name="description" rows="5" placeholder="Description de l'évenement que vous souhaitez créer (pour qui ? pour quoi ? où ? )"></textarea>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button class="btn btn-info" type="submit" name="creer">Créer</button>
        </form>
      </div>
    </div>
  </div>
</div>


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
    contentHeight: "auto",
    firstDay: 1,
    defaultView: 'dayGridMonth',
    defaultDate: '<?php echo $dateDuJour ?>',
    header: {
      left: 'title',
      right: 'prev, next ,today',
      center: 'dayGridMonth, timeGridWeek, listMonth, listYear'
    },
    buttonText: {
      today:    'Aujourd\'hui',
      month:    'mois',
      week:     'semaine',
      listMonth: 'Evenements du mois',
      listYear: 'Evenements de l\'année'
    },
    listDayFormat: {
      day: 'numeric',
      month: 'long',
      year: 'numeric'
    },
    dayGrid: {
      titleFormat: ' MMM, YYYY'
    },
    allDaySlot: false, //affiche les évenements de toute la journée
    allDayText: 'Journée complète',
    // listDayAltFormat: true,
    defaultView: 'timeGridWeek',
    slotDuration: '02:00:00',
    minTime: '07:00:00',
    // maxTime: '23:00:00',
    columnHeaderFormat: { weekday: 'long' },
    weekends: true, // on affiche les week end
    showNonCurrentDates: false, // affiche en grisé les jours hors du mois
    fixedWeekCount: false, // affiche 5 semaines et pas 6 ou 7
    weekNumbers: true, // afficher les n° de semaine
    weekNumbersWithinDays: true, // == n° de semaine dans la case
    weekLabel: "S",
    eventLimit: true,
    eventLimitText: 'de plus',
    events: <?php echo $dataEventJson ?>



  });
  calendar.render();
});
</script>
