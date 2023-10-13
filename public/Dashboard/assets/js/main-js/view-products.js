// start checkbox
let allLabel = Array.from(document.querySelectorAll(".table-responsive .active-customer"));
let allCheckboxCont = Array.from(document.querySelectorAll(".table-responsive .the-checkbox"));
let tableHeadCheckbox = document.getElementById("head");
let allRadio = Array.from(document.querySelectorAll(".table-responsive .active-radio"));

allLabel.forEach(lab => {
    lab.onclick = function () {
        if(this.firstElementChild.checked == true) {
            this.lastElementChild.firstElementChild.style.opacity = '1';
            if (this.classList.contains("head")) {
                false
            } else {
                $(this).parent().siblings().css({'color':'#7366ff'});
            }
        } else {
            this.lastElementChild.firstElementChild.style.opacity = '0';
            if (this.classList.contains("head")) {
                false
            } else {
                $(this).parent().siblings().css({'color':'#000'});
            }

        }
    }
});

tableHeadCheckbox.onclick = function () {
    if(this.firstElementChild.checked == true) {
        allLabel.forEach(lab => {
            lab.firstElementChild.checked = true;
            lab.lastElementChild.firstElementChild.style.opacity = '1';
            if (lab.classList.contains("head")) {
                false
            } else {
                $(lab).parent().siblings().css({'color':'#7366ff'});
            }
        });
    } else {
        allLabel.forEach(lab => {
            lab.firstElementChild.checked = false;
            lab.lastElementChild.firstElementChild.style.opacity = '0';
            if (lab.classList.contains("head")) {
                false
            } else {
                $(lab).parent().siblings().css({'color':'#000'});
            }
        });
    }
};

// radio work
function beta () {
    allRadio.forEach(ra => {
        ra.firstElementChild.checked = false;
    });
    allLabel.forEach(la => {
        la.firstElementChild.checked = false;
        la.lastElementChild.firstElementChild.style.opacity = '0';
    });
}

allRadio.forEach(rad => {
    rad.onclick = function () {
        beta();
        rad.firstElementChild.checked = true;
        if (this.firstElementChild.checked == true) {
            $(this).parent().siblings().css({'color':'#7366ff'});
            $(this).parent().parent().siblings().children().css({'color':'#000'});
        } else {
            $(this).parent().siblings().css({'color':'#000'});
        }
        rad.parentElement.nextElementSibling.firstElementChild.firstElementChild.checked = true;
        rad.parentElement.nextElementSibling.firstElementChild.lastElementChild.firstElementChild.style.opacity = '1';
    };
});

 // Setup - add a text input to each footer cell
 $('#products-list tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
} );


 // DataTable
var table = $('#products-list').DataTable({
    ordering: true,
    searching: true,
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ],
    initComplete: function () {
        // Apply the search
        this.api().columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    }
});

$('#products-list tfoot tr').appendTo('#products-list thead');

