    // id state
    let titleId='titleid-';
    let contentName='content-';
    function getTitleId(){
        return titleId+''+Math.floor(Math.random() * (999999 - 100000) + 100000);
    }
    function getContentName(){
        return contentName+''+Math.floor(Math.random() * (999999 - 100000) + 100000);
    }
    // addInputSection
    function addInputSection(button){
        const section = document.createElement("div");
        section.classList.add("w-full");
        section.classList.add("mb-2");
        section.classList.add("border-b-2");
        let contentName=getContentName();
        const btnDiv=createCloseContentSectionButton();
        const title=createTitle(contentName);
        const paragraph=createParagraph(contentName);
        section.append(btnDiv);
        section.append(title);
        section.append(paragraph);
        const topLevelParent=button.parentElement.parentElement.parentElement;
        topLevelParent.parentElement.insertBefore(section,topLevelParent.nextSibling);
    }
    function createCloseContentSectionButton(){
        const btnDiv = document.createElement("div");
        const closeBtn = document.createElement("button");
        btnDiv.classList.add('flex');
        btnDiv.classList.add('w-full');
        btnDiv.classList.add('justify-end');
        closeBtn.innerHTML='×';
        closeBtn.classList.add('text-3xl');
        closeBtn.type="button";
        closeBtn.addEventListener('click',function click(){
            removeInputSection(this);
        });
        btnDiv.append(closeBtn);
        return btnDiv;
    }
    function createTitle(contentName){
        const div = document.createElement("div");
        const titleGroup = document.createElement("div");
        titleGroup.classList.add("flex");
        const label= document.createElement("label");
        label.classList.add("text-lg");
        let id=getTitleId();
        label.for=id;
        label.innerText="Title:";
        const input = document.createElement('input');
        input.type="text";
        input.name=id;
        input.classList.add('field');
        input.classList.add("title");
        input.classList.add("flex-1");
        input.classList.add("border-b-2");
        input.name=contentName;

        input.addEventListener('keydown',function update(){
            updateContent(this);
        });
        
        titleGroup.append(label);
        titleGroup.append(input);

        div.append(titleGroup);
        return div;
    }
    function createParagraph(contentName){
        const div = document.createElement("div");
        div.classList.add('relative');
        div.classList.add('mb-5');
        div.innerHTML=`
            <label class="text-lg">Paragraph</label>
            <textarea name="${contentName}" class="w-full paragraph border-2 field mb-4" placeholder="Type Here!!!" rows="10" onkeypress="updateContent(this)"></textarea>
            <div class="w-full flex justify-end gap-2">
                <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addImageSection(this);" value="Add Image"/>
                <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addInputSection(this);" value="Add Paragraph"/>
            </div>
        `;
        return div;
    }
    function removeInputSection(button){
        button.parentElement.parentElement.remove();
    }
    function updateContent(field){
        let error=document.getElementById(field.name+'-error');
        if(error){
            error.remove();
        }
    }
    // end addInputSection







