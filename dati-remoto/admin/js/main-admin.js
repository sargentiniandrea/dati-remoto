/*
* Script per pannello di controllo Admin
*/

// Logica condizionale per i campi della pagina di impostazioni
let selectToggle = document.getElementById('impostazioni_generali[dominio_protetto]');
let subSelectToggle = document.querySelectorAll('.username_dominio, .password_dominio');

if(selectToggle && subSelectToggle){
showSubFieldsSettings(selectToggle, subSelectToggle);

selectToggle.addEventListener("change", (e)=>{
    showSubFieldsSettings(selectToggle, subSelectToggle);
});

function showSubFieldsSettings(select, subSelect){
    if(select.value == 'si'){
        subSelect.forEach(element => {
            element.style.display = "table-row";
        });
    } else {
        subSelect.forEach(element => {
            element.style.display = "none";
        });
    }  
}
}