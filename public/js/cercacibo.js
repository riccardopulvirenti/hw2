function rimuovipiatto(event)
{
    const immagine = event.currentTarget;
    fetch('/api/unlike-piatto', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ idMeal:  immagine.parentNode.querySelector('img[data-idmeal]').dataset.idmeal})
    })
    .then(onResponse)
    .then(json =>
        {
            if(json.success)
            {
                immagine.src = "/svg/unfavourite.svg";
                immagine.addEventListener('click',aggiungipiatto)
                immagine.removeEventListener('click',rimuovipiatto)
            }
        }
    )
}

function aggiungipiatto(event)
{
    const immagine = event.currentTarget;
    fetch('/api/like-piatto', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            idMeal:  immagine.parentNode.querySelector('img[data-idmeal]').dataset.idmeal,
            nome_piatto: immagine.parentNode.querySelector('span').textContent,
            image_url: immagine.parentNode.querySelector('img[data-idmeal]').src
        })
    })
    .then(onResponse)
    .then(json =>
        {
            if(json.success)
            {
                immagine.src = "/svg/favourite.svg";
                immagine.addEventListener('click',rimuovipiatto)
                immagine.removeEventListener('click',aggiungipiatto)
            }
        }
    )
}

function onResponse(response)
{
    return response.json();
}

