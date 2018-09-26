function prevStep(_this) {
    var thisTab = $(_this).closest('div .tab');
    var prevTab = thisTab.prev();

    thisTab.css('display', 'none');
    prevTab.css('display', 'block');
}


function nextStep(_this) {
    var thisTab = $(_this).closest('div .tab');
    var prevTab = thisTab.next();

    thisTab.css('display', 'none');
    prevTab.css('display', 'block');
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    if (document.getElementsByClassName("step").length) {
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }

}
