<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
  </div>
<div class="scripts">
    <script src="<?= plugins_folder() ?>momment.js" type="text/javascript"></script>
    <script src="<?= plugins_folder() ?>fullcalendar.min.js" type="text/javascript"> </script>
    <script>
        jQuery(document).ready(function() {


               jQuery('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },

                    editable: false,
                    eventLimit: true, // allow "more" link when too many events
                   eventSources: [

                       // your event source
                       {
                           url: 'calendar/get_events',
                           type: 'POST',
                           data: {
                               month: 'current',
                               type: 'full'
                           },
                           error: function() {
                               jQuery.growl.error({title:"Calendar Events Error!",message:'there was an error while fetching events!'});
                           },
                           color: 'yellow',   // a non-ajax option
                           textColor: 'black' // a non-ajax option
                       }

                       // any other sources...

                   ],
                   eventClick: function(calEvent, jsEvent, view) {

                       alert('Event: ' + calEvent.title + " View: " + view.name);
                       //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                      // alert('View: ' + view.name);

                       // change the border color just for fun
                      // jQuery(this).css('border-color', 'red');

                   }

            });


        });


    </script>
</div>


<div id="calendar">

</div>


