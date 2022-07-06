$(document).ready(function () {
    $('#cutLinkSubmit').click(function (e) {
        e.preventDefault();

        var userLink = document.forms.cutLinkForm.cutLinkInp.value;
        userLink = encodeURIComponent(userLink);

        var XHR = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
        var xhr = new XHR();
        xhr.open("GET", "form.php?cutLinkInp=" + userLink, true);
        xhr.setRequestHeader('Access-Control-Allow-Origin','*');
        xhr.setRequestHeader('Access-Control-Allow-Credentials','true');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.forms.cutLinkForm.cutLinkInp.value = xhr.responseText;
            }
        };        
        xhr.send("cutLinkInp=" + userLink);
    });
});

function copyText() {
    var copyText = document.getElementById("cutLinkInp");
    copyText.select();
    document.execCommand("copy");
    alert("Текст: " + copyText.value + " скопирован!");
}