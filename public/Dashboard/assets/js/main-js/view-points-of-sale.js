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

