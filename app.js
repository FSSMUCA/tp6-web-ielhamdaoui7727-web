const numberAInput = document.getElementById('numberA');
const numberBInput = document.getElementById('numberB');
const operationSelect = document.getElementById('operation');
const calcBtn = document.getElementById('calcBtn');
const errorDiv = document.getElementById('error');
const historyContainer = document.getElementById('history');
const clearHistoryBtn = document.getElementById('clearBtn');

let historyOperations = [];

function displayError(message) {
    errorDiv.textContent = message;
    errorDiv.style.display = 'block';
}

function hideError() {
    errorDiv.textContent = '';
    errorDiv.style.display = 'none';
}

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
            return NaN;
    }
}

function updateHistoryDisplay() {
    historyContainer.innerHTML = '';

    if (historyOperations.length === 0) {
        historyContainer.innerHTML = '<p class="empty-message">Aucune opération effectuée</p>';
        clearHistoryBtn.style.display = 'none';
    } else {
        historyOperations.forEach(item => {
            const historyItemDiv = document.createElement('div');
            historyItemDiv.classList.add('history-item');

            const operationText = document.createElement('strong');
            const displayResult = isFinite(item.result) ? item.result.toFixed(2) : 'Indéfini';
            operationText.textContent = `${item.numA} ${item.op} ${item.numB} = ${displayResult}`;
            
            const timestamp = document.createElement('small');
            timestamp.textContent = new Date(item.date).toLocaleTimeString('fr-FR');
            
            historyItemDiv.appendChild(operationText);
            historyItemDiv.appendChild(document.createElement('br'));
            historyItemDiv.appendChild(timestamp);

            historyContainer.prepend(historyItemDiv);
        });
        clearHistoryBtn.style.display = 'block';
    }
}

calcBtn.addEventListener('click', () => {
    hideError();
    const numA = parseFloat(numberAInput.value.trim());
    const numB = parseFloat(numberBInput.value.trim());
    const operation = operationSelect.value;
    const valA = numberAInput.value.trim();
    const valB = numberBInput.value.trim();

    if (valA === '' || valB === '') {
        displayError('⚠️ Veuillez remplir les deux champs numériques.');
        return;
    }
    
    if (isNaN(numA) || isNaN(numB)) {
        displayError('⚠️ Les entrées doivent être des nombres valides.');
        return;
    }

    if (operation === '/' && numB === 0) {
        displayError('🚫 Erreur : Division par zéro est interdite.');
        return;
    }

    const result = calculate(numA, numB, operation);

    const newOperation = {
        numA: numA,
        numB: numB,
        op: operation,
        result: result,
        date: new Date().getTime()
    };
    
    historyOperations.push(newOperation);
    
    const displayResult = isFinite(result) ? result.toFixed(2) : 'Indéfini';
    const successMessage = `✅ Calcul effectué : ${numA} ${operation} ${numB} = ${displayResult}`;
    displayError(successMessage);
    setTimeout(hideError, 3000); 

    updateHistoryDisplay();
});

clearHistoryBtn.addEventListener('click', () => {
    if (confirm('Êtes-vous sûr de vouloir effacer tout l\'historique ?')) {
        historyOperations = [];
        updateHistoryDisplay();
        hideError();
        displayError('Historique effacé avec succès.');
        setTimeout(hideError, 2000);
    }
});

document.addEventListener('DOMContentLoaded', updateHistoryDisplay);