function fieldChanging()
{
    category = document.getElementById("category").value;

    if (category == "Inne")
    {
        document.getElementById("suspectIdHeader").innerHTML = "Numer ID lub NIP";
        document.getElementById("suspectIdText").setAttribute("placeholder", "Nieobowiązkowe...");
        document.getElementById("suspectIdText").removeAttribute("required");
        document.getElementById("suspectIdText").setAttribute("pattern", ".{0,30}");
        document.getElementById("suspectIdText").setAttribute("title", "Do 30 znaków!");
        document.getElementById("subCategorySelect").setAttribute("style", "display: none");
        document.getElementById("subCategoryText").removeAttribute("style");
        document.getElementById("subCategoryText").setAttribute("required", true);
        document.getElementById("subCategoryText").setAttribute("pattern", ".{1,50}");
        document.getElementById("subCategoryText").setAttribute("title", "Do 50 znaków!");

    }
    else if (category == "Sklep" || category == "Firma")
    {
        document.getElementById("suspectIdHeader").innerHTML = "NIP";
        document.getElementById("suspectIdText").removeAttribute("placeholder");
        document.getElementById("suspectIdText").setAttribute("required", true);
        document.getElementById("suspectIdText").setAttribute("pattern", "[0-9]{10}");
        document.getElementById("suspectIdText").setAttribute("title", "10 cyfr ciągiem!");
        document.getElementById("subCategorySelect").setAttribute("style", "display: none");
        document.getElementById("subCategoryText").removeAttribute("style");
        document.getElementById("subCategoryText").setAttribute("required", true);
        document.getElementById("subCategoryText").setAttribute("pattern", ".{1,50}");
        document.getElementById("subCategoryText").setAttribute("title", "Do 50 znaków!");
    }
    else
    {
        document.getElementById("suspectIdHeader").innerHTML = "Numer ID";
        document.getElementById("suspectIdText").setAttribute("placeholder", "Nieobowiązkowe...");
        document.getElementById("suspectIdText").removeAttribute("required");
        document.getElementById("suspectIdText").setAttribute("pattern", ".{0,30}");
        document.getElementById("suspectIdText").setAttribute("title", "Do 30 znaków!");
        document.getElementById("subCategorySelect").removeAttribute("style");
        document.getElementById("subCategoryText").setAttribute("style", "display: none");
    }
}
