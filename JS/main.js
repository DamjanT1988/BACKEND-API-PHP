//---ADMINSIDAN---//

//---delete order
chkDelOrder ();

function chkDelOrder () {
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
    .then(data => window.location.reload())
    //24 catch error
    .catch(err => console.log(err))
}

//---create order

//let formData = JSON.stringify($("#myform").serializeArray());
let urlOrder = window.location.pathname;
let filenameOrder = urlOrder.substring(urlOrder.lastIndexOf('/')+1);//let formData = JSON.stringify($("#myform").serializeArray());
if(filenameOrder == "admin.php") {
let formOrder = document.getElementById('formOrder');
formOrder.onsubmit = function(event){
        let xhr = new XMLHttpRequest();
        let formData2 = new FormData(formOrder);
        //open the request
        xhr.open('POST','http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idorder=post')
        xhr.setRequestHeader("Content-Type", "application/json");

        //send the form data
        xhr.send(JSON.stringify(Object.fromEntries(formData2)));

        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
               formOrder.reset(); //reset form after AJAX success or do something else
                window.location.reload();
            }
        }
        //Fail the onsubmit to avoid page refresh.
        return false; }
    }

//---update order
    //let formData = JSON.stringify($("#myform").serializeArray());
let urlOrderUp = window.location.pathname;
let filenameOrderUp = urlOrderUp.substring(urlOrderUp.lastIndexOf('/')+1);//let formData = JSON.stringify($("#myform").serializeArray());
if(filenameOrderUp == "change.php") {
let formOrderUp = document.getElementById('formUpdate');
formOrderUp.onsubmit = function(event){
        let xhr = new XMLHttpRequest();
        let formData3 = new FormData(formOrderUp);
        //open the request
        xhr.open('PUT','http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idorder=put')
        xhr.setRequestHeader("Content-Type", "application/json");

        //send the form data
        xhr.send(JSON.stringify(Object.fromEntries(formData3)));

        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                document.getElementById('message').innerHTML = "Uppdaterad!";
            }
        }
        //Fail the onsubmit to avoid page refresh.
        return false; }
    }

//MENYSIDEN
//---create menu item

//let formData = JSON.stringify($("#myform").serializeArray());
let urlMenu = window.location.pathname;
let filenameMenu = urlMenu.substring(urlMenu.lastIndexOf('/')+1);//let formData = JSON.stringify($("#myform").serializeArray());
if(filenameMenu == "menu.php") {
let formMenu = document.getElementById('formMenu');
formMenu.onsubmit = function(event){
        let xhr = new XMLHttpRequest();
        let formData2 = new FormData(formMenu);
        //open the request
        xhr.open('POST','http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idmenu=post')
        xhr.setRequestHeader("Content-Type", "application/json");

        //send the form data
        xhr.send(JSON.stringify(Object.fromEntries(formData2)));

        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
               formMenu.reset(); //reset form after AJAX success or do something else
                window.location.reload();
            }
        }
        //Fail the onsubmit to avoid page refresh.
        return false; }
    }

//---update menu object
    //let formData = JSON.stringify($("#myform").serializeArray());
    let urlMenuUp = window.location.pathname;
    let filenameMenuUp = urlMenuUp.substring(urlMenuUp.lastIndexOf('/')+1);//let formData = JSON.stringify($("#myform").serializeArray());
    console.log(filenameMenuUp);
    if(filenameMenuUp == "menuchange.php") {
    let formMenuUp = document.getElementById('formMenuUpdate');
    formMenuUp.onsubmit = function(event){
            let xhr = new XMLHttpRequest();
            let formData3 = new FormData(formMenuUp);
            //open the request
            xhr.open('PUT','http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idmenu=put')
            xhr.setRequestHeader("Content-Type", "application/json");
    
            //send the form data
            xhr.send(JSON.stringify(Object.fromEntries(formData3)));
    
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    
                    document.getElementById('message').innerHTML = "Uppdaterad!";
                }
            }
            //Fail the onsubmit to avoid page refresh.
            return false; }
        }


//---delete menu object
chkDelMenu ();

function chkDelMenu () {
let element = document.getElementsByClassName("button3");
for (let i = 0; i < element.length; i++) {
element[i].addEventListener("click", deleteMenuItem);
}
}

function deleteMenuItem(event) {
    //20 find id of the list iten
    let id = event.target.id;
console.log(event.target.id);
url = "http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php";
url2 = "menu.php"
    //21 send instruction to web service by FETCH
    //for method of "DELETE" i PHP/REST, by id
    fetch(url + "?idmenu=" + id, {
        "method": "DELETE" //or "method"
    })
    //22 make response into JSON data
    .then(response => response.json())
    //23 to getCourse function 
    .then(data => window.location.reload())
    //24 catch error
    .catch(err => console.log(err))
}

//REGISTERSIDAN
let urlReg = window.location.pathname;
let filenameReg = urlReg.substring(urlReg.lastIndexOf('/')+1);//let formData = JSON.stringify($("#myform").serializeArray());
if(filenameReg == "register.php") {
let formRegister = document.getElementById('formRegister');
formRegister.onsubmit = function(){
        let xhr = new XMLHttpRequest();
        let formData = new FormData(formRegister);
        //open the request
        xhr.open('POST','http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php?idregister=1')
        xhr.setRequestHeader("Content-Type", "application/json");

        //send the form data
        xhr.send(JSON.stringify(Object.fromEntries(formData)));

        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
               formRegister.reset(); //reset form after AJAX success or do something else
               window.location.reload();
            }
        }
        //Fail the onsubmit to avoid page refresh.
    return false; 
    }
}
//delete user
chkDelUser ();

function chkDelUser () {
let element2 = document.getElementsByClassName("button1");
for (let i = 0; i < element2.length; i++) {
element2[i].addEventListener("click", deleteUser);
}
}

function deleteUser(event) {
    //20 find id of the list iten
    let id2 = event.target.id;
console.log(event.target.id);
url3 = "http://localhost/projekt_webservice_vt22-DamjanT1988/webservice-API.php";
url4 = "register.php"
    //21 send instruction to web service by FETCH
    //for method of "DELETE" i PHP/REST, by id
    fetch(url3 + "?iduser=" + id2, {
        "method": "DELETE" //or "method"
    })
    //22 make response into JSON data
    .then(response => response.json())
    //23 to getCourse function 
    .then(data => window.location.reload())
    //24 catch error
    .catch(err => console.log(err))
}