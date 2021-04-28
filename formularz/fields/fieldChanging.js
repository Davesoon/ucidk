function fieldChanging()
{
    category = document.getElementById("category").value;

    if (category == "Inne")
    {
        document.getElementById("suspectIdHeader").innerHTML = "Numer ID lub NIP";
        document.getElementById("suspectText").setAttribute("placeholder", "Nieobowiązkowe...");
        document.getElementById("suspectText").setAttribute("pattern", ".{0,50}");
        document.getElementById("suspectText").setAttribute("title", "Do 50 znaków!");
        document.getElementById("suspectText").removeAttribute("required");
        document.getElementById("suspectIdText").setAttribute("placeholder", "Nieobowiązkowe...");
        document.getElementById("suspectIdText").removeAttribute("required");
        document.getElementById("suspectIdText").setAttribute("pattern", ".{0,30}");
        document.getElementById("suspectIdText").setAttribute("title", "Do 30 znaków!");
        document.getElementById("subCategorySelect").setAttribute("style", "display: none");
        document.getElementById("subCategorySelect").removeAttribute("required");
        document.getElementById("subCategoryText").removeAttribute("style");
        document.getElementById("subCategoryText").setAttribute("required", true);
        document.getElementById("subCategoryText").setAttribute("pattern", ".{1,50}");
        document.getElementById("subCategoryText").setAttribute("title", "Do 50 znaków!");
        document.getElementById("subCategoryText").setAttribute("placeholder", "Wpisz nazwę...");
    }
    else if (category == "Sklep" || category == "Firma")
    {
        document.getElementById("suspectIdHeader").innerHTML = "NIP";
        document.getElementById("suspectText").setAttribute("placeholder", "Nieobowiązkowe...");
        document.getElementById("suspectText").setAttribute("pattern", ".{0,50}");
        document.getElementById("suspectText").setAttribute("title", "Do 50 znaków!");
        document.getElementById("suspectText").removeAttribute("required");
        document.getElementById("suspectIdText").removeAttribute("placeholder");
        document.getElementById("suspectIdText").setAttribute("required", true);
        document.getElementById("suspectIdText").setAttribute("pattern", "[0-9]{10}");
        document.getElementById("suspectIdText").setAttribute("title", "10 cyfr ciągiem!");
        document.getElementById("subCategorySelect").setAttribute("style", "display: none");
        document.getElementById("subCategorySelect").removeAttribute("required");
        document.getElementById("subCategoryText").removeAttribute("style");
        document.getElementById("subCategoryText").setAttribute("required", true);
        document.getElementById("subCategoryText").setAttribute("pattern", ".{1,50}");
        document.getElementById("subCategoryText").setAttribute("title", "Do 50 znaków!");
        document.getElementById("subCategoryText").setAttribute("placeholder", "Wpisz nazwę...");
    }
    else
    {
        document.getElementById("suspectIdHeader").innerHTML = "Numer ID";
        document.getElementById("suspectText").removeAttribute("placeholder");
        document.getElementById("suspectText").setAttribute("pattern", ".{5,50}");
        document.getElementById("suspectText").setAttribute("title", "Od 5 do 50 znaków!");
        document.getElementById("suspectText").setAttribute("required", true);
        document.getElementById("suspectIdText").setAttribute("placeholder", "Nieobowiązkowe...");
        document.getElementById("suspectIdText").removeAttribute("required");
        document.getElementById("suspectIdText").setAttribute("pattern", ".{0,30}");
        document.getElementById("suspectIdText").setAttribute("title", "Do 30 znaków!");
        document.getElementById("subCategorySelect").setAttribute("required", true);
        document.getElementById("subCategorySelect").removeAttribute("style");
        document.getElementById("subCategoryText").setAttribute("style", "display: none");
    }
}
