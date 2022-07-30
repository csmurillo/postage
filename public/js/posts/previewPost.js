function back(){
    const form =document.getElementById('create-form');
    const prevCreate=document.getElementById('preview-create');
    prevCreate.classList.remove('block');
    prevCreate.classList.add('hidden');
    form.classList.remove('hidden');
    const paragraphContainer=document.getElementById('preview-field-container');
    paragraphContainer.innerHTML="";
}
function previewPost(){
    const form =document.getElementById('create-form');
    const title=document.getElementById('title').value;

    const prevCreate=document.getElementById('preview-create');
    const prevTitle=document.getElementById('preview-title');
    if(title.length>0){
        prevTitle.classList.add('font-medium');
        prevTitle.classList.add('underline');
        prevTitle.innerHTML=title;
    }
    else{
        prevTitle.innerHTML="TITLE NOT SET"
    }
    prevCreate.classList.remove('hidden');
    prevCreate.classList.add('block');
    form.classList.add('hidden');

    // add paragraphs to preview-field-container
    const fieldContainer=document.getElementById('preview-field-container');
    const fields=document.getElementsByClassName('field');
    for(let i=0;i<=fields.length;i++){
        if(fields[i].classList.contains('title')){
            if(fields[i].value){
                const heading = document.createElement("h1");
                heading.classList.add('underline');
                heading.classList.add('text-xl');
                heading.classList.add('mt-2');
                heading.innerHTML=fields[i].value;
                fieldContainer.append(heading);
            }
        }
        if(fields[i].classList.contains('paragraph')){
            if(fields[i].value){
                const paragraph = document.createElement("p");
                paragraph.classList.add('text-lg');
                paragraph.classList.add('mb-2');
                paragraph.innerHTML=fields[i].value;
                fieldContainer.append(paragraph);
            }
        }
        if(fields[i].classList.contains('image')){
            if(fields[i].classList.contains('image-edit')){
                const img = document.createElement("img");
                img.classList.add('h-72');
                img.classList.add('w-full');
                img.classList.add('mb-2');
                img.src='/storage/'+getImageUrl(fields[i].id);
                fieldContainer.append(img);
            }
            else if(fields[i].files && fields[i].files[0]){
                const img = document.createElement("img");
                img.classList.add('h-72');
                img.classList.add('w-full');
                img.classList.add('mb-2');
                setImageSrc(fields[i],img);
                fieldContainer.append(img);
            }
        }
    }
    function setImageSrc(inputFile,img){
        var reader  = new FileReader();
        reader.onloadend = function () {
            if(reader.result){
                img.src=reader.result;
            }
            
        }
        if(inputFile.files && inputFile.files[0]){
            reader.readAsDataURL(inputFile.files[0]);
        }
    }
}