var str = "Aucun pain bleu ici, malheureusement. keep looking tho, may find something.";
console.log(str);

function chkLogin(woof, miaw) {
    $.post( "./api/yeet.php", { dog: woof, cat: miaw }, function(data) {
    console.log("au moins ta fonction chkLogin se fait caller, c'est déjà ça...");
    console.log(data);
    document.getElementById("nomd").value = "";
    document.getElementById("mdp").value = "";

    if (data == "redirect" || document.cookie)
{
    window.location = 'api/client.php';
}
});
}


