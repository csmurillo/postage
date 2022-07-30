function setContent(e){
    let content=document.getElementById('content');
    content.value="";
    const fields=document.getElementsByClassName('field');
    
    let title = document.getElementById('title');
    let topic = document.getElementById('topic');

    if(title.value.length==0){
        title.classList.add('border-2');
        title.classList.add('border-red-500');
        title.classList.add('rounded');
        e.preventDefault();
    }
    if(!topic.value){
        topic.classList.add('border-2');
        topic.classList.add('border-red-500');
        topic.classList.add('rounded');
        e.preventDefault();
    }
    for(let i=0; i<fields.length; i++){ 
        if(fields[i].classList.contains('title')){
            if(fields[i].value){
                content.value=content.value+`<h1>${fields[i].value}</h1>`;
            }
        }
        if(fields[i].classList.contains('paragraph')){
            if(fields[i].value){
                content.value=content.value+`<p>${fields[i].value}</p>`;
            }
            else{
                let error=document.getElementById(fields[i].name+'-error');
                if(error==null){
                    const div=document.createElement('div');
                    div.id=fields[i].name+'-error';
                    div.classList.add('text-red-500');
                    div.innerHTML='Please Provide Content';
                    fields[i].parentElement.parentElement.append(div);
                    e.preventDefault();
                }
            }
        }
        if(fields[i].classList.contains('image')){
            if(fields[i].files.length==0){
                let error=document.getElementById(fields[i].id+'-error');
                if(error==null){
                    const div=document.createElement('div');
                    div.id=fields[i].id+'-error';
                    div.classList.add('text-red-500');
                    div.innerHTML='No Image';
                    fields[i].parentElement.parentElement.parentElement.append(div);
                }
                e.preventDefault();
                continue;
            }
        }
        if(fields[i].classList.contains('image')){
            if(!fields[i].files[0].name.match(/.(jpg|jpeg|png|gif)$/i)){
                let error=document.getElementById(fields[i].id+'-error');
                if(error==null){
                    const div=document.createElement('div');
                    div.id=fields[i].id+'-error';
                    div.classList.add('text-red-500');
                    div.innerHTML='Not Valid Image Type';
                    fields[i].parentElement.parentElement.parentElement.append(div);
                }
                e.preventDefault();
            }
            else if((fields[i].files[0].size/1024/1024) > 2 ){
                let error=document.getElementById(fields[i].id+'-error');
                if(error==null){
                    const div=document.createElement('div');
                    div.id=fields[i].id+'-error';
                    div.classList.add('text-red-500');
                    div.innerHTML='Not Valid Image File Size Must Be Less Than 2GB';
                    fields[i].parentElement.parentElement.parentElement.append(div);
                }
                e.preventDefault();
            }
            else if(fields[i].files && fields[i].files[0]){
                content.value=content.value+`<img id="${fields[i].id}" />`;
            }
        }
    }
}