function addEditInputSection(titleContent,paragraphContent){
    const section = document.createElement("div");
    section.classList.add("w-full");
    section.classList.add("mb-2");
    section.classList.add("border-b-2");

    const btnDiv=createCloseContentSectionButton();
    const title=createEditTitle(titleContent);
    const paragraph=createEditParagraph(paragraphContent);

    section.append(btnDiv);
    section.append(title);
    section.append(paragraph);
    return section;
}
function createEditTitle(title){
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
    // 
    input.value=title;
    // 
    input.classList.add('field');
    input.classList.add("title");
    input.classList.add("flex-1");
    input.classList.add("border-b-2");
    
    titleGroup.append(label);
    titleGroup.append(input);

    div.append(titleGroup);
    return div;
}

function createEditParagraph(paragraph){
    const div = document.createElement("div");
    div.classList.add('relative');
    div.classList.add('mb-5');
    div.innerHTML=`
        <label class="text-lg">Paragraph</label>
        <textarea class="w-full paragraph border-2 field mb-4" placeholder="Type Here!!!" rows="10"></textarea>
        <div class="w-full flex justify-end gap-2">
            <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addImageSection(this);" value="Add Image">
            <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addInputSection(this);" value="Add Paragraph" />
        </div>
    `;
    let textArea=div.children[1];
    textArea.value=paragraph;
    return div;
}

