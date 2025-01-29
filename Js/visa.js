document.getElementById("visaForm").addEventListener("submit", function(event) {
    var nationalite = document.getElementById("nationalite").value;
    var dateCreation = document.getElementById("date_creation").value;
    var dateValidite = document.getElementById("date_validite").value;

    // Vérifier la nationalité (exemple simple)
    var nationalitesAutorisees = ["france", "espagne", "usa"];
    if (!nationalitesAutorisees.includes(nationalite)) {
        alert("Désolé, votre nationalité ne peut pas faire une demande de visa pour l'Algérie.");
        event.preventDefault(); // Empêche l'envoi du formulaire
        return;
    }

    // Vérifier que la date de création du passeport n'est pas dans le futur
    var today = new Date();
    var creationDate = new Date(dateCreation);
    if (creationDate > today) {
        alert("La date de création du passeport ne peut pas être dans le futur.");
        event.preventDefault();
        return;
    }

    // Vérifier que le passeport est valide pendant 6 mois
    var validiteDate = new Date(dateValidite);
    var sixMonthsLater = new Date();
    sixMonthsLater.setMonth(sixMonthsLater.getMonth() + 6);

    if (validiteDate < sixMonthsLater) {
        alert("Votre passeport doit être valide pour au moins 6 mois à partir d'aujourd'hui.");
        event.preventDefault();
        return;
    }
});
