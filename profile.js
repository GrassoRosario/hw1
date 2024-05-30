function createBoxElement(data, isBasket) {
    const box = document.createElement("div");
    box.classList.add("box");

    const img = document.createElement('img');
    img.src = data.pet_sfondo;
    img.classList.add("box-img");
    const pet = document.createElement('span');
    pet.textContent = data.pet;
    const tipo = document.createElement('span');
    tipo.textContent = data.tipo_adozione;
    const quantita = document.createElement('span');
    quantita.textContent = data.quantita_adozione;
    const kit = document.createElement('span');
    kit.textContent = data.tipo_kit;
    const regalo = document.createElement('span');
    if(data.adozione_regalo == 1){
        regalo.textContent='Questa adozione è un regalo';
    }
    else regalo.textContent= 'Questa adozione non è un regalo';
    
    box.appendChild(img);
    box.appendChild(pet);
    box.appendChild(tipo);
    box.appendChild(quantita);
    box.appendChild(kit);
    box.appendChild(regalo);

    if (isBasket) {
        const RemoveButton = document.createElement('button');
        RemoveButton.classList.add("removeButton");
        RemoveButton.textContent = 'RIMUOVI DAL CARRELLO';
        RemoveButton.dataset.id = data.id;
        RemoveButton.addEventListener('click', fetch_basket_remove);

        const ConfirmButton = document.createElement('button');
        ConfirmButton.classList.add("confirmButton");
        ConfirmButton.textContent = 'CONFERMA ACQUISTO';
        ConfirmButton.dataset.id = data.id;
        ConfirmButton.addEventListener('click', fetch_adoption_add);

        box.appendChild(RemoveButton);
        box.appendChild(ConfirmButton);
    } else {
        const dataElem = document.createElement('span');
        dataElem.textContent = "Data pagamento: " + data.data;
        box.appendChild(dataElem);
    }

    return box;
}



function onAdoptionsJson(json) {
    const espositore = document.querySelector('#contenuto_adozioni');
    espositore.innerHTML = '';
    

    for (let adoption of json) {

        const box = createBoxElement(adoption, false);
        espositore.appendChild(box);

    }
}



function onJson(json) {
    const espositore = document.querySelector('#contenuto_carrello');
    espositore.innerHTML = '';

    for (let basket_row of json) {

        const box = createBoxElement(basket_row, true);
        espositore.appendChild(box);

    }
}



function onError(error) {
    console.log('Error: ' + error);
}

function onResponse(response) {
    return response.json();
}


fetch("basket_content.php").then(onResponse, onError).then(onJson);
fetch("adoptions_content.php").then(onResponse, onError).then(onAdoptionsJson);



function aggiornaEspositoreBasket(){
    fetch("basket_content.php").then(onResponse, onError).then(onJson);
}

function aggiornaEspositoreAdoption(){
    fetch("adoptions_content.php").then(onResponse, onError).then(onAdoptionsJson);

}


function fetch_basket_remove(event){
    const id = event.currentTarget.dataset.id;
    fetch("basket_remove.php?q=" + id).then(aggiornaEspositoreBasket);
}


function dispatchResponse(response) {
    console.log('fetch superata');
    return response.json(); 
}
  
function dispatchError(error) { 
    console.log("Errore");
}
  
function databaseResponse(json) {
    if (!json.ok) {
        dispatchError();
        return null;
    }
    else {
        console.log('confirm button: adoption_add works, now is refresh time ... ');
        aggiornaEspositoreBasket();
        aggiornaEspositoreAdoption();
    }
}

function fetch_adoption_add(event){
    console.log('confirm button starts working');
    const id = event.currentTarget.dataset.id;
    fetch("adoption_add.php?q=" + id).then(dispatchResponse, dispatchError).then(databaseResponse);

}

