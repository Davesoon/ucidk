function fieldChanging()
{
    category = document.getElementById("category").value;

    if (category == "Inne" || category == "-- wybierz --")
    {
        document.getElementById("suspectIdHeader").innerHTML = "Numer ID lub NIP";
        document.getElementById("subCategorySelect").setAttribute("style", "display: none");
        document.getElementById("subCategoryText").removeAttribute("style");
        document.getElementById("suspectIdText").setAttribute("placeholder", "Nieobowiązkowe...");
        document.getElementById("suspectIdText").removeAttribute("required");
    }
    else if (category == "Sklep" || category == "Firma")
    {
        document.getElementById("suspectIdHeader").innerHTML = "NIP";
        document.getElementById("subCategorySelect").setAttribute("style", "display: none");
        document.getElementById("subCategoryText").removeAttribute("style");
        document.getElementById("suspectIdText").removeAttribute("placeholder");
        document.getElementById("suspectIdText").setAttribute("required", true);
    }
    else
    {
        document.getElementById("suspectIdHeader").innerHTML = "Numer ID";
        document.getElementById("subCategorySelect").removeAttribute("style");
        document.getElementById("subCategoryText").setAttribute("style", "display: none");
        document.getElementById("suspectIdText").setAttribute("placeholder", "Nieobowiązkowe...");
        document.getElementById("suspectIdText").removeAttribute("required");
    }
}
