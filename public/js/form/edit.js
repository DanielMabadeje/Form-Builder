var title=document.getElementsByTagName('h1')[0];
// var description=document.getElementsByTagName('h5')[0];
var description=document.getElementsByClassName('description_h5')[0];

var inputDivs=document.getElementsByClassName('field_container');
var inputLabels=document.getElementsByClassName('form-label');
var savingProgress=document.getElementsByClassName('save')[0];
var responseSwitch=document.getElementById('switch');
var form=document.getElementsByTagName('form')[1];
var mainform=formarray.form;

var modal = document.getElementById('myModal');

var formarrayform=``



form.action=false


function getvalue() {
    var type=this.nodeName;

    if (type == 'H1' || type=='h1'){
        editItem('form_name', this.innerHTML);
    }  else if(type == 'H5' || type=='h5') {
        editItem('description', this.innerHTML);
    }
}


title.addEventListener('keyup', getvalue);
description.addEventListener('keyup', getvalue);



function addItemToForm(params) {
    var inputtype=params
    switch (inputtype) {
      case 'email':
        shortAnswer('email');
        appendArray('email', 'email')
        break;
      case 'shortanswer':
        shortAnswer();
        appendArray('shortanswer', null)
        break;
      case 'longanswer':
        longAnswer();
        appendArray('longanswer', 'textarea')
        break;

      case 'dropdown':
        dropdownAnswer();
        appendArray('Dropdown', 'dropdown')
        break;
      case 'date':
        dateAnswer();
        appendArray('date', 'date')
        break;
      case 'singleoption':
        singleOptionAnswer();
        console.log('date')
          
        break;
    
      default:
        console.log('fd')
        break;
    }
    // appendHtml();
}

function editItem(param, value) {
    formarray[param]=value;
    save();
}

function save() {

  updateForm();
  
}


var newformarray={
  "question_id":"",
  "form_id":"",
  "label":"Email",
  "type":"",
  "name":"email",
  "placeholder":"Email",
  "id":"email",
}

function appendArray(param, type){
  newformarray.type=type
  if (checkArray(type)) {
    var number=getNumberOfInputType(type);
    number=number+1;

    newformarray.form_id=formarray.form_id
    newformarray.label=formarrayform
    newformarray.name=param+number;
    newformarray.id=param+number;
    newformarray.placeholder=formarrayform+'...'
  } else {
    newformarray.form_id=formarray.form_id
    newformarray.name=param;
    newformarray.id=param;
    newformarray.label=formarrayform
    newformarray.placeholder='Your '+formarrayform+'...'
  }


  var array_length=mainform.length
  
addQuestionToApi(newformarray);
mainform.splice(array_length,0, newformarray)
}

function addQuestionToApi(params) {
  settings.url=base_url+'/api/forms/addquestion'
  settings.method="POST"
  settings.data=params

  $.ajax(settings).done(function (response) {
    let updatedAt=response.success.message.updated_at
    let question_id=response.success.message.question_id
    // let updatedAt=response.success.m
    newformarray.question_id=question_id
    
    showSaveSuccess(updatedAt);
    return question_id;
  })
}

function checkArray(params) {
  for (let index = 0; index < mainform.length; index++) {
    if (mainform[index].type == params){
      return true;
    }  else {}
    // mainform[index]
    
  }
}

function getNumberOfInputType(params) {
  var numberOfInputs=0;
  for (let index = 0; index < mainform.length; index++) {
    if (mainform[index].type == params){
       numberOfInputs=numberOfInputs+1;
      
    }  else {}
  }

  return numberOfInputs;
}

function shortAnswer(params) {
  let inputs=document.getElementsByClassName('field_container').length
  var para = document.createElement("div");
  para.classList.add('field_container')

    var label=document.createElement("label");
    if (params!==null) {
      if (params == 'email'){
        var node = document.createTextNode("Email");
        var nodetext='Email'
      }  
      else {
        var node = document.createTextNode("Short Answer");
        var nodetext='ShortAnswer'
      }
    }else{
      var nodetext='Short Answer'
    }

    formarrayform=nodetext;
    var input =document.createElement("input");

    // adding classes,placeholders and contenteditable
    input.placeholder='Email'
    label.contentEditable=true;
    if (params!==null || params !=='') {
      input.type=params
      if (params == 'email') {
        input.placeholder='Email'
      } else {
        input.placeholder='Your Short Answer..'
      }
    }
    input.classList.add('form-input');
    input.classList.add('form-control-has-validation');
    
    label.appendChild(node);
    para.appendChild(label)
    para.appendChild(input)
    

    var form = document.getElementById("form");
    var child = document.getElementsByClassName('field_container')[inputs];
    form.insertBefore(para,child);

    addOrRemoveOptions();

    // console.log(Number('4'));

}

