/*function valider_numero(nombre) {

    var chiffres = new String(nombre);

    chiffres = chiffres.replace(/[^0-9]/g, '');

// Le champs est vide
    if ( nombre == "" )
    {
        alert ( "Le champs est vide !" );
        return false;
    }

// Nombre de chiffres
    compteur = chiffres.length;

    if (compteur!=10)
    {
        alert("Assurez-vous de rentrer un numéro à 10 chiffres (xxx-xxx-xxxx)");
        return false;
    }

    else
    {
        alert("Le numéro me semble bon !");
        return true;
    }

}*/
function valider(form,type) {
    var expreg = /^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/;
    var expregtel = /^0[65][0-9]{8}$/;
    var erreur = "";
    var email = "";
    var tel = "";
    document.getElementById("erreurline").className="info";

    if (type == "ajouterVoyage") {
        document.getElementById("idtitre").className="info";
        document.getElementById("idstitre").className="info";
        document.getElementById("idtext").className="info";
        document.getElementById("idprix").className="info";
        document.getElementById("iddate").className="info";
        document.getElementById("idduree").className="info";
        document.getElementById("idcat").className="info";
        document.getElementById("iddest").className="info";
        document.getElementById("idmedia").className="info";
        document.getElementById("iditin").className="info";
        document.getElementById("idinfosup").className="info";

        if (form.titre_voy.value == "") {
            document.getElementById("idtitre").className="danger";
            erreur += "- Veuillez entrer le titre du voyage en question.<br/>";
        }
        if (form.s_titre_voyage.value == "") {
            document.getElementById("idstitre").className="danger";
            erreur += "- Veuillez entrer un sous-titre du voyage en question. <br/>";
        }
        if (form.text_voy.value == "") {
            document.getElementById("idtext").className="danger";
            erreur += "- Veuillez entrer la description du voyage en question. <br/>";
        }
        if (form.prix_voy.value == "") {
            document.getElementById("idprix").className="danger";
            erreur += "- Veuillez donner un Prix du voyage en question.<br/>";
        }
        if (form.date_voy.value == "") {
            document.getElementById("iddate").className="danger";
            erreur += "- Veuillez entrer une date du voyage en question.<br/>";
        }
        if (form.duree_voy.value == "") {
            document.getElementById("idduree").className="danger";
            erreur += "- Veuillez entrer la duree du voyage du voyage en question.<br/>";
        }
        if (form.id_cat_voy.value == "") {
            document.getElementById("idcat").className="danger";
            erreur += "- Veuillez choisir la categorie du voyage du voyage en question.<br/>";
        }
        if (form.id_dest.value == "") {
            document.getElementById("iddest").className="danger";
            erreur += "- Veuillez entrer la destination du voyage du voyage en question.<br/>";
        }
        if (form.id_media_voy.value == "") {
            document.getElementById("idmedia").className="danger";
            erreur += "- Veuillez indiquer une image du voyage en question.<br/>";
        }
        if (form.infosup.value == "") {
            document.getElementById("idinfosup").className="danger";
            erreur += "- Veuillez entre les information sup.<br/>";
        }
        if (form.itin.value == "") {
            document.getElementById("iditin").className="danger";
            erreur += "- Veuillez indique l'Itinéraire.<br/>";
        }
        
    }
    if (type == "ajouterReservation") {
        document.getElementById("idres_nom").className="info";
        document.getElementById("idres_prenom").className="info";
        document.getElementById("idres_email").className="info";
        document.getElementById("idres_email").className="info";
        document.getElementById("idres_tel").className="info";
        document.getElementById("idres_tel").className="info";
        document.getElementById("idres_nbr_adulte").className="info";
        document.getElementById("idres_nbr_enfants").className = "info";

        if (form.res_nom.value == "") {
            document.getElementById("idres_nom").className="danger";
            erreur += "- Veuillez entrer votre nom.<br/>";
        }
        if (form.res_prenom.value == "") {
            document.getElementById("idres_prenom").className="danger";
            erreur += "- Veuillez entrer votre prenom. <br/>";
        }
        if (form.res_email.value == "") {
            document.getElementById("idres_email").className="danger";
            erreur += "- Veuillez entrer la description du voyage en question. <br/>";
        }else{
            email = form.res_email.value;
            if(email.match(expreg) == null){
            erreur += "-Veilliez corrigez votre email <br/>";
            document.getElementById("idres_email").className="danger";
        }}
        if (form.res_tel.value == "") {
            document.getElementById("idres_tel").className="danger";
            erreur += "- Veuillez donner un Prix du voyage en question.<br/>";
        }else{
            tel = form.res_tel.value;
            if(tel.match(expregtel) == null){
                erreur += "-Veilliez corrigez votre numero de telephone <br/>";
                document.getElementById("idres_tel").className="danger";
            }}
        if (form.res_nbr_adulte.value == "") {
            document.getElementById("idres_nbr_adulte").className="danger";
            erreur += "- Veuillez entrer le nombre d'adultes.<br/>";
        }
        if (form.res_nbr_enfants.value == "") {
            document.getElementById("idres_nbr_enfants").className = "danger";
            erreur += "- Veuillez entrer le nembre d'enfants.<br/>";
        }

    }
    if (type == "ajouterCatVoyage") {
                document.getElementById("idnomcatvoyage").className = "info";
        document.getElementById("iddescriptioncatvoyage").className = "info";

        if (form.nomcatvoyage.value == "") {
            document.getElementById("idnomcatvoyage").className = "danger";
            erreur += "- Veuillez entrer le Nom de la Catgorie.<br/>";
        }
        if (form.descriptioncatvoyage.value == "") {
            document.getElementById("iddescriptioncatvoyage").className = "danger";
            erreur += "- Veuillez entrer une Discription de la Categorie.<br/>";
        }
    }
    if (type == "ajouterUser") {
        document.getElementById("idloginuser").className = "info";
        document.getElementById("idpassworduser").className = "info";

        if (form.loginuser.value == "") {
            document.getElementById("idloginuser").className = "danger";
            erreur += "- Veuillez entrer un login.<br/>";
        }
        if (form.passworduser.value == "") {
            document.getElementById("idpassworduser").className = "danger";
            erreur += "- Veuillez entrer un password.<br/>";
        }
    }
    if (type == "ajouterplay_list") {

        document.getElementById("nom_play_list").className = "info";
        document.getElementById("description_play_list").className = "info";

        if (form.name_play_list.value == "") {
            document.getElementById("nom_play_list").className = "danger";
            erreur += "- Veuillez indique le nom de la play list .<br/>";
        }
        if (form.desc_play_list.value == "") {
            document.getElementById("description_play_list").className = "danger";
            erreur += "- Veuillez entrer le Description de la destination.<br/>";
        }
    }

    if (type == "ajouterdest") {
        document.getElementById("idmedia").className = "info";
        document.getElementById("iddescription_dest").className = "info";
        document.getElementById("idnom_dest").className = "info";

        if (form.id_media_dest.value == "") {
            document.getElementById("idmedia").className = "danger";
            erreur += "- Veuillez indique une image pour la destination.<br/>";
        }

        if (form.description_dest.value == "") {
            document.getElementById("iddescription_dest").className = "danger";
            erreur += "- Veuillez entrer le Description de la destination.<br/>";
        }
        if (form.nom_dest.value == "") {
            document.getElementById("idnom_dest").className = "danger";
            erreur += "- Veuillez entrer le Nom de la ville de destination.<br/>";
        }
    }
    if (type == "ajoutermedia") {
        document.getElementById("idtype_media").className = "info";
        document.getElementById("idtitre").className = "info";
        document.getElementById("idlien").className = "info";
        document.getElementById("iddesc").className = "info";

        if (form.titremedia.value == "") {
            document.getElementById("idtitre").className = "danger";
            erreur += "- Veuillez indique un titre.<br/>";
        }
        if (form.lienmedia.value == "") {
            document.getElementById("idlien").className = "danger";
            erreur += "- Veuillez indique un la media.<br/>";
        }
        if (form.descriptionmedia.value == "") {
            document.getElementById("iddesc").className = "danger";
            erreur += "- Veuillez indique la discription.<br/>";
        }
        if (form.idtype_mediamedia.value == "") {
            document.getElementById("idtype_media").className = "danger";
            erreur += "- Veuillez indique le type.<br/>";
        }

    }
    if (type == "editermedia") {
        document.getElementById("iddesc").className = "info";
        document.getElementById("idtitre").className = "info";

        if (form.titremedia.value == "") {
            document.getElementById("idtitre").className = "danger";
            erreur += "- Veuillez indique un titre.<br/>";
        }
        /*if (form.lienmedia.value == "") {
            document.getElementById("idlien").className = "danger";
            erreur += "- Veuillez indique un la media.<br/>";
        }*/
        if (form.descriptionmedia.value == "") {
            document.getElementById("iddesc").className = "danger";
            erreur += "- Veuillez indique la discription.<br/>";
        }
        /*if (form.idtype_mediamedia.value == "") {
            document.getElementById("idtype_media").className = "danger";
            erreur += "- Veuillez indique le type.<br/>";
        }*/

    }
    if (type == "ajouterType_Media") {
        document.getElementById("idext_Type_Media").className = "info";
        document.getElementById("idnom_Type_Media").className = "info";

        if (form.nom_Type_Media.value == "") {
            document.getElementById("idnom_Type_Media").className = "danger";
            erreur += "- Veuillez indique le nom du Type de media.<br/>";
        }
        if (form.ext_Type_Media.value == "") {
            document.getElementById("idext_Type_Media").className = "danger";
            erreur += "- Veuillez indique les extensions supporte.<br/>";
        }
    }
    if (type == "ajouterContact") {
        document.getElementById("desc_contact").className = "info";
        document.getElementById("nom_contact").className = "info";

        if (form.nom_contact.value == "") {
            document.getElementById("nom_contact").className = "danger";
            erreur += "- Veuillez entrer votre nom.<br/>";
        }

        if (form.desc_contact.value == "") {
            document.getElementById("desc_contact").className = "danger";
            erreur += "- Veuillez entrer plus de details sur la reservation.<br/>";
        }
    }
    if (erreur == "") {
            form.submit();
        } 
    if(erreur != "") {
            document.getElementById("erreurline").className="danger";
            document.getElementById("bloc_erreur").innerHTML = "<div id='erreur'>" + erreur + "</div>";
        }
    
}