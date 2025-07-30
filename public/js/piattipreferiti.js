function rimuovipreferito(event)
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

                immagine.parentNode.remove();
            }
        }
    )
}

function onResponse(response)
{
    return response.json();
}

