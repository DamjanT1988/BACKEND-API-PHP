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
if(document.getElementById('myform2') == 'myform2'){
let formOrder = document.getElementById('myform2');
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
            }
        }
        //Fail the onsubmit to avoid page refresh.
        return false; }
    }
}
/*

//25 declare var for DDOM elements
const codeInput = document.getElementById("code");
const nameInput = document.getElementById("name");
const progressionInput = document.getElementById("progression");
const syllabusInput = document.getElementById("syllabus");
const submitButton = document.getElementById("submit"); 

//27 create a list item
function createOrder() {
    //28 prevent list to add same thing twice
    event.preventDefault();

    //29 get values from clicked list items/objects
    let code = codeInput.value;
    let name = nameInput.value;
    let progression = progressionInput.value;
    let syllabus = syllabusInput.value;

    //30 make values to JSON-objects (strings)
    let jsonString = JSON.stringify({
        code : code,
        name : name,
        progression: progression,
        syllabus: syllabus    
    });
    
    //31 send data to databas with POST by FETCH
    fetch (url, {
        method: "POST",
        headers: {
            "content-type": "application/json"
        },
        body: jsonString
    })
    //32 turn response to JSON
    .then(response => response.json())

    .then(data => getCourse())

    .then(clearForm())
}

//33 clear form
function clearForm() {
//34clear each form area
    codeInput.value = "";
    nameInput.value = "";
    progressionInput.value = "";
    syllabusInput.value = "";
}

*/




//REGISTERSIDAN
let urlReg = window.location.pathname;
let filenameReg = urlReg.substring(urlReg.lastIndexOf('/')+1);//let formData = JSON.stringify($("#myform").serializeArray());
if(filenameReg == "register.php") {
let formRegister = document.getElementById('myform');
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