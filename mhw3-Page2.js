function onPageResponse(response) {
    return response.json();
}

function onPageJson(json) {
    console.log(json);
    let pageid = null;
    const pages = json.query.pages;
    for (let key in pages) {
        if (typeof pages[key] === 'object' && 'pageid' in pages[key]) {

            pageid = pages[key].pageid;
        }
    }
    let exctract = json.query.pages[pageid].extract;
    exctract = exctract.replace(/=/g, "\n");

    const content = document.createElement('span');
    content.textContent = exctract;

    const pet_info = document.createElement('div');
    pet_info.classList.add('pet_info');
    pet_info.appendChild(content);

    const library = document.querySelector('#pet-article-view');
    library.appendChild(pet_info);

}

function onJson(json) {
    console.log(json);

    const library = document.querySelector('#pet-article-view');
    library.innerHTML = '';

    pet_data = json.pages[0]
    const title = pet_data.title;
    const id = pet_data.id;

    let img_url = 'http:' + pet_data.thumbnail.url;
    img_url = img_url.replace("/thumb/", "/");
    img_url = img_url.split("/60px")[0];

    const pet_info = document.createElement('div');
    pet_info.classList.add('pet_info');
    const img = document.createElement('img');
    img.src = img_url;
    const caption = document.createElement('span');
    caption.textContent = '\n' + title;

    pet_info.appendChild(img);
    pet_info.appendChild(caption);
    library.appendChild(pet_info);

    page_url="search_page.php?q="+ title;  //potrebbe esserci bisogno di usare encodeURIComponent
    fetch(page_url).then(onPageResponse).then(onPageJson);

}


function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
}


function search(event) {
    event.preventDefault();

    fetch("search_animals.php?q="+encodeURIComponent(document.querySelector('#pet').value)).then(onResponse).then(onJson);

}



const form = document.querySelector('form');
form.addEventListener('submit', search);

const selectElem = document.querySelector('select');


//Fetch dal select
selectElem.addEventListener('change', function () {
    const index = selectElem.selectedIndex;
    const form_data = new FormData(form);
    fetch("search_animals.php?q="+selectElem.options[index].value).then(onResponse).then(onJson);
})


