document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        editable: true, 
        selectable: true, 
        eventLimit: true,

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        events: [
            {
                id: '1',
                title: 'Evento de Ejemplo',
                start: '2025-02-25',
                description: 'Descripción del evento',
                color: '#007bff'
            },
            {
                id: '2',
                title: 'Reunión de Trabajo',
                start: '2025-02-26T10:00:00',
                end: '2025-02-26T12:00:00',
                description: 'Reunión con el equipo',
                color: '#28a745'
            }
        ],

        eventDidMount: function (info) {
            var tooltip = new bootstrap.Tooltip(info.el, {
                title: info.event.extendedProps.description,
                placement: 'top',
                trigger: 'hover',
                container: 'body'
            });
        },

        dateClick: function (info) {
            let titulo = prompt('Ingrese el nombre del evento:');
            if (titulo) {
                calendar.addEvent({
                    id: String(new Date().getTime()), 
                    title: titulo,
                    start: info.dateStr,
                    color: '#ffc107'
                });
            }
        },

        eventClick: function (info) {
            let nuevoTitulo = prompt('Editar evento:', info.event.title);
            if (nuevoTitulo) {
                info.event.setProp('title', nuevoTitulo);
            }
        },

        eventMouseEnter: function (info) {
            info.el.addEventListener('contextmenu', function (e) {
                e.preventDefault();
                if (confirm('¿Eliminar este evento?')) {
                    info.event.remove();
                }
            });
        }
    });

    calendar.render();
});
