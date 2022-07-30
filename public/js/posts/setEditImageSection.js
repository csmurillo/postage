function addEditImageSection(id){
    const div=document.createElement('div');
    let imageUrl=getImageUrl(id);
    div.classList.add('w-full');
    div.classList.add('pb-2');
    div.classList.add('border-b-2');
    div.classList.add('image-input');
    div.innerHTML=`
        <div class="flex w-full justify-end">
            <button class="text-3xl" type="button" onclick="removeImageSection(this);">×</button>
        </div>
        <div class="w-full flex flex-col">
            <div class="border flex justify-center items-center w-full h-72">
                <img id="${id}-src" class="h-72 w-full" src="/storage/${imageUrl}" />
            </div>
            <div>
                <div class="w-full cursor-pointer py-2 mb-4 bg-blue-500">
                    <label class="w-full flex justify-center cursor-pointer text-white" for="${id}">Edit Image</label>
                </div>
                <input data-image="unedited" type="file" class="hidden image field image-edit" id="${id}" name="${id}" onchange="onChange(this);">
            </div>
        </div>
        <div class="relative flex justify-end pb-5 gap-2">
            <div>
                <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addImageSection(this);" value="Add Image">
                <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addInputSection(this);" value="Add Paragraph">
            </div>
        </div>
    `;
    return div;
}
function onChange(inputFile){
    let id=inputFile.id;
    let label=inputFile.parentElement.children[0].children[0];
    setEditFilePath(inputFile,label);    
    setEditImageSrc(inputFile,id);
}
function setEditImageSrc(inputFile,id){
    let imageSrc=document.getElementById(id+'-src');
    let imageUrl=getImageUrl(id);
    var reader  = new FileReader();
    reader.onloadend = function () {
        if(reader.result){
            imageSrc.src=reader.result;
        }
    }
    if(inputFile.files && inputFile.files[0]){
        reader.readAsDataURL(inputFile.files[0]);
    }
    else{
        imageSrc.src="/storage/"+imageUrl;
    }
}
function setEditFilePath(inputFile,label){
    var reader  = new FileReader();
    reader.onloadend = function () {
        if(reader.result){
            label.innerHTML=inputFile.files[0].name;
        }
    }
    if(inputFile.files && inputFile.files[0]){
        reader.readAsDataURL(inputFile.files[0]);
    }
    else{
        const imageSrc=inputFile.parentElement.parentElement.children[0];
        label.innerHTML="Edit Image";
    }
}