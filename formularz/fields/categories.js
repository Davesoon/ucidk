var mList = {
    Policja : ['Komenda Główna', 'Komenda Stołeczna', 'Komenda Wojewódzka', 'Komenda Miejska', 'Komenda Powiatowa', 'Posterunek Policji'],
    Sanepid :  ['Powiatowa Stacja Sanitarno - Epidemiologiczna', 'Wojewódzka Stacja Sanitarno - Epidemiologiczna', 'Główny Inspektorat Sanitarny'],
    Urząd :  ['Urząd Miasta', 'Urząd Miasta i Gminy', 'Urząd Gminy', 'Starostwo Powiatowe '],
    Sąd :  ['Sąd Rejonowy', 'Sąd Okręgowy', 'Wojewódzki Sąd Administracyjny', 'Naczelny Sąd Administracyjny', 'Sąd Apelacyjny', 'Sąd Najwyższy'],
    Prokuratura : ['Prokuratura Rejonowa', 'Prokuratura Okręgowa', 'Prokuratura Apelacyjna', 'Prokuratura Krajowa '],
    Firma :  [],
    Sklep :  [],
    Inne :  []
};

el_parent = document.getElementById("category");
el_child = document.getElementById("subCategorySelect");

for (key in mList) {
    el_parent.innerHTML = el_parent.innerHTML + '<option>'+ key +'</option>';
}

el_parent.addEventListener('change', function populate_child(e){
    el_child.innerHTML = '';
    itm = e.target.value;
    if(itm in mList){
            for (i = 0; i < mList[itm].length; i++) {
                el_child.innerHTML = el_child.innerHTML + '<option>'+ mList[itm][i] +'</option>';
            }
    }
});
