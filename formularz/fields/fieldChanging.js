function fieldChanging()
{
    category = document.getElementById("category").value;
    suspectIdHeader = document.getElementById("suspectIdHeader");
    suspectText = document.getElementById("suspectText");
    suspectIdText = document.getElementById("suspectIdText");
    subCategorySelect = document.getElementById("subCategorySelect");
    subCategoryText = document.getElementById("subCategoryText");

    function setAttributes(el, attrs) {
        for(var key in attrs) {
          el.setAttribute(key, attrs[key]);
        }
      }

    if (category == "Inne")
    {
        suspectIdHeader.innerHTML = "Numer ID lub NIP";

        setAttributes(suspectText, {"placeholder": "Nieobowiązkowe...", 
                                    "pattern": ".{0,50}", 
                                    "title": "Do 50 znaków!"});
        suspectText.removeAttribute("required");

        setAttributes(suspectIdText, {"placeholder": "Nieobowiązkowe...",
                                      "pattern": ".{0,30}",
                                      "title": "Do 30 znaków!"});
        suspectIdText.removeAttribute("required");

        subCategorySelect.setAttribute("style", "display: none");
        subCategorySelect.removeAttribute("required");

        setAttributes(subCategoryText, {"placeholder": "Wpisz nazwę...",
                                        "pattern": ".{1,50}", 
                                        "title": "Do 50 znaków!", 
                                        "required": true});
        subCategoryText.removeAttribute("style");
    }
    else if (category == "Sklep" || category == "Firma")
    {
        suspectIdHeader.innerHTML = "NIP";

        setAttributes(suspectText, {"placeholder": "Nieobowiązkowe...", 
                                    "pattern": ".{0,50}", 
                                    "title": "Do 50 znaków!"});
        suspectText.removeAttribute("required");

        setAttributes(suspectIdText, {"required": true, 
                                      "pattern": "[0-9]{10}", 
                                      "title": "10 cyfr ciągiem!"});
        suspectIdText.removeAttribute("placeholder");

        subCategorySelect.setAttribute("style", "display: none");
        subCategorySelect.removeAttribute("required");

        setAttributes(subCategoryText, {"placeholder": "Wpisz nazwę...", 
                                        "pattern": ".{1,50}", 
                                        "title": "Do 50 znaków!", 
                                        "required": true});
        subCategoryText.removeAttribute("style");
    }
    else
    {
        suspectIdHeader.innerHTML = "Numer ID";

        setAttributes(suspectText, {"required": true, 
                                    "pattern": ".{5,50}", 
                                    "title": "Od 5 do 50 znaków!"});
        suspectText.removeAttribute("placeholder");

        setAttributes(suspectIdText, {"placeholder": "Nieobowiązkowe...", 
                                      "pattern": ".{0,30}", 
                                      "title": "Do 30 znaków!"});
        suspectIdText.removeAttribute("required");

        subCategorySelect.setAttribute("required", true);
        subCategorySelect.removeAttribute("style");
        
        subCategoryText.setAttribute("style", "display: none");
        subCategoryText.removeAttribute("required");
    }
}
