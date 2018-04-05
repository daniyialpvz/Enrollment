$(document).ready(function(){
    // alert("hello");
    $('#data-table-simple').DataTable();
    var hiddenValue = $('#hiddenField').val();
    
    //Actions 
    if(hiddenValue == 1 || hiddenValue == 2){
         $('#data-table-simple-Action').removeAttr('width').DataTable({
            scrollY:        "300px",
            scrollX:        true,
            scrollCollapse: false,
            paging: true,

            columnDefs: [
                { width: 300, targets: 2 },
                { width: 400, targets: 6 },
                { width: 200, targets: 11 },
                { width: 200, targets: 12 },
            ],
            // fixedColumns: true
            // "paging": false,
        });
    }else{
         $('#data-table-simple-Action').removeAttr('width').DataTable({
            scrollY:        "300px",
            scrollX:        true,
            scrollCollapse: false,
            paging: false,

            columnDefs: [
                { width: 300, targets: 2 },
                { width: 400, targets: 6 },
                { width: 200, targets: 11 },
                { width: 200, targets: 12 },
            ],
            // fixedColumns: true
            // "paging": false,
        });
    }


     //District Infos
    if(hiddenValue == 1 || hiddenValue == 2){
        $('#data-table-simple-DistrictInfo').removeAttr('width').DataTable({
            scrollY:        "300px",
            scrollX:        true,
            scrollCollapse: false,
            paging: true,

            columnDefs: [
                { width: 100, targets: 3 },
                { width: 100, targets: 4 },
                { width: 300, targets: 5 },
                { width: 300, targets: 6 },
                { width: 200, targets: 9 },
                { width: 200, targets: 11 },
            ],
            // fixedColumns: true
            // "paging": false,
        });
    }else{
        $('#data-table-simple-DistrictInfo').removeAttr('width').DataTable({
            scrollY:        "300px",
            scrollX:        true,
            scrollCollapse: false,
            paging: false,

            columnDefs: [
                { width: 100, targets: 3 },
                { width: 100, targets: 4 },
                { width: 300, targets: 5 },
                { width: 300, targets: 6 },
                { width: 200, targets: 9 },
                { width: 200, targets: 11 },
            ],
            // fixedColumns: true
            // "paging": false,
        });
    }

         
    
    var table = $('#data-table-row-grouping').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    });
 
    // Order by the grouping
    $('#data-table-row-grouping tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );


    });