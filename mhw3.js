/* DROPBOX */

function dropboxReveal(event) {
    const dropboxHidden = document.querySelector('#dropbox-hidden');
    dropboxHidden.classList.remove('hidden');

    const plus = document.querySelector('#dropbox a.dropbox-items .material-symbols-outlined');  // individua il plus presente nel primo tasto
    plus.textContent = "remove"; // lo sostituisce con un simbolo simile al meno sfruttando il modo in cui opera google icons
}

function dropboxUnReveal(event) {
    const dropboxHidden = document.querySelector('#dropbox-hidden');
    dropboxHidden.classList.add('hidden');

    const minus = document.querySelector('#dropbox a.dropbox-items .material-symbols-outlined');
    minus.textContent = "add";
}


const dropboxFirstItem = document.querySelector('#dropbox a.dropbox-items');
dropboxFirstItem.addEventListener('mouseover', dropboxReveal);


const dropboxHidden = document.querySelector('#dropbox-hidden');
dropboxHidden.addEventListener('mouseleave', dropboxUnReveal);


dropboxHidden.addEventListener('mouseover', dropboxReveal);
dropboxFirstItem.addEventListener('mouseleave', dropboxUnReveal);   // Quando il cursore lascia il primo tasto il dropbox-hidden: 1) scompare se il cursore non va su di esso 2) rimane se il cursore va su di esso








/* HEADER DINAMICO MOBILE */

const ListaSfondi = [
    'immagini/backgorund-image-elephant-1-1.jpg',
    'immagini/tigre_mobile.jpg.webp',
]


function scrolling(event) {
    const img = document.querySelector('img#sfondo-mobile');
    if (img.dataset.id === "elephant") {
        img.src = ListaSfondi[1];
        img.dataset.id = "tiger"

        // cambiamento del testo

        const ListTitolo = document.querySelectorAll('#corpo_header h1')
        ListTitolo[0].textContent = 'DIVENTA DONATORE REGOLARE';
        ListTitolo[1].textContent = '';

        const ListSottoTitolo = document.querySelectorAll('#corpo_header p')
        ListSottoTitolo[1].textContent = 'Rimani al fianco degli animali in pericolo, ogni giorno';


        const new_tasto = document.createElement('a');
        new_tasto.classList.add('tasto_header');
        new_tasto.textContent = 'DONA ORA';
        const container = document.querySelector('#corpo_header');
        container.appendChild(new_tasto);

    }

    else {
        img.src = ListaSfondi[0];
        img.dataset.id = "elephant"

        // cambiamento del testo

        const ListTitolo = document.querySelectorAll('#corpo_header h1')
        ListTitolo[0].textContent = 'ADOTTA UNA SPECIE ';
        ListTitolo[1].textContent = 'A RISCHIO ';

        const ListSottoTitolo = document.querySelectorAll('#corpo_header p')
        ListSottoTitolo[1].textContent = 'Circa un milione di specie animali e a rischio estinzione: un numero drammatico e preoccupante se pensiamo che il nostro benessere dipende soprattutto da loro.Abbiamo bisogno di te per proteggere questa straordinaria fonte di vita.';
        const new_tasto = document.querySelector('#corpo_header a.tasto_header');
        new_tasto.remove();
    }
}


const arrow = document.querySelectorAll('#arrow-mobile span');
for (const arrows of arrow) {
    arrows.addEventListener('click', scrolling);
}



/*PARTE 3: MENU FOOTER MOBILE*/

function fexpand(event) {

    const expand = event.currentTarget;
    const blocco = expand.parentNode.parentNode;
    const contenuto = blocco.querySelector('.contenuto');

    if (expand.textContent === 'expand_more') {

        // Chiudere tutti i sottomenu gi� aperti 
        const ListContenuto = document.querySelectorAll('.contenuto');
        for (let contenuti of ListContenuto) {
            contenuti.classList.add('hidden-mobile');
        }
        for (const expand of ListExpand) {
            expand.textContent = 'expand_more';
        }

        // Aprire il sottomenu di interesse
        expand.textContent = 'expand_less';
        contenuto.classList.remove('hidden-mobile');

    }
    else {
        expand.textContent = 'expand_more';
        contenuto.classList.add('hidden-mobile');

    }

}

const ListExpand = document.querySelectorAll('.flex-expand  .material-symbols-outlined')
for (const expand of ListExpand) {
    expand.addEventListener('click', fexpand);
}


/* LINKS MENU */

