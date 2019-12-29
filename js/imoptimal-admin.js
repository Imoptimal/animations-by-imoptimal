/* Admin side script */
jQuery(function($) {
    var pageId = document.getElementById('imo-options');
    var instructionsTitle = pageId.getElementsByClassName('imo-instructions');
    var instructionsList = pageId.getElementsByTagName('ol');
    var collapsibleTrigger = pageId.getElementsByClassName('imo-collapsible');
    var collapsibleElement = document.getElementById('imo-animations').getElementsByClassName('form-table');
    var info = pageId.getElementsByClassName('imo-info');
    var items = pageId.getElementsByClassName('imo-items');
    var animationType = pageId.getElementsByClassName('imo-animation-type');
    var i;

    instructionsList[0].style.display = "none";

    instructionsTitle[0].addEventListener("click", function() {

        this.classList.toggle("active");

        if (instructionsList[0].style.display === "none") {
            $('.imo-instructions + ol').slideDown();
        } else {
            $('.imo-instructions + ol').slideUp();
        }
    });

    for (i = 0; i < collapsibleTrigger.length; i++) {

        collapsibleElement[i].style.display = "none";

        if (items[i].innerHTML == "") { // if empty
            info[i].innerHTML = imoptimalPhp.empty;
        } else {
            info[i].innerHTML = imoptimalPhp.selected + items[i].innerHTML;
        }

        collapsibleTrigger[i].addEventListener("click", function() {
            this.classList.toggle("active");
            // The same as collapsibleElement
            var content = this.parentNode.nextElementSibling;
            var jqContent = $(content);
            if (content.style.display === "none") {
                jqContent.slideDown();
            } else {
                jqContent.slideUp();
            }
        });

        animationType[i].addEventListener("change", function() {
            // .imo-preview .imo-example-area
            var exampleArea = this.nextElementSibling.childNodes[1];
            // selected options value
            var toggleClass = this.value;
            // .imo-preview .imo-example-area .example-block
            // switch class + leave the default one
            exampleArea.childNodes[1].className = toggleClass + ' example-block';
        });

    }

});