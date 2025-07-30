function rimuovicucina(event)
{
    const immagine = event.currentTarget;
    fetch('/api/unlike-cucina', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ id_cucina:  event.currentTarget.parentNode.dataset.id_cucina})
    })
    .then(onResponse)
    .then(json =>
        {
            if(json.success)
            {
                immagine.src = "/svg/no_like.svg";
                immagine.addEventListener('click',aggiungicucina)
                immagine.removeEventListener('click',rimuovicucina)
            }
        }
    )
}

function aggiungicucina(event)
{
    const immagine = event.currentTarget;
    fetch('/api/like-cucina', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ id_cucina:  event.currentTarget.parentNode.dataset.id_cucina})
    })
    .then(onResponse)
    .then(json =>
        {
            if(json.success)
            {
                immagine.src = "/svg/like.svg";
                immagine.addEventListener('click',rimuovicucina)
                immagine.removeEventListener('click',aggiungicucina)
            }
        }
    )

}

function onResponse(response)
{
    return response.json();
}

