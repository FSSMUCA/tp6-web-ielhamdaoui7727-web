// 1. Récupération des éléments du DOM
const numberAInput = document.getElementById('numberA');
const numberBInput = document.getElementById('numberB');
const operationSelect = document.getElementById('operation');
const calcBtn = document.getElementById('calcBtn');
const errorDiv = document.getElementById('error');
const historyContainer = document.getElementById('history');
const clearHistoryBtn = document.getElementById('clearBtn');

// Tableau pour stocker l'historique des opérations (JS Array)
let historyOperations = [];

// Fonction pour afficher un message d'erreur
function displayError(message) {
    errorDiv.textContent = message;
    errorDiv.style.display = 'block'; // Affiche la div d'erreur
}

// Fonction pour masquer le message d'erreur
function hideError() {
    errorDiv.textContent = '';
    errorDiv.style.display = 'none'; // Masque la div d'erreur
}

// Fonction pour effectuer le calcul
function calculate(a, b, operation) {
    switch (operation) {
        case '+':
            return a + b;
        case '-':
            return a - b;
        case '*':
            return a * b;
        case '/':
            return a / b;
        default:
            return NaN; // Not a Number pour les opérations non reconnues
    }
}

// Fonction pour mettre à jour l'affichage de l'historique
function updateHistoryDisplay() {
    // Vider le contenu actuel de l'historique
    historyContainer.innerHTML = '';

    if (historyOperations.length === 0) {
        // Afficher le message par défaut si l'historique est vide
        historyContainer.innerHTML = '<p class="empty-message">Aucune opération effectuée</p>';
        clearHistoryBtn.style.display = 'none'; // Masquer le bouton Effacer
    } else {
        // Afficher les opérations sous forme de liste
        historyOperations.forEach(item => {
            const historyItemDiv = document.createElement('div');
            historyItemDiv.classList.add('history-item');

            const operationText = document.createElement('strong');
            // Formater l'affichage : "A [op] B = Résultat"
            const displayResult = isFinite(item.result) ? item.result.toFixed(2) : 'Indéfini';
            operationText.textContent = `${item.numA} ${item.op} ${item.numB} = ${displayResult}`;
            
            const timestamp = document.createElement('small');
            timestamp.textContent = new Date(item.date).toLocaleTimeString('fr-FR');
            
            historyItemDiv.appendChild(operationText);
            historyItemDiv.appendChild(document.createElement('br')); // Saut de ligne
            historyItemDiv.appendChild(timestamp);

            historyContainer.prepend(historyItemDiv); // Ajouter au début pour un affichage LIFO (dernier ajouté en haut)
        });
        clearHistoryBtn.style.display = 'block'; // Afficher le bouton Effacer
    }
}

// Gestionnaire d'événement pour le bouton Calculer
calcBtn.addEventListener('click', () => {
    hideError(); // Masquer toute erreur précédente

    // Récupérer et convertir les valeurs des champs
    const numA = parseFloat(numberAInput.value.trim());
    const numB = parseFloat(numberBInput.value.trim());
    const operation = operationSelect.value;
    
    // Récupérer les valeurs de chaîne originales pour la validation
    const valA = numberAInput.value.trim();
    const valB = numberBInput.value.trim();

    // 2. Validation des données
    // Vérifier que les champs ne sont pas vides
    if (valA === '' || valB === '') {
        displayError('⚠️ Veuillez remplir les deux champs numériques.');
        return;
    }
    
    // Vérifier si les valeurs sont bien des nombres après conversion
    if (isNaN(numA) || isNaN(numB)) {
        displayError('⚠️ Les entrées doivent être des nombres valides.');
        return;
    }

    // Interdire la division par zéro
    if (operation === '/' && numB === 0) {
        displayError('🚫 Erreur : Division par zéro est interdite.');
        return;
    }

    // 3. Effectuer le calcul
    const result = calculate(numA, numB, operation);

    // 4. Ajouter l'opération à l'historique
    const newOperation = {
        numA: numA,
        numB: numB,
        op: operation,
        result: result,
        date: new Date().getTime()
    };
    
    // Ajouter l'opération au tableau
    historyOperations.push(newOperation);
    
    // Afficher le résultat dans un message d'erreur temporaire/confirmation (non demandé, mais utile)
    const displayResult = isFinite(result) ? result.toFixed(2) : 'Indéfini';
    const successMessage = `✅ Calcul effectué : ${numA} ${operation} ${numB} = ${displayResult}`;
    displayError(successMessage);
    // Masquer le message de succès après 3 secondes (optionnel)
    setTimeout(hideError, 3000); 

    // 5. Mettre à jour l'affichage de l'historique
    updateHistoryDisplay();
});

// Gestionnaire d'événement pour le bouton Effacer l'historique
clearHistoryBtn.addEventListener('click', () => {
    if (confirm('Êtes-vous sûr de vouloir effacer tout l\'historique ?')) {
        historyOperations = []; // Vider le tableau
        updateHistoryDisplay(); // Mettre à jour l'affichage
        hideError();
        displayError('Historique effacé avec succès.');
        setTimeout(hideError, 2000);
    }
});

// Initialisation de l'affichage de l'historique au chargement de la page
document.addEventListener('DOMContentLoaded', updateHistoryDisplay);