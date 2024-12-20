function fetchQuestions() {
    fetch('http://localhost/projetQuizz/new/App/routes/api.php?questions=true', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        startQuiz(data);
        
    })
    .catch(error => {
        console.error('Erreur:', error);
        
    });
}

const questionsContainer = document.getElementById('questions');
const scoresContainer = document.getElementById('scores');
const timerElement = document.getElementById('time');

let currentQuestionIndex = 0;
let tempsRestant = 10;
let score = 0;
let reponse = false;
let timer;

function startQuiz(questions) {
    questionDisplay(currentQuestionIndex, questions);
}

function questionDisplay(index, questions) {
    while (questionsContainer.firstChild) {
        questionsContainer.removeChild(questionsContainer.firstChild);
    }
    const q = questions[index];
    const questionDiv = document.createElement('div');
    const questionLabel = document.createElement('label');
    questionLabel.textContent = q.texte_question;
    questionDiv.appendChild(questionLabel);
    const table = document.createElement('table');
    table.style.borderSpacing = '10px';
    const tableau = document.createElement('tbody');

    for (let i = 0; i < q.answers.length; i += 2) {
        const ligne = document.createElement('tr');

        for (let j = i; j < i + 2; j++) {
            if (q.answers[j]) {
                const cell = document.createElement('td');
                cell.classList.add('option-cell');
                const radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = 'question';
                radio.value = q.answers[j].texte_reponse;
                radio.classList.add('option-input');
                radio.addEventListener('change', () => {
                    document.querySelectorAll('.option-cell').forEach(cell => cell.classList.remove('selected'));
                    cell.classList.add('selected');
                });
                const label = document.createElement('label');
                label.textContent = q.answers[j].texte_reponse;
                label.classList.add('option-label');
                cell.appendChild(radio);
                cell.appendChild(label);
                ligne.appendChild(cell);
            }
        }

        tableau.appendChild(ligne);
    }

    table.appendChild(tableau);
    questionDiv.appendChild(table);
    questionsContainer.appendChild(questionDiv);
    startTimer(questions);
}

function startTimer(questions) {
    tempsRestant = 10;
    timerElement.textContent = tempsRestant;
    timer = setTimeout(() => updateTimer(questions), 1000);
}

function updateTimer(questions) {
    tempsRestant--;
    timerElement.textContent = tempsRestant;
    if (tempsRestant > 0) {
        timer = setTimeout(() => updateTimer(questions), 1000);
    } else {
        validerReponse(questions);
    }
}

function validerReponse(questions) {
    if (reponse) return;
    reponse = true;
    const bonneReponse = questions[currentQuestionIndex].answers.find(answer => answer.correcte === answer.texte_reponse).texte_reponse;
    const radios = questionsContainer.querySelectorAll('input[name="question"]');
    radios.forEach(radio => {
        if (radio.value === bonneReponse) {
            radio.parentElement.classList.add('correct');
        }
        radio.disabled = true;
    });
    const selectedRadio = questionsContainer.querySelector('input[name="question"]:checked');
    if (selectedRadio && selectedRadio.value === bonneReponse) {
        score += 1; // ou toute autre valeur de score que tu souhaites ajouter
    }
    updateScore();
    setTimeout(() => {
        reponse = false;
        prochaineQuestion(questions);
    }, 3000);
}

function prochaineQuestion(questions) {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        questionDisplay(currentQuestionIndex, questions);
    } else {
        // ICI POUR LA FIN DU QUIZ
        alert('Quiz terminé ! Votre score est de ' + score);
    }
}

function updateScore() {
    scoresContainer.textContent = `Score: ${score}`;
}

window.onload = fetchQuestions;
