// function convertJson(){
//   let form = document.getElementById("formulaire");
//   let formData = {};
//   for (let i=0; i< form.elements.length; i++){
//     let element = form.elements[i];
//         if (element.type !== "submit") {
//             formData[element.name] = element.value;
//         }
//     }
//     let jsonData = JSON.stringify(formData);
//     let jsonOutput = document.getElementById("jsonOutput");
//     jsonOutput.innerHTML = "<pre>" + jsonData + "</pre>";
// }

// convertJson()


document.getElementById("formulaire").addEventListener('submit',function(event){
  event.preventDefault();

  let firstname = document.getElementById("firstname");
  let lastname = document.getElementById("lastname");
  let email = document.getElementById("email");
  let password = document.getElementById("password")

  let formData = {
    firstname: firstname.value,
    lastname: lastname.value,
    email: email.value,
    password: password.value,
  }

  fetch('https://quizz.adrardev.fr/api/user', {
    method: 'POST',
    header: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(formData)
  })
  .then(reponse => reponse.json())
  .then(formData => {
    if (formData.id) {
      alert('Compte créer avec succès' + JSON.stringify(formData));
    } else {
      alert('Erreur: ' + JSON.stringify(formData))
    }
  })
  .catch(error => {
    console.error('Erreur:', error);
  })
})





// const contactApiSecurePlus =  async () => {
//     try {
//         const rawData = await fetch('https://quizz.adrardev.fr/api/users');
//         console.log(rawData);
        
//         // Vérification du statut de la réponse
//         if (!rawData.ok || rawData.status !== 200) { // Vérification du statut 200
//             console.error("Erreur lors de la récupération des données : ", rawData.statusText);
//             return; // Sortir de la fonction si la réponse n'est pas OK
//         }

//         const transformedData = await rawData.json();
//         console.log(transformedData);
        
//     } catch (error) {
//         console.error("Erreur lors de l'appel à l'API : ", error);
//     }
// }
