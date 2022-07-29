function editDescription(){
    const description=document.getElementById('description-value');
    const updateDescription=document.getElementById('update-description');

    if(description.classList.contains('hidden')){
        description.classList.remove('hidden');
        description.classList.add('flex');
        updateDescription.classList.remove('flex');
        updateDescription.classList.add('hidden');
    }
    else{
        description.classList.remove('flex');
        description.classList.add('hidden');
        updateDescription.classList.remove('hidden');
        updateDescription.classList.add('flex');
        updateDescription.classList.add('flex-col');
        updateDescription.classList.add('justify-between');
    }
}