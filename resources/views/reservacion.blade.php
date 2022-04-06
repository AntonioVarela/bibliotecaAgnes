@extends('layouts.app')

@section('scripts')
<script src="{{ asset('js/app.js') }}" defer></script>
<link href='{{asset('js/lib/main.css')}}' rel='stylesheet' />
<script src='{{asset('js/lib/main.js')}}'></script>
<script src='{{asset('js/lib/locales/es.js')}}'></script>
<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
<script>
    var data = {!! $datos !!};
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: { center: 'dayGridMonth,timeGridWeek' },
      locale: 'esLocale',
      events: data,
      buttonText: {
            today:    'hoy',
            month:    'mensual',
            week:     'semanal',
            day:      'day',
            list:     'list'
            },
            navLinks: true,
            navLinkDayClick: function(date, jsEvent) {
              console.log('day', date.toISOString());
              console.log('coords', jsEvent.pageX, jsEvent.pageY);
            },
      views: {
        dayGridMonth: { // name of view
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
          },
          timeGridWeek: {
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
          }
      }
    });
    calendar.render();
  });

</script>
      
@endsection

@section('content')
@include('sweetalert::alert')
<div class="row">

  
    <div class="col-7" style="margin: 0 0 20px 100px">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
        Reservar ahora
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="{{route('reservacionpost')}}" method="post">
              @csrf
              <div class="modal-header">
                  <h5 class="modal-title">Reservación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
              <div class="container-fluid">
                
                    {{-- <input type="datetime-local" class="" name="calendar" id=""> --}}
                    <div class="form-group">
                      <label for="">Fecha</label>
                      <input type="date" name="fecha" class="form-control" required>
                      <small id="helpId" class="text-muted">Selecciona el dia</small>
                    </div>
                    <div class="row">

                   
                    <div class="form-group row ml-1">
                      <label for="">Hora</label>
                      <select name="hora" class="form-select col-3" id="" required>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                      </select>
                      <select name="minuto" class="form-select col-3" id="">
                        <option value="00" selected>00</option>
                        <option value="30">30</option>
                      </select>
                      <small id="helpId" class="text-muted">Solo se puede reservar cada media hora</small>
                    </div>
                    <div class="form-group">
                      <label for="">Color</label>
                      <input type="color" name="color" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-muted">Selecciona el color de la etiqueta</small>
                    </div>
                  </div>
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Reservar</button>
            </div>
          </form>
          </div>
        </div>
      </div>
        
    </div>
    
</div>
<div class="container bg-dark p-3 text-white">
    <div id='calendar'></div>
</div>
@endsection