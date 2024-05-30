function Onclick(event){
    const target = event.target;
    const buttons = target.parentNode.querySelectorAll('button');

    if(!target.classList.contains('current')){
        for(let b of buttons){
            b.classList.remove('current');
            b.classList.remove('selected');
            b.classList.add('unselected');
        }

        target.classList.add('current');
        target.classList.add('selected');
        target.classList.remove('unselected');

    }
    
    if(target.parentNode == document.querySelector('#tipo-donazione')){

        const button_quantita = document.querySelectorAll('.button-quantita1, .button-quantita2 ');
            
        if(target.textContent == 'Donazione singola'){

            button_quantita[0].textContent='30€';
            if (!button_quantita[0].classList.contains('button-quantita1') && button_quantita[0].classList.contains('button-quantita2')){
                button_quantita[0].classList.add('button-quantita1');
                button_quantita[0].classList.remove('button-quantita2');
            }

            button_quantita[1].textContent='50€';
            if (!button_quantita[1].classList.contains('button-quantita1') && button_quantita[1].classList.contains('button-quantita2')){
                button_quantita[1].classList.add('button-quantita1');
                button_quantita[1].classList.remove('button-quantita2');
            }

            button_quantita[2].textContent='80€';
            if (!button_quantita[2].classList.contains('button-quantita1') && button_quantita[2].classList.contains('button-quantita2')){
                button_quantita[2].classList.add('button-quantita1');
                button_quantita[2].classList.remove('button-quantita2');
            }

        }


        else{
            
            button_quantita[0].textContent='9€/mese';
            button_quantita[0].classList.add('button-quantita2');
            button_quantita[0].classList.remove('button-quantita1');

            button_quantita[1].textContent='12€/mese';
            button_quantita[1].classList.add('button-quantita2');
            button_quantita[1].classList.remove('button-quantita1');

            button_quantita[2].textContent='15€/mese';
            button_quantita[2].classList.add('button-quantita2');
            button_quantita[2].classList.remove('button-quantita1');
        }
        

    }
    
    

}   

function MouseOn(event){
    const target = event.target;
    if(!target.classList.contains('current')){

        if(target.classList.contains('selected')){
            target.classList.remove('selected');
            target.classList.add('unselected');
        }
        else{
            target.classList.add('selected');
            target.classList.remove('unselected');
        }  
    }
}


const buttons_form = document.querySelectorAll('button');
for(let b of buttons_form){
    b.addEventListener('click', Onclick);
    b.addEventListener('mouseover', MouseOn);
    b.addEventListener('mouseleave', MouseOn);

}



function scrollFix(event){
    const formAdozione = document.querySelector('#form-section');
    const rect=formAdozione.getBoundingClientRect();
    //const elementTop = rect.top + window.scrollY;
    //const elementBottom = rect.bottom + window.scrollY;
    console.log(window.scrollY);
    //console.log(rect.top);
        if(window.scrollY < 150){
            formAdozione.classList.add('form-start-position');
            formAdozione.classList.remove('form-end-position');
            formAdozione.classList.remove('form-fixed');
        }

        else if (window.scrollY >= 150 && window.scrollY <= 3250) {
            formAdozione.classList.add('form-fixed');
            formAdozione.classList.remove('form-start-position');
            formAdozione.classList.remove('form-end-position');

        } else {
            formAdozione.classList.add('form-end-position');
            formAdozione.classList.remove('form-fixed');
            formAdozione.classList.remove('form-start-position');

        }
        
}

//const formAdozione = document.querySelector('#form-section');
//formAdozione.addEventListener('scroll', scrollFix);
document.addEventListener('scroll',scrollFix);



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
  

function adoptionSubmit(event){
    const tipo_adozione= document.querySelector('#tipo-donazione .current');
    const quantita_adozione = document.querySelector('#quantita-donazione .current');
    const tipo_kit = document.querySelector('#kit-buttons .current');
    const checkbox = document.querySelector('#checkbox');
    const checkbox_regalo = document.querySelector('#checkbox-regalo');
    let adozione_regalo = true;

    if(checkbox.checked){

        if(tipo_kit.textContent == 'Welcome Kit con Peluche')
            tipo_kit.textContent = 'Kit Peluche Junior';
        else 
            tipo_kit.textContent = 'Kit Digitale Junior';

    }

    if(checkbox_regalo.checked)
        adozione_regalo = true;
    else 
         adozione_regalo = false;


    fetch("basket_insert.php?tipo_adozione=" + tipo_adozione.textContent + "&quantita_adozione=" + quantita_adozione.textContent
        + "&tipo_kit=" + tipo_kit.textContent + "&adozione_regalo=" + adozione_regalo).then(dispatchResponse, dispatchError).then(databaseResponse);
    console.log(adozione_regalo);

}

const submit_form= document.querySelector('#form-fine a');
submit_form.addEventListener('click', adoptionSubmit);