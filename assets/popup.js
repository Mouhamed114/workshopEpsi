// Importation de SweetAlert2
import Swal from 'sweetalert2';

//le bouton "Réserver" est généré dynamiquement après le chargement initial,
// un écouteur d'événements standard ne pourra pas s'appliquer.
// Le délégateur d'événements permet de s'assurer que même après une modification du DOM, 
//l'écouteur reste actif.
document.addEventListener('click', (event) => {
    if (event.target && event.target.id === 'reserve-button') {
        event.preventDefault();
        console.log('Bouton cliqué');
        showSweetAlert();
    }
});


// Vérifier si le document est prêt
document.addEventListener('DOMContentLoaded', () => {
    const reserveButton = document.querySelector('#reserve-button');
    
    if (reserveButton) {
        console.log('Bouton "Réserver" trouvé'); // Vérifie si le bouton est bien trouvé
        reserveButton.addEventListener('click', (event) => {
            console.log('Bouton cliqué');
            showSweetAlert();
        });
    } else {
        console.error('Le bouton #reserve-button n\'a pas été trouvé.');
    }
});

function showSweetAlert() {
    
    Swal.fire({
        title: 'Confirmation de réservation',
        text: "Êtes-vous sûr de vouloir réserver?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6', // Couleur du bouton "Oui" dans la première alerte
        cancelButtonColor: '#d33', // Couleur du bouton "Non" dans la première alerte
        confirmButtonText: 'Oui',
        cancelButtonText: 'Non'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Réservation confirmée!',
                text: 'Votre réservation a été enregistrée.',
                icon: 'success',
                confirmButtonColor: '#4CAF50' // couleur pour le bouton "OK"
            });
        }else {
            console.log('Réservation annulée'); // Savoir si l'utilisateur annule
        }
    });
    
}

