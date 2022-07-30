function updateTitle(title){
    title.classList.remove('border-2');
    title.classList.remove('border-red-500');
    title.classList.remove('rounded');
}
function updateTopic(topic){
    topic.classList.remove('border-2');
    topic.classList.remove('border-red-500');
    topic.classList.remove('rounded');
}
function fileCoverImage(inputFile){
    var reader  = new FileReader();
    reader.onloadend = function () {
        if(reader.result){
        inputFile.parentElement.children[0].innerHTML=inputFile.files[0].name;;
    }
    }
    if(inputFile.files && inputFile.files[0]){
        reader.readAsDataURL(inputFile.files[0]);
    }
    else{
        inputFile.parentElement.children[0].innerHTML="Choose Image";
    }
}