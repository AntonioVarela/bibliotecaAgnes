@extends('layouts.app')

@section('scripts')
<link href='{{asset('js/lib/main.css')}}' rel='stylesheet' />
<script src='{{asset('js/lib/main.js')}}'></script>
<script src='{{asset('js/lib/locales/es.js')}}'></script>
<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
<script>
    // var json = '{{json_encode($datos)}}';
    var data = {!! $datos !!};
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      timeZone: 'local',
      initialView: 'timeGridWeek',
      locale: 'es',
      events: data,
      allDaySlot: false,
      contentHeight: 600,
      slotMinTime: '07:00:00',
      slotMaxTime: '20:00:00',
      nowIndicator: true,
      slotLabelFormat: {
        hour: 'numeric',
        minute: '2-digit',
        omitZeroMinute: false,
        }
      
    });
    calendar.render();
  });

</script>
      
@endsection

@section('content')
<div class="row">
    <div class="col-7" style="margin: 0 0 20px 100px">
        <form action="" method="post">
            <label for="">Reservación</label>
            <input type="datetime-local" class="" name="calendar" id="">
            <button type="submit">Reservar</button>
        </form>
        
    </div>
    
</div>
<div class="container bg-dark p-3 text-white">
    <div id='calendar'></div>
</div>
@endsection