function longAnswer(params) {
  let inputs=document.getElementsByClassName('field_container').length

  var para = document.createElement("div");

  para.classList.add('field_container')



  var label=document.createElement("label");

  var node = document.createTextNode("This is new.");

  formarrayform=node;
  var input =document.createElement("textarea");

  // adding classes,placeholders and contenteditable
  label.contentEditable=true;
  // input.type='textarea'
  // input
  input.rows="5"
  input.cols="30"
  input.classList.add('form-input');
  input.classList.add('form-control-has-validation');
  input.placeholder='This is New'
  label.appendChild(node);
  para.appendChild(label)
  para.appendChild(input)
  

  var form = document.getElementById("form");
  var child = document.getElementsByClassName('field_container')[inputs];
  form.insertBefore(para,child);

  addOrRemoveOptions();

}

function dateAnswer(params) {
  let inputs=document.getElementsByClassName('field_container').length

  var para = document.createElement("div");

  para.classList.add('field_container')



  var label=document.createElement("label");

  var node = document.createTextNode("This is new.");

  formarrayform=node;
  var input =document.createElement("input");

  // adding classes,placeholders and contenteditable
  label.contentEditable=true;
  input.classList.add('form-input');
  input.type='date'
  input.classList.add('form-control-has-validation');
  input.placeholder='This is New'
  label.appendChild(node);
  para.appendChild(label)
  para.appendChild(input)
  

  var form = document.getElementById("form");
  var child = document.getElementsByClassName('field_container')[inputs];
  form.insertBefore(para,child);

  addOrRemoveOptions();

}

function dropdownAnswer(params) {
 
let inputs=document.getElementsByClassName('field_container').length

var para = document.createElement("div");

para.classList.add('field_container')



var label=document.createElement("label");

var node = document.createTextNode("This is new.");

formarrayform=node;
var input =document.createElement("select");
var option=document.createElement("option");

// adding classes,placeholders and contenteditable
label.contentEditable=true;
input.classList.add('form-input');
input.classList.add('form-control-has-validation');
var optionvalue = document.createTextNode("First List in Dropdown");

option.value=optionvalue
option.appendChild(optionvalue)

input.appendChild(option);
label.appendChild(node);
para.appendChild(label)
para.appendChild(input)


var form = document.getElementById("form");
var child = document.getElementsByClassName('field_container')[inputs];
form.insertBefore(para,child);

addOrRemoveOptions();

 
}

function multichoiceAnswer(params) {
  let inputs=document.getElementsByClassName('field_container').length

    var para = document.createElement("div");

    para.classList.add('field_container')



    var label=document.createElement("label");

    var node = document.createTextNode("This is new.");

    formarrayform=node;
    var input =document.createElement("input");

    // adding classes,placeholders and contenteditable
    label.contentEditable=true;
    if (params!==null || params !=='') {
      input.type=params
    }
    input.classList.add('form-input');
    input.classList.add('form-control-has-validation');
    input.placeholder='This is New'
    label.appendChild(node);
    para.appendChild(label)
    para.appendChild(input)
    

    var form = document.getElementById("form");
    var child = document.getElementsByClassName('field_container')[inputs];
    form.insertBefore(para,child);

    addOrRemoveOptions();

}


function singleOptionAnswer(params) {
  let inputs=document.getElementsByClassName('field_container').length

    var para = document.createElement("div");

    para.classList.add('field_container')



    var label=document.createElement("label");
    // var innerlabel=document.createElement("label");
    // var innerlabel1=document.createElement("label");
    var node = document.createTextNode("This is new.");

    formarrayform=node;
    var input =document.createElement("input");
    var input2 =document.createElement("input");

    // adding classes,placeholders and contenteditable
    label.contentEditable=true;
    input.type='radio'
    input2.type='radio'
    input.classList.add('form-input');
    input2.classList.add('form-input');
    input.classList.add('form-control-has-validation');
    input.name='firstradio'
    input2.name='firstradio'

    input.appendChild(node)
    label.appendChild(node);
    // innerlabel.appendChild(input)
    // innerlabel.appendChild(node)


    // innerlabel1.appendChild(input)
    // innerlabel1.appendChild(node)
    para.appendChild(label)
    para.appendChild(input)
    para.appendChild(input2)
    

    var form = document.getElementById("form");
    var child = document.getElementsByClassName('field_container')[inputs];
    form.insertBefore(para,child);

    addOrRemoveOptions();

}


// for dropdown

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}



// form adding and removing of active classes

function addOrRemoveOptions(params) {
  for (let index = 0; index < inputDivs.length; index++) {
    inputDivs[index].addEventListener('mouseover', function(){
      addingOptions(index, this)
    });
  
    inputDivs[index].addEventListener('mouseout', function(e){
      removingOptions(index, this, e)
    });
  }
}


