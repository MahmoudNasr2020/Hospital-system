// start checkbox
let allLabel = Array.from(document.querySelectorAll(".row .active-customer"));
let allCheckboxCont = Array.from(document.querySelectorAll(".row .the-checkbox"));
let jsQuantity = document.querySelector(".jsQuantity");
let jsMinQuantity = document.querySelector(".jsMinQuantity");

allLabel.forEach(lab => {
    lab.onclick = function () {
        if(this.firstElementChild.checked == true) {
            this.lastElementChild.firstElementChild.style.opacity = '1';
        } else {
            this.lastElementChild.firstElementChild.style.opacity = '0';
        }
        if(this.firstElementChild.checked !== true) {
            jsMinQuantity.disabled = true;
            jsQuantity.disabled = true;
        } else {
            jsMinQuantity.disabled = false;
            jsQuantity.disabled = false;
        }
    }
});

$('select#taxRate').on('change', function() {
    if(this.value == 0){
        $('#taxModal').modal('show');
    }
  });

$('.close-modal').on('click', function(){
    $('#taxModal').modal('hide');
});