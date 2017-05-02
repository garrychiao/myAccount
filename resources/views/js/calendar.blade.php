<!--FullCalendar-->
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/fullcalendar.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#calendar').fullCalendar({
    header: { center: 'month,agendaWeek' }, // buttons for switching between views

    views: {
        month: { // name of view
            titleFormat: 'YYYY, MM, DD'
            // other view-specific options here
        }
    },
    events: [
        @foreach($records as $record)
        {
          title  : '$ {{$record->amount}} : {{$record->title}}',
          start  : '{{$record->date}}',
          @if($record->category_type == 0)
          color  :  '#f48fb1',
          @elseif($record->category_type == 1)
          color  :  '#64b5f6',
          @endif
        },
        @endforeach
    ]
  })
});
</script>