function addingOptions(params, element) {

  if (element.getElementsByClassName("showoptions")[0]) {
    
  } else {
    var containerDiv = document.createElement("div");
    var innerDiv=document.createElement("div")
    var btnOne=document.createElement("button")
    var btnTwo=document.createElement("button")
    var deleteOption=document.createElement("i")
    var editOption=document.createElement("i")
  
  
    containerDiv.classList.add('col-md-12')
  
    innerDiv.classList.add('col-md-7')
    innerDiv.classList.add('ml-auto')
    innerDiv.classList.add('text-dark')
    innerDiv.classList.add('text-right')
  
    deleteOption.classList.add('fa');
    deleteOption.classList.add('fa-trash');

    innerDiv.id=params
  
    editOption.classList.add('fa');
    editOption.classList.add('fa-pencil-square-o');
  
    btnOne.classList.add('btn')
    btnTwo.classList.add('btn')
  
    btnOne.classList.add('m-2')
    btnTwo.classList.add('m-2')
  
    btnOne.classList.add('mt-0')
    btnTwo.classList.add('mt-0')
  
    btnOne.classList.add('pt-0')
    btnTwo.classList.add('pt-0')
  
    btnOne.classList.add('pl-4')
    btnTwo.classList.add('pl-4')
  
    btnOne.appendChild(editOption);
    btnTwo.appendChild(deleteOption);

    // btnTwo.onclick="deleteItem("+params+")"
    // btnTwo.onclick="deleteItem()"
    btnTwo.addEventListener('click', function(e){
      e.preventDefault();
      
      deleteItem(params)
    })

    btnOne.addEventListener('click', function(e){
      e.preventDefault();
      
      showEditModal(params)
    })
  
    innerDiv.appendChild(btnOne)
    innerDiv.appendChild(btnTwo);
    
  
  // var node = document.createTextNode("This is new.");
  containerDiv.appendChild(innerDiv);
  // containerDiv.appendChild(node);
  
  containerDiv.classList.add('showoptions')
  var child = element.getElementsByTagName('label')[0];
  element.insertBefore(containerDiv,child);  
  }
}


function showEditModal(param){

  modal.style.display = "block";


  if(param){
    var form =formarrayform[param];

  }
  // When the user clicks on <span> (x), close the modal
  var span = modal.getElementsByTagName('span')[0]

  span.onclick = function() {
      modal.style.display = "none";
  }

// When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
}

function removingOptions(params, element,e){

  var child = document.getElementsByClassName("showoptions")[0];
  // element.removeChild(child)
}

function deleteItem(param){

  var formContainer=document.getElementsByClassName("field_container")[param]
  form.removeChild(formContainer)
  
  deleteItemInArray(param);

}
function deleteItemInArray(param){
  var currentItem=mainform[param];
  mainform.splice(param, 1)

  deleteItemInApi(currentItem.form_id, currentItem.question_id);
}

function deleteItemInApi(formId,questionId) {
  settings.url=base_url+"/api/forms/delete/"+formId+"/"+questionId;
  settings.method="GET"

  $.ajax(settings).done(function (response) {
    let updatedAt=response.success.message.updated_at
    // let updatedAt=response.success.m
    showSaveSuccess(updatedAt);
  })
}

for (let index = 0; index < inputLabels.length; index++) {
  index=index;
  // inputLabels[index].addEventListener('keyup', saveInputLabel);
  inputLabels[index].addEventListener('keyup',  function(){
    saveInputLabel(index)
}, false);
  
}

function saveInputLabel(index) {
  var labelName=inputLabels[index];
  var currentobject=formarray.form[index]
  currentobject.label=labelName.innerHTML
  // console.log(currentobject)

  updateForm();

  showSaveProgress();
}

function updateForm() {
  settings.url=base_url+'/api/forms/updateform'
  settings.method='POST'
  settings.data=formarray

  $.ajax(settings).done(function (response) {
    let updatedAt=response.success.message.updated_at
    // let updatedAt=response.success.m
    showSaveSuccess(updatedAt);
  })
}

function editAllowingResponses() {

  showSaveProgress();
  var form_id=formarray.form_id


  if (responseSwitch.checked ==true) {
    settings.url=base_url+'/api/forms/editallowresponse/'+form_id+'/true'
  }else if(responseSwitch.checked == false){
    settings.url=base_url+'/api/forms/editallowresponse/'+form_id+'/false'
  }else{
    settings.url=base_url+'/api/forms/editallowresponse/'+form_id+'/false'
  }

  $.ajax(settings).done(function (response) {
    let updatedAt=response.success.message.updated_at
    // let updatedAt=response.success.m
    showSaveSuccess(updatedAt);
  })
}


function showSaveProgress(params) {
  savingProgress.innerHTML='Saving...'
}

function showSaveFailure(params) {
  savingProgress.innerHTML='<span class="text-danger">Unable to save..Check connection</span>'
}

function showSaveSuccess(param) {
  savingProgress.innerHTML='Saved Successfully'

  setTimeout(() => {
    showLastSaved(param)
  }, 4000);
}

function showLastSaved(param) {
  savingProgress.innerHTML='Last Updated at '+param
}

// console.log(formarray);





responseSwitch.addEventListener('click', editAllowingResponses);

addOrRemoveOptions();