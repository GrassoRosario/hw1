function jsonCheckEmail(json) { // json.exists-> se è falso l'email non è mai stata usata

    const paragraph= document.querySelector('p.email')
    const errordiv = document.createElement('div');
    errordiv.classList.add('errore')
    const content = document.createElement('span');
    
    
    if (json.exists) {
    content.textContent = 'Email già utilizzata';
    errordiv.appendChild(content);
    paragraph.appendChild(errordiv);
    }
}

function jsonCheckUsername(json) {
    const paragraph= document.querySelector('p.username')
    const errordiv = document.createElement('div');
    errordiv.classList.add('errore')
    const content = document.createElement('span');
    
    
    if (json.exists) {
    content.textContent = 'Username già utilizzata';
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
         case "email":  
                        if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(target.value).toLowerCase())) {
                            content.textContent = 'Formato non valido';
                            errordiv.appendChild(content);
                            paragraph.appendChild(errordiv);
                    
                        } else {
                            fetch("check_email.php?q="+encodeURIComponent(String(target.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
                        }
                        break;

         case "nome":
         case "cognome":  
                                    if(!/^[a-zA-Z]{1,15}$/.test(target.value)) {

                                        content.textContent = 'Può contenere solo lettere';
                                        errordiv.appendChild(content);
                                        paragraph.appendChild(errordiv);
                                
                                    }

                         break;
                        
        case "ntelefono":   
                                if(/^\+\d{2}/.test(target.value)){
                                    content.textContent = 'Non inserire il prefisso';
                                    errordiv.appendChild(content);
                                    paragraph.appendChild(errordiv);
                                } 

                                else if(!/^\d{3} \d{3} \d{4}$/.test(target.value)) {

                                    content.textContent = 'Inserire nel formato:000 000 0000';
                                    errordiv.appendChild(content);
                                    paragraph.appendChild(errordiv);
                            
                                }

                        break;
        case "datanascita":  
                                if(!/^\d{2}\/\d{2}\/\d{4}$/.test(target.value)){
                                    content.textContent = 'Inserire nel formato:gg/mm/aaaa';
                                    errordiv.appendChild(content);
                                    paragraph.appendChild(errordiv);
                                } else {

                                    const arraydate = target.value.split('/');

                                    const day = arraydate[0];
                                    const month = arraydate[1];
                                    const year = arraydate[2];

                                    if (day<0 || day>30 || month<0 || month>12 || year<1923){ 

                                        content.textContent = 'Data non valida';
                                        errordiv.appendChild(content);
                                        paragraph.appendChild(errordiv);
                                    }

                                    if(year>2006){
                                        content.textContent = 'Puoi iscriverti solo se maggiorenne';
                                        errordiv.appendChild(content);
                                        paragraph.appendChild(errordiv);

                                    }

                                }
                        break;
        case "codicefiscale":  
                                if(!/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/.test(target.value)){
                                    content.textContent = 'Inserire nel formato:AAAAAA00A00A000A';
                                    errordiv.appendChild(content);
                                    paragraph.appendChild(errordiv);
                                } 
                        break;
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

    if(target.value.length===0 && target.name !== 'codicefiscale'){
        content.textContent = 'Compilare questo campo';
        errordiv.appendChild(content);
        paragraph.appendChild(errordiv);
       

    }
    else{
        
        controllaFormato(target);}
}



const form = document.querySelector('form');
form.email.addEventListener('blur', compilazioneObbligatoria);
form.nome.addEventListener('blur', compilazioneObbligatoria);
form.cognome.addEventListener('blur', compilazioneObbligatoria);
form.ntelefono.addEventListener('blur', compilazioneObbligatoria);
form.datanascita.addEventListener('blur', compilazioneObbligatoria);
form.codicefiscale.addEventListener('blur', compilazioneObbligatoria);
form.username.addEventListener('blur', compilazioneObbligatoria);
form.password.addEventListener('blur', compilazioneObbligatoria);



// SFONDO VARIANTE

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