function menuReveal(event) {
    const menu = document.querySelector('div#links-menu');
    menu.classList.remove('hidden');
    let colonnaUno = document.querySelector('#colonna-uno');
    let colonnaDue = document.querySelector('#colonna-due');
    let colonnaTre = document.querySelector('#colonna-tre');

    colonnaUno.innerHTML = '';
    colonnaDue.innerHTML = '';
    colonnaTre.innerHTML = '';
    
    switch (event.target) {
        case links[0]:

            let titolo = document.createElement('h1');
            titolo.textContent = "DONAZIONE REGOLARE";
            let link1 = document.createElement('a');
            link1.textContent = "WWF for Italy";
            let link2 = document.createElement('a');
            link2.textContent = "For Nature for Us";
            colonnaUno.appendChild(titolo);
            colonnaUno.appendChild(link1);
            colonnaUno.appendChild(link2);


            let titolo2 = document.createElement('h1');
            titolo2.textContent = "DONAZIONE SINGOLA";
            let link3 = document.createElement('a');
            link3.textContent = "Renature";
            let link4 = document.createElement('a');
            link4.textContent = "GenerAzione Mare";
            let link5 = document.createElement('a');
            link5.textContent = "Sustainable Future";
            colonnaDue.appendChild(titolo2);
            colonnaDue.appendChild(link3);
            colonnaDue.appendChild(link4);
            colonnaDue.appendChild(link5);

            let img = document.createElement('img');
            img.src = 'immagini/orso_marsicano.jpg';
            let link6 = document.createElement('a');
            link6.textContent = "SOS Orso bruno marsicano";
            colonnaTre.appendChild(img);
            colonnaTre.appendChild(link6);


        break;

        case links[1]:
            let titolo3 = document.createElement('h1');
            titolo3.textContent = "ADOZIONI";
            let link7 = document.createElement('a');
            link7.textContent = "Adozione regalo";  
            let link8 = document.createElement('a');
            link8.textContent = "Adozione per me";
            colonnaUno.appendChild(titolo3);
            colonnaUno.appendChild(link7);
            colonnaUno.appendChild(link8);
     
            let img2 = document.createElement('img');
            img2.src = 'immagini/menu_adozioni_orso_polare.webp';
            let link9 = document.createElement('a');
            link9.textContent = "Per la festa della mamma regala un'iscrizione ";
            colonnaTre.appendChild(img2);
            colonnaTre.appendChild(link9);

        break;

        case links[2]:

            let titolo4 = document.createElement('h1');
            titolo4.textContent = "ISCRIZIONI";
            let link10 = document.createElement('a');
            link10.textContent = "Socio";
            let link11 = document.createElement('a');
            link11.textContent = "Socio junior";
            let link12 = document.createElement('a');
            link12.textContent = "Socio famiglia";
            colonnaUno.appendChild(titolo4);
            colonnaUno.appendChild(link10);
            colonnaUno.appendChild(link11);
            colonnaUno.appendChild(link12);



        break;

        case links[3]:
            let titolo5 = document.createElement('h1');
            titolo5.textContent = "JUNIOR";
            let link13 = document.createElement('a');
            link13.textContent = "Adozioni";
            let link14 = document.createElement('a');
            link14.textContent = "Socio junior";
            colonnaUno.appendChild(titolo5);
            colonnaUno.appendChild(link13);
            colonnaUno.appendChild(link14);

            let img3 = document.createElement('img');
            img3.src = 'immagini/menu_junior_tigre.webp';

            let flex3 = document.createElement('span');
            flex3.classList.add('flex_space_between');
            let link15 = document.createElement('a');
            link15.textContent = "Il regalo perfetto per piccoli eroi ed eroine della Natura"
            colonnaTre.appendChild(img3);
            colonnaTre.appendChild(link15);


        break;

        case links[4]:
            let titolo6 = document.createElement('h1');
            titolo6.textContent = "ALTRI MODI PER DONARE";
            let link16 = document.createElement('a');
            link16.textContent = "Donazioni in memoria";
            let link17 = document.createElement('a');
            link17.textContent = "Lasciti testamentari";
            let link18 = document.createElement('a');
            link18.textContent = "Regali Solidali";
            let link19 = document.createElement('a');
            link19.textContent = "5x1000";
            let link20 = document.createElement('a');
            link20.textContent = "Grandi Donatori";
            colonnaUno.appendChild(titolo6);
            colonnaUno.appendChild(link16);
            colonnaUno.appendChild(link17);
            colonnaUno.appendChild(link18);
            colonnaUno.appendChild(link19);
            colonnaUno.appendChild(link20);


        break;


    }
            

     
}

function menuUnreveal(event) {
    const menu = document.querySelector('div#links-menu');
    menu.classList.add('hidden');


}
const links = document.querySelectorAll('#links a');
for (let link of links) {
    link.addEventListener('mouseover', menuReveal);
}

const linksmenu = document.querySelector('div#links-menu');
linksmenu.addEventListener('mouseleave', menuUnreveal);




// TASTO PREFERITI
/*
function buttonreveal(event){
    
    console.log("sono qui");
    const ctarget =event.currentTarget
    const heart = document.createElement('img');
    heart.classList.add("heart");

    ctarget.appendChild(heart);
    console.log(ctarget);
    //heart.addEventListener('click',saveSong );
}

function buttonUnreveal(event){
    console.log("distruggere");
    const ctarget =event.currentTarget
    if(ctarget.querySelector(".heart"))
        ctarget.querySelector(".heart").remove();   //quando si esce dal div rimuove l'heart

}

const pets = document.querySelectorAll('#adotta_animale .animali');
for(let pet of pets){
    pet.addEventListener('mouseover', buttonreveal);
    pet.addEventListener('mouseleave', buttonUnreveal);
}*/

function dispatchResponse(response) {

    console.log(response);
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
}
  



function Preferences(event){
    const heart = event.currentTarget;
    const pet = heart.parentNode.id;

    if(heart.dataset.stato==="NonPreferito"){
        console.log('vero')
        heart.src="immagini/heart-icon_red.png";
        heart.dataset.stato="Preferito"
        fetch('preference_insert.php?q=' + pet).then(dispatchResponse, dispatchError).then(databaseResponse);
        }
    else{
        console.log('falso')
        heart.src="immagini/heart_icon.png";
        heart.dataset.stato="NonPreferito"
        fetch('preference_remove.php?q=' + pet).then(dispatchResponse, dispatchError).then(databaseResponse);
    }

}

const hearts = document.querySelectorAll('.heart')
for(let heart of hearts){
    heart.addEventListener('click', Preferences);
}


function onJSON(json)
{
    for(pet of json)
    {
        const p = document.querySelector('#' + pet);
        const heart = p.querySelector('.heart');
        heart.src="immagini/heart-icon_red.png";
        heart.dataset.stato="Preferito"
    }
}

function onResponse(response){
    return response.json();
}

fetch('preferences_view.php').then(onResponse).then(onJSON);
