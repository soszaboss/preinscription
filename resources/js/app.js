import "./bootstrap";

$(document).ready(function () {
    function listesFormations() {
        $.ajax("/formations", {
            type: "GET",
            success: function (reponse) {
                var data = JSON.parse(reponse);
                data.sort(function (a, b) {
                    if (a.nom_formation === b.nom_formation) {
                        return a.cycle.localeCompare(b.cycle);
                    }
                    return a.nom_formation.localeCompare(b.nom_formation);
                });
                data.forEach((el) => {
                    appendFormation(
                        el.cycle,
                        el.id,
                        el.nom_formation,
                        el.cout_formation
                    );
                });
            },
            error: function (error) {
                console.error(error);
            },
        });
    }

    listesFormations();
    const regexLicence = /licence/gi;
    const regexMaster = /master/gi;
    const regexIngenieur = /ingenieur/gi;

    function appendFormation(cycle, id, nom_formation, price) {
        const formationLink = (id_formation) =>
            `<a class="btn list-group-item list-group-item-action formation-list-group" data-formationID="${id_formation}" data-price="${price}" id="formation-id-${id_formation}">${nom_formation} ${cycle}</a>`;

        if (regexLicence.test(cycle)) {
            $("#formation-licence").append(formationLink(id)); // Add # before formation-licence
        } else if (regexMaster.test(cycle)) {
            $("#formation-master").append(formationLink(id)); // Add # before formation-master
        } else if (regexIngenieur.test(cycle)) {
            $("#formation-ingenieur").append(formationLink(id)); // Add # before formation-ingenieur
        }
    }

    $(".form-submit").on("submit", function (e) {
        e.preventDefault();
        const btnSubmitUserInfos = document.getElementById(
            "btn-submit-personnal-informations"
        );
        const btnSubmitDocuments = document.getElementById(
            "btn-submit-documents"
        );
        const btnSubmitFeedback = document.getElementById(
            "btn-submit-feedback"
        );
    });

    $("#candidate").on("click", function () {});
});
