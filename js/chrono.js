let i = prompt ("Choose test number");

$(".start").click(function ()
{
    $.ajax ({
        type: "POST",
        url: "../partieAjax.php",
        data: "nbPerso="+ i,
        dataType: "json",
        timeout: 3000,
        success:  function(data) {
            console.log(data);
            for (n = 0; n < i; n++) {
                creationCellule(n);
                
                $(".taille" + n).html(data[n][2]);
                $(".sexe" + n).html(data[n][3]);
                let taille = parseFloat($(".taille" + n).html());
                let sexe = $(".sexe" + n).html();
                let all = [0, taille, sexe, data[n][1], data[n][0]];

                tabPersonnage.push(all);
            }
        },
        error:  function(request, status, error) {
            console.log(request, status, error);
        },
    });
});


function creationCellule(n) {
    $('.row').append("<div class='col-xl-4 col-sm-6 col-12'><div class='card rounded w-75 mb-3 ml-auto mr-auto bg-dark'><img class='card-img-top mt-2 mb-2 ml-auto mr-auto img img" + n + "' src='img/bebe.svg'><div class='card-body border-top text-white'><div class='text-center'><span class='sexe" + n + "'></span><span>&nbsp;/&nbsp;</span><span class='age" + n + "'>0</span><span>&nbsp;ans&nbsp;/&nbsp;</span><span class='taille" + n + "></span><span>&nbsp;cm</span></div></div></div></div>");
}

tabPersonnage = [];

function evolution(n) {
    $(".age" + n).html(tabPersonnage[n][0]);
    $(".taille" + n).html(tabPersonnage[n][1].toFixed(1));
    tabPersonnage[n][0]++;
    switch (true) {
        case tabPersonnage[n][0] < tabPersonnage[n][4]:
            switch (true) {

                case tabPersonnage[n][0] <= 3:
                    tabPersonnage[n][1] = tabPersonnage[n][1] + (20 * tabPersonnage[n][3]);
                    $(".img" + n).attr('src', 'img/bebe.svg');
                    break;

                case tabPersonnage[n][0] <= 12:
                    tabPersonnage[n][1] = tabPersonnage[n][1] + (5 * tabPersonnage[n][3]);
                    $(".img" + n).attr('src', 'img/enfant.svg');
                    break;
                case tabPersonnage[n][0] <= 17:
                    tabPersonnage[n][1] = tabPersonnage[n][1] + 2;
                    $(".img" + n).attr('src', 'img/' + tabPersonnage[n][2] + 'A.svg');
                    break;
                case tabPersonnage[n][0] <= 50:
                    $(".img" + n).attr('src', 'img/' + tabPersonnage[n][2] + 'J.svg');
                    break;
                case tabPersonnage[n][0] <= 70:
                    $(".img" + n).attr('src', 'img/' + tabPersonnage[n][2] + 'M.svg');
                    break;

                default:
                    tabPersonnage[n][1] = tabPersonnage[n][1] - 0.1;
                    $(".img" + n).attr('src', 'img/' + tabPersonnage[n][2] + 'V.svg');
                    break;
            }
            break;

        default:
            $(".img" + n).attr('src', 'img/rip.svg');
            tabPersonnage[n][0] = tabPersonnage[n][4];
            break;
    }
}

function chrono() {
    let year = parseInt($(".chrono").html());
    let yearMax = 2000;
    let chrono = setInterval(function () {
        $(".chrono").html(year);
        for (n = 0; n < i; n++) {
            evolution(n);
        }
        year++;
        if (year > yearMax) {
            clearInterval(chrono);
        }
    }, 100);
}