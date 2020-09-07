
<script>
    $(document).ready(function() {
        $(".altro").css('display', 'none');
        $(".slide").css('display', 'none');
        $(".text").css('display', 'none');
        $("form").css('display', 'none');
        $("form").fadeIn(3000);
    })
//Quiz secret
function myFunction() {
    var text;
    var quest = prompt("Enter the correct password", "Password");
    switch (quest) {
        case "secret":
            $(".try").addClass("wrong");
            $(".try").removeClass("true");
            text = "<div class='text Wrong'>Bot: Nice try, but wrong this time...</div>";
            break;
        case "Password":
            $(".try").addClass("wrong");
            $(".try").removeClass("true");
            text = "<div class='text Wrong'>Bot: Sorry, it's not that obvious...</div>";
            break;
        case "sito4":
            $(".try").addClass("true");
            $(".try").removeClass("wrong");
            text = "<div class='text True'>Bot: Well done. Here's the secret</div>";
            $(".altro.4").fadeIn("slow");
            break;
        case "sito5":
            $(".try").addClass("true");
            $(".try").removeClass("wrong");
             text = "<div class='text True'>Bot: Well done. Here's the secret</div>";
             $(".altro.5").fadeIn("slow");
             break;
        case null:
            $(".try").addClass("leave");
            $(".try").removeClass("true");
            $(".try").removeClass("wrong");
            text = "<div class='text Leave'>Bot: Do you leave already?</div>";
            break;
        default:
            $(".try").toggleClass("wrong");
            $(".try").removeClass("true");
            text = "<div class='text Wrong'>Bot: Nope</div>";
    }
    document.getElementById("demo").innerHTML = text;
}

$(document).ready(function(){
        $(".btn.viaggi").click(function () {
            $(".slide.viaggi").slideToggle("slow");
        });
});

$(document).ready(function(){
        $(".btn.clienti").click(function () {
            $(".slide.clienti").slideToggle("slow");
        });
});

$(document).ready(function(){
        $(".btn.mezzi").click(function () {
            $(".slide.mezzi").slideToggle("slow");
        });
});
//fa scivolare le tabelle
$(document).ready(function() {
        $("#slide").css('display', 'none');
        $("#slide").slideDown("slow");
});

//Personalizzazione del messaggio di errore
$(document).ready(function() {
        $("#error").animate({ fontSize: '1.25em' });
    $("#error").animate({fontSize: '1em'});
});


</script>