    // addImageSection
    function addImageSection(button){
        if(inputFilesMaxed()){
            return;
        }
        const imageDivSection=createImageDrop();
        const topLevelParent=button.parentElement.parentElement.parentElement;
        topLevelParent.parentElement.insertBefore(imageDivSection,topLevelParent.nextSibling);
    }
    function createImageDrop(){
        const closeBtn=createCloseImageSectionButton();
        const div = document.createElement("div");
        div.classList.add('w-full');
        div.classList.add('pb-2');
        div.classList.add('image-input');
        div.classList.add('border-b-2');
        
        const labelContainer=document.createElement('div');
        labelContainer.classList.add('w-full');
        labelContainer.classList.add('cursor-pointer');
        labelContainer.classList.add('py-2');
        labelContainer.classList.add('mb-4');
        labelContainer.classList.add('bg-blue-500');
        const label = document.createElement("label");
        label.classList.add('w-full');
        label.classList.add('flex');
        label.classList.add('justify-center');
        label.classList.add('cursor-pointer');
        label.classList.add('text-white');
        label.innerText='Choose Image';

        const inputFile = document.createElement("input");
        inputFile.type="file";
        inputFile.classList.add('hidden');
        setImageInputFields(inputFile,label);

        labelContainer.append(label);
        const container = document.createElement("div");
        container.classList.add('w-full');
        container.classList.add('flex');
        container.classList.add('flex-col');

        const labelInputContainer=document.createElement("div");
        // labelInputContainer.append(label);
        labelInputContainer.append(labelContainer);
        labelInputContainer.append(inputFile);

        const noImage=getDivNoImageFound();

        container.append(noImage);
        container.append(labelInputContainer);

        inputFile.addEventListener('change', function onChange(){
            setFilePath(this,label);    
        });
        inputFile.addEventListener('click', function onChange(){
            updateImage(this);
        });

        div.append(closeBtn);
        div.append(container);
        
        const addSectionGroup = document.createElement("div");
        const btnGroup = document.createElement("div");
        addSectionGroup.classList.add('relative');
        addSectionGroup.classList.add('flex');
        addSectionGroup.classList.add('justify-end');
        addSectionGroup.classList.add('pb-5');
        addSectionGroup.classList.add('gap-2');
        btnGroup.innerHTML=`
            <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addImageSection(this);" value="Add Image">
            <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addInputSection(this);" value="Add Paragraph" />
        `;
        addSectionGroup.append(btnGroup);
        div.append(addSectionGroup);
        return div;
    }
    function inputImageFile(){

    }
    function getImage(imgSrc){
        const currentImageContainer=document.createElement("div");
        currentImageContainer.classList.add('w-full');
        const currentImage=document.createElement("img");
        currentImage.classList.add('w-full');
        currentImage.classList.add('h-72');
        currentImage.src=imgSrc;
        currentImageContainer.append(currentImage);
        return currentImageContainer;
    }
    function getDivNoImageFound(){
        const divNoImageFound=document.createElement('div');
        divNoImageFound.classList.add('border');
        divNoImageFound.classList.add('flex');
        divNoImageFound.classList.add('justify-center');
        divNoImageFound.classList.add('items-center');
        divNoImageFound.classList.add('w-full');
        divNoImageFound.classList.add('h-72');
        divNoImageFound.innerHTML="<p>Currently No Image Selected</p>"
        return divNoImageFound;
    }
    function setImageInputFields(inputFile,label){
        let inputFileId=getInputFileId();
        label.setAttribute('for', "image"+inputFileId);
        inputFile.id="image"+inputFileId;
        inputFile.name="image"+inputFileId;
        inputFile.classList.add('image');
        inputFile.classList.add('field');
    }
    function createCloseImageSectionButton(){
        const btnDiv = document.createElement("div");
        const closeBtn = document.createElement("button");
        btnDiv.classList.add('flex');
        btnDiv.classList.add('w-full');
        btnDiv.classList.add('justify-end');
        closeBtn.innerHTML='×';
        closeBtn.classList.add('text-3xl');
        closeBtn.type="button";
        closeBtn.addEventListener('click',function click(){
            removeImageSection(this);
        });
        btnDiv.append(closeBtn);
        return btnDiv;
    }
    function removeImageSection(button){
        button.parentElement.parentElement.remove();
    }
    function getInputFileId(){
        const contentContainer=document.getElementById('content-container');
        const contentContainerChildren=contentContainer.children;
        let inputFileId=1;
        for(let i=0; i<contentContainerChildren.length;i++){
            if(contentContainerChildren[i].classList.contains('image-input')){
                inputFileId++;
            }
        }
        return inputFileId;
    }
    function inputFilesMaxed(){
        const maxInputFiles=5;
        const contentContainer=document.getElementById('content-container');
        const contentContainerChildren=contentContainer.children;
        let inputFiles=0;
        for(let i=0; i<contentContainerChildren.length;i++){
            if(contentContainerChildren[i].classList.contains('image-input')){
                inputFiles++;
            }
        }
        if(inputFiles>=maxInputFiles){
            return true;
        }        
        return false;
    }
    function setFilePath(inputFile,label){
        var reader  = new FileReader();
        reader.onloadend = function () {
            if(reader.result){
                const inputParentDiv=inputFile.parentElement.parentElement;
                inputParentDiv.children[0].remove();
                const imageDiv=getImage(reader.result);
                inputParentDiv.insertBefore(imageDiv,inputParentDiv.firstChild);
                label.innerHTML=inputFile.files[0].name;
            }
            
        }
        if(inputFile.files && inputFile.files[0]){
            reader.readAsDataURL(inputFile.files[0]);
        }
        else{
            const inputParentDiv=inputFile.parentElement.parentElement;
            inputParentDiv.children[0].remove();
            const imageDiv=getDivNoImageFound();
            inputParentDiv.insertBefore(imageDiv,inputParentDiv.firstChild);
            label.innerHTML="Choose Image";
        }
    }
    function updateImage(field){
        let error=document.getElementById(field.id+'-error');
        if(error){
            error.remove();
        }
    }
    // end addImageSection