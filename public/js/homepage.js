const searchinput = document.getElementById('searchinput');
searchinput.addEventListener('focus',hideSearchButton);
searchinput.addEventListener('blur',showSearchButton);
function hideSearchButton()
{
    const searchbutton = document.getElementById('searchbutton');
    searchbutton.classList.add('hide');
}
function showSearchButton()
{
    const searchbutton = document.getElementById('searchbutton');
    searchbutton.classList.remove('hide');
}
function toggleMostraDiPiu()
{
    const lista = event.currentTarget.querySelector('ul');
    if(lista)
    {
        if(lista.classList.contains('hide'))
        {
            lista.classList.remove('hide')
            event.currentTarget.querySelector('div img').src="uparrow.svg"
        }   
        else 
        {
            lista.classList.add('hide')
            event.currentTarget.querySelector('div img').src="downarrow.svg"
        }
    }
    
}

const opzioniliste = document.querySelectorAll('.opzionelista')
for(opzionelista of opzioniliste)
{
    opzionelista.addEventListener('click',toggleMostraDiPiu);
}

const menubutton = document.getElementById('idmenubutton')
menubutton.addEventListener('click',togglemenu)
const menu = document.getElementById('menuacomparsacontainer')
menu.addEventListener('click',togglemenu)

const ilmioaccount = document.createElement('h1')
ilmioaccount.textContent = "Il mio account"
ilmioaccount.style.fontSize = "24px"

const divbottoni = document.createElement('div')
const bottoneaccedi = document.createElement('button')
bottoneaccedi.textContent = "Accedi"
bottoneaccedi.classList.add('bottonemenu')
bottoneaccedi.style.width = "45%"
divbottoni.classList.add('flexrow')
divbottoni.appendChild(bottoneaccedi)
const bottonecreaccount = document.createElement('button')
bottonecreaccount.innerText = "Crea un account"
bottonecreaccount.classList.add('bottonemenu')
bottonecreaccount.classList.add('sfondoarancione')
bottonecreaccount.style.width = "45%"
divbottoni.appendChild(bottonecreaccount)
divbottoni.style.display = "flex"
divbottoni.style.alignItems = "center"
divbottoni.style.justifyContent = "space-evenly"


function togglemenu()
{
    const menuacomparsacontainer = document.getElementById('menuacomparsacontainer')
    if(menuacomparsacontainer.classList.contains('sotterrato'))
    {
        menuacomparsacontainer.classList.remove('sotterrato')
        showmenu()
    }else{
        menuacomparsacontainer.classList.add('sotterrato')
        hidemenu()
    }
}


function showmenu()
{
    menuacomparsacontainer = document.getElementById('menuacomparsacontainer')
    menuacomparsacontainer.classList.add('sfondooscurato')
    const menuacomparsa = document.getElementById('menuacomparsa')
    menuacomparsa.prepend(divbottoni)
    menuacomparsa.prepend(ilmioaccount)
    
    
    
}           
function hidemenu()
{
    menuacomparsacontainer = document.getElementById('menuacomparsacontainer')
    menuacomparsacontainer.classList.remove('sfondooscurato')
}



function verificaimplementazione()
{
    const implementato = event.currentTarget.dataset.implementato
    if(implementato === "0")
        alert("Funzionalità non ancora implementata")
}

const elementiselettore = document.querySelectorAll('[data-implementato]')
for(elemento of elementiselettore)
{
    elemento.addEventListener('click',verificaimplementazione)
}
const spotifybar = document.getElementById('spotifybar')
const spotifymenu = document.getElementById('spotifymenu') 
spotifybar.addEventListener('click',togglespotifybar)

function togglespotifybar()
{
    if(spotifymenu.style.display !== 'none')
        spotifymenu.style.display = 'none'
    else {
        spotifymenu.style.display = 'flex'
    }
}
contenutopagina = document.getElementById("contenuto")

function preparaformsignup()
{
    const form = document.getElementById("form-signup");
    const errore = document.getElementById("errore");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("conferma-password").value;

        errore.textContent = "";
        if (password.length < 8) {
        errore.style.color ="red";
        errore.textContent = "La password deve essere lunga almeno 8 caratteri.";
        return;
        }

        if (password !== confirmPassword) {
        errore.style.color="red";
        errore.textContent = "Le password non coincidono.";
        return;
        }
        fetch("register.php",{
            method: "POST",
            headers:{
                "Content-Type" : "application/json"
            },
            body: JSON.stringify({email,password})
        }).then(response=>response.json())
        .then(risultato=>{
            if(risultato.success)
            {
                errore.style.color = "green";
                
            }else
            {
                errore.style.color = "red";
            }
            errore.textContent = risultato.message;
        }).catch(()=>{
            errore.style.color = "red";
            errore.textContent = "Impossibile comunicare con il database";
        }
        )
    });
}


function preparaformlogin()
{
    const form = document.getElementById("form-login");
    const errore = document.getElementById("errore-login");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        const email = document.getElementById("email-login").value;
        const password = document.getElementById("password-login").value;

        fetch("login.php",{
            method: "POST",
            headers:{
                "Content-Type" : "application/json"
            },
            body: JSON.stringify({email,password})
        }).then(response=>response.json())
        .then(risultato=>{
            if(risultato.success)
            {
                errore.style.color = "green";
                aggiornaNavbar();
            }else
            {
                errore.style.color = "red";
            }
            errore.textContent = risultato.message;
        }).catch(()=>{
            errore.style.color = "red";
            errore.textContent = "Impossibile comunicare con il database";
        }
        )
    });
}

function aggiornaNavbar() {
    fetch("navbar.php")
        .then(response => response.text())
        .then(html => {
            document.getElementById("navbar-index").innerHTML = html;
            preparahomepage();
        });
}

function preparaformapicercacibo()
{
    function ricercapiatto(event) {
    event.preventDefault()
    const nomepiatto = document.getElementById('nomepiatto').value
    const uripiatto = encodeURIComponent(nomepiatto)
    const url = 'https://www.themealdb.com/api/json/v1/1/search.php?s=' + uripiatto
    console.log(url)
    fetch(url).then(onResponse).then(onJson)
}

function onResponse(response) {
    console.log(response)
    return response.json()
}
const fotocibo = document.getElementById('fotocibo')
function onJson(json) {
    console.log(json)
    fotocibo.innerHTML = ''
    for (meal of json.meals)
    {
        
        const divpiatto = document.createElement('div')
        const immaginepiatto = document.createElement('img')
        immaginepiatto.src = meal.strMealThumb
        const nomepiatto = document.createElement('span')
        nomepiatto.textContent = meal.strMeal
        divpiatto.appendChild(immaginepiatto)
        divpiatto.appendChild(nomepiatto)
        fotocibo.appendChild(divpiatto)
    }

}
const form_ricerca_piatto = document.getElementById('formricercapiatto')
form_ricerca_piatto.addEventListener('submit', ricercapiatto)
}