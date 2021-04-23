function fieldChanging()
{
    if (document.getElementById("category").value == "Inne" || document.getElementById("category").value == "-- wybierz --") 
    {
        document.getElementById("suspectId").innerHTML = "Numer ID lub NIP";
        document.getElementById("subCategorySelect").style.display = "none";
        document.getElementById("subCategoryText").style.display = "inline";
    }
    else if (document.getElementById("category").value == "Sklep" || document.getElementById("category").value == "Firma")
    {
        document.getElementById("suspectId").innerHTML = "NIP";
        document.getElementById("subCategorySelect").style.display = "none";
        document.getElementById("subCategoryText").style.display = "inline";
    }
    else
    {
        document.getElementById("suspectId").innerHTML = "Numer ID";
        document.getElementById("subCategoryText").style.display = "none";
        document.getElementById("subCategorySelect").style.display = "inline";
    }
}
