// Charger les résultats depuis la base de données
function load() {
  $.ajax({
    url: "function.php",
    method: "GET",
    dataType: "json",
    success: function (results) {
      let html = "<h2>Résultat sauvegardé</h2><ul>";
      results.forEach((result) => {
        html += `<li>${result.firstName} ${result.lastName} a eu ${result.grade1} /20 et ${result.grade2} /20 soit une moyenne de ${result.average} /20</li>`;
      });
      html += "</ul>";
      $(".result").html(html); // Affichage des résultats
    },
    error: function () {
      alert("Erreur lors de l'affichage des résultats");
    },
  });
}

// Gérer l'envoi du formulaire
$("#form").on("submit", function (e) {
  e.preventDefault();

  // Récupérer les valeurs du formulaire
  const firstName = $("#firstName").val();
  const lastName = $("#lastName").val();
  const grade1 = parseFloat($("#grade1").val());
  const grade2 = parseFloat($("#grade2").val());
  const average = ((grade1 + grade2) / 2).toFixed(2);

  //-------- Projet 1-------------
  //   $(".result").text(
  //     `L'étudiant(e) ${firstName} ${lastName} a eu une moyenne de ${average} / 20`
  //   );
  // });
  // -----------------------------

  // Envoyer les données via AJAX
  $.ajax({
    url: "function.php",
    method: "POST",
    dataType: "json",
    data: {
      firstName: firstName,
      lastName: lastName,
      grade1: grade1,
      grade2: grade2,
      average: average,
    },
    success: function (response) {
      if (response.success) {
      } else if (response.error) {
        alert(response.error); // Afficher un message d'erreur
      }
      load(); // Rafraîchir les résultats
    },
    error: function () {
      alert("Erreur lors de la sauvegarde des résultats");
    },
  });

  // Réinitialiser les champs du formulaire après soumission
  $("#form")[0].reset();
});

// Charger les résultats au démarrage
load();
