
function jsonCheckUsername(json) {
    const paragraph= document.querySelector('p.username')
    const errordiv = document.createElement('div');
    errordiv.classList.add('errore')
    const content = document.createElement('span');
    
    // exists contiene vero se 'username è presente
    if (!json.exists) {
    content.textContent = 'Username non presente';
    errordiv.appendChild(content);
    paragraph.appendChild(errordiv);
    }
}

function fetchResponse(response) {
    if (!response.ok) 
        return null;
    else 
        return response.json();
}




function controllaFormato(target){
    errore= document.querySelectorAll('.errore');
    if(errore.length > 0){
        console.log('ci sono errori da togliere')
        for(let err of errore)
        err.remove(); 
    }
        
    const paragraph = target.parentNode.parentNode;
    const errordiv = document.createElement('div');
    errordiv.classList.add('errore')
    const content = document.createElement('span');

    switch (target.name) {
        
        case "username": 
                            if(!/^[a-zA-Z0-9!£$%&()?]{1,15}$/.test(target.value)) {

                                content.textContent = 'Username può contenere solo lettere numeri e i simboli: !, ?, £, $, %, &, (, ) ';
                                errordiv.appendChild(content);
                                paragraph.appendChild(errordiv);
                                
                                } else {
                                fetch("check_username.php?q="+encodeURIComponent(target.value)).then(fetchResponse).then(jsonCheckUsername);
                                }

                        break;
        case "password":  
                            if(!/.{8,}/.test(target.value)) {

                                content.textContent = 'Password deve contenere almeno 8 caratteri';
                                errordiv.appendChild(content);
                                paragraph.appendChild(errordiv);
                                
                            } else if(!/.*\d.*/.test(target.value)) {

                                content.textContent = 'Password deve contenere almeno un numero';
                                errordiv.appendChild(content);
                                paragraph.appendChild(errordiv);

                            }else if(!/.*[!£$&()?^#@*].*/.test(target.value)) {

                                    content.textContent = 'Password deve contenere almeno uno dei seguenti caratteri: ! , £ , $ , & , ( , ) , ? , ^ , # , @ , *';
                                    errordiv.appendChild(content);
                                    paragraph.appendChild(errordiv);
                            }
                        break;

        }

}

function compilazioneObbligatoria(event){
    const target = event.target;
    const paragraph = target.parentNode.parentNode;
    const errordiv = document.createElement('div');
    errordiv.classList.add('errore')
    const content = document.createElement('span');

    errore= document.querySelectorAll('.errore');
    if(errore.length > 0){
    for(let err of errore)
    err.remove(); 
    }

    if(target.value.length===0){

    content.textContent = 'Compilare questo campo';
    errordiv.appendChild(content);
    paragraph.appendChild(errordiv);

    }
    else{
    controllaFormato(target);}
}




const ListaSfondi = [
    'immagini/panda-carousel.jpg',
    'immagini/lupo-carousel.jpg',
    'immagini/giaguaro-carousel.jpg',
    'immagini/elefanti-carousel2.jpg',
    'immagini/tartaruga-carousel.jpg',
    'immagini/leone-carousel.jpg',
]


function carousel(event) {
    const img = document.querySelector('#sfondo');
    

     switch (img.dataset.id) {
        case "panda":
            img.src = ListaSfondi[1];
            img.dataset.id = "lupo"
         break;
        case "lupo":
            img.src = ListaSfondi[2];
            img.dataset.id = "giaguaro"
            break;
        case "giaguaro":
            img.src = ListaSfondi[3];
            img.dataset.id = "elefanti"
            break;
        case "elefanti":
            img.src = ListaSfondi[4];
            img.dataset.id = "tartaruga"
            break;
        case "tartaruga":
            img.src = ListaSfondi[5];
            img.dataset.id = "leone"
            break;
        case "leone":
            img.src = ListaSfondi[0];
            img.dataset.id = "panda"
            break;
     }

}
setInterval(carousel, 5000);

const img = document.querySelector('#sfondo');
img.addEventListener('click',carousel)

const form = document.querySelector('form');

form.username.addEventListener('blur', compilazioneObbligatoria);
form.password.addEventListener('blur', compilazioneObbligatoria);


