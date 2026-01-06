 $(document).ready(function() {
      $('#booksTable').DataTable({
        responsive: true,
        lengthChange: true,
        autoWidth: false,
        pageLength: 10,
        order: [[0, 'desc']], 
        dom: 'Bfrtip',
        buttons: [
          { extend: 'copy', className: 'btn btn-secondary btn-sm' },
          { extend: 'csv', className: 'btn btn-info btn-sm' },
          { extend: 'excel', className: 'btn btn-success btn-sm' },
          { extend: 'pdf', className: 'btn btn-danger btn-sm' },
          { extend: 'print', className: 'btn btn-primary btn-sm' }
        ]
      });
      
      // Move buttons to the top-left of the table wrapper
      $('.dt-buttons').appendTo('#booksTable_wrapper .row:first-child .col-md-6:first-child');
    });