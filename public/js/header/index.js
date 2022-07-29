function toggleMenu(btn){
    const header = document.body.getElementsByTagName('header');
    const menu = document.getElementById('menu');

    // on open
    if(menu.classList.contains('hidden')){
        btn.innerHTML='×';
        btn.classList.remove('text-2xl');
        btn.classList.add('text-4xl');
        menu.classList.remove('hidden');
        menu.classList.add('block');
        document.body.style.overflowY = "hidden";
    }
    // on close
    else{
        btn.innerHTML='☰';
        btn.classList.remove('text-4xl');
        btn.classList.add('text-2xl');
        menu.classList.remove('block');
        menu.classList.add('hidden');
        document.body.style.overflowY = "unset";
    }
}
function exploreDropDown(div) {
    const exploreDropDownMb = document.getElementById('explore-dropdown-mb');
    const exploreDropDown = document.getElementById('explore-dropdown');

    // toggle logic
    if((div.dataset.open=="false")){
        div.dataset.open='true';
        exploreDropDownMb.style.marginTop="120px";
        exploreDropDownMb.classList.remove('hidden');
        exploreDropDownMb.classList.add('block');
        exploreDropDown.style.marginTop="120px";
        exploreDropDown.classList.remove('sm:hidden');
        exploreDropDown.classList.add('sm:block');
    }
    else{
        div.dataset.open='false';
        exploreDropDownMb.style.marginTop="120px";
        exploreDropDownMb.classList.remove('block');
        exploreDropDownMb.classList.add('hidden');
        exploreDropDown.style.marginTop="120px";
        exploreDropDown.classList.remove('sm:block');
        exploreDropDown.classList.add('sm:hidden');
    }
}