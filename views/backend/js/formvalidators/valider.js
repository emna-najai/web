function validate_formcat(){
    if(document.getElementById("nomCategorie").value == ""){
        alert("Le champ nom categorie doit être rempli!");
        return false;
    }
}    

function validate_formprod(){
    
    if(document.getElementById("libProduit").value == ""){
        alert("Le champ libellé doit être rempli!");
        return false;
    }

    if(document.getElementById("prixProduit").value == ""){
        alert("Le champ prix doit être rempli et numérique!");
        return false;
    }

    if(isNaN(document.getElementById("prixProduit").value)){
        alert("Le champ prix doit être rempli et numérique!");
        return false;
    }

    if(document.getElementById("descProduit").value == ""){
        alert("Le champ description doit être rempli!");
        return false;
    }

    if(document.getElementById("qntProduit").value == ""){
        alert("Le champ quantité doit être rempli et numérique!");
        return false;
    }

    if(isNaN(document.getElementById("qntProduit").value)){
        alert("Le champ quantité doit être rempli et numérique!");
        return false;
    }

    if(document.getElementById("idCategorie").value == ""){
        alert("Il faut choisir Le catégorie!");
        return false;
    }

    if(document.getElementById("imgProduit").value == ""){
        alert("Le champ image doit être rempli!");
        return false;
    }
}    