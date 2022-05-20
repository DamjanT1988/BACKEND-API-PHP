//ADMINSIDAN
chkDel ();

function chkDel () {
let element = document.getElementsByClassName("button1");
for (let i = 0; i < element.length; i++) {
element[i].addEventListener("click", deleteOrder);
}
}

function deleteOrder(event) {
    //20 find id of the list iten
    let id = event.target.id;
console.log(event.target.id);
url = "http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php";
url2 = "admin.php"
    //21 send instruction to web service by FETCH
    //for method of "DELETE" i PHP/REST, by id
    fetch(url + "?idorder=" + id, {
        "method": "DELETE" //or "method"
    })
    //22 make response into JSON data
    .then(response => response.json())
    //23 to getCourse function 
    .then(data => url2)
    //24 catch error
    .catch(err => console.log(err))
}


//REGISTERSIDAN
//let formData = JSON.stringify($("#myform").serializeArray());
let form = document.getElementById('myform');
form.onsubmit = function(event){
        let xhr = new XMLHttpRequest();
        let formData = new FormData(form);
        //open the request
        xhr.open('POST','http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idregister=1')
        xhr.setRequestHeader("Content-Type", "application/json");

        //send the form data
        xhr.send(JSON.stringify(Object.fromEntries(formData)));

        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                form.reset(); //reset form after AJAX success or do something else
            }
        }
        //Fail the onsubmit to avoid page refresh.
        return false; }