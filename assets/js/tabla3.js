function format(value) {
    return '<div>Link de la memoria: <a href="' + value + '">' + value + '</a></div>';
}

$(document).ready(function () {
    var table = $('#Tabla1').DataTable({
        order: [[4,'asc']],
        rowGroup: {
            dataSrc: 4
        },
        initComplete: function () {
            this.api()
                .columns()
                .every(function (index) {
                    if (index !== 0) {
                        let column = this;
                        let title = column.footer().textContent;
    
                        // Buscador en el tfoot
    
                        let input = document.createElement('input');
                        input.placeholder = title;
                        input.className = "Footer";
                        column.footer().replaceChildren(input);
         
                        // Listener del buscador
                        input.addEventListener('keyup', () => {
                            if (column.search() !== this.value) {
                                column.search(input.value).draw();
                            } 
                        });
                    }
                });
        }, 
        searchBuilder: false,
        info: false,
        ordering: false,
        paging: false,
        //language: {
        //url: '//cdn.datatables.net/plug-ins/2.0.7/i18n/es-ES.json',    
    //},
     
    });
    // Add event listener for opening and closing details
    $('#Tabla1').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(tr.data('child-value'))).show();
            tr.addClass('shown');
        }
    });
});