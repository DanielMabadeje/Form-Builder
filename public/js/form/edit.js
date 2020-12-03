var title=document.getElementsByTagName('h1')[0];
var description=document.getElementsByTagName('h5')[0];

var inputDivs=document.getElementsByClassName('field_container');
var inputLabels=document.getElementsByClassName('form-label');
var savingProgress=document.getElementsByClassName('save')[0];
var responseSwitch=document.getElementById('switch');


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






function removeItemFromForm(param) {

}

function addItemToForm(params) {
    // console.log(formarray.form_array);
    var newobject={}

    // if (condition) { 
      
    // } else {
      
    // }
    var inputtype=params
    switch (inputtype) {
      case 'email':
        shortAnswer('email');
        console.log('shortanswer')
        break;
      case 'shortanswer':
        shortAnswer();
        console.log('shortanswer')
        break;
      case 'longanswer':
        longAnswer();
        console.log('longanswer')
        break;

      case 'dropdown':
        dropdownAnswer();
        console.log('dropdown')
        break;
      // case 'dropdown':
      //   dropdownAnswer();
      //   console.log('date')
      //   break;
      case 'date':
        dateAnswer();
        console.log('date')
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

  console.log('saved');
  
}


function editFormHtml(params) {
    
}


// function appendHtml(params) {

    
// }


function shortAnswer(params) {
  let inputs=document.getElementsByClassName('field_container').length-1

    var para = document.createElement("div");

    para.classList.add('field_container')



    var label=document.createElement("label");

    var node = document.createTextNode("Email");
    var input =document.createElement("input");

    // adding classes,placeholders and contenteditable
    input.placeholder='This is New'
    label.contentEditable=true;
    if (params!==null || params !=='') {
      input.type=params
      input.placeholder='Your Email..'
    }
    input.classList.add('form-input');
    input.classList.add('form-control-has-validation');
    
    label.appendChild(node);
    para.appendChild(label)
    para.appendChild(input)
    

    var form = document.getElementById("form");
    var child = document.getElementsByClassName('field_container')[inputs];
    form.insertBefore(para,child);

}

function longAnswer(params) {
  let inputs=document.getElementsByClassName('field_container').length-1

  var para = document.createElement("div");

  para.classList.add('field_container')



  var label=document.createElement("label");

  var node = document.createTextNode("This is new.");
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

}

function dateAnswer(params) {
  let inputs=document.getElementsByClassName('field_container').length-1

  var para = document.createElement("div");

  para.classList.add('field_container')



  var label=document.createElement("label");

  var node = document.createTextNode("This is new.");
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

}

function dropdownAnswer(params) {
 
let inputs=document.getElementsByClassName('field_container').length-1

var para = document.createElement("div");

para.classList.add('field_container')



var label=document.createElement("label");

var node = document.createTextNode("This is new.");
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

 
}

function multichoiceAnswer(params) {
  let inputs=document.getElementsByClassName('field_container').length-1

    var para = document.createElement("div");

    para.classList.add('field_container')



    var label=document.createElement("label");

    var node = document.createTextNode("This is new.");
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

}


function singleOptionAnswer(params) {
  let inputs=document.getElementsByClassName('field_container').length-1

    var para = document.createElement("div");

    para.classList.add('field_container')



    var label=document.createElement("label");
    // var innerlabel=document.createElement("label");
    // var innerlabel1=document.createElement("label");
    var node = document.createTextNode("This is new.");
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

for (let index = 0; index < inputDivs.length; index++) {
  // const element = array[index];
  inputDivs[index].addEventListener('mouseover', addingOptions);
  
}


function addingOptions(params) {
  console.log('mouse reach here')
}

// console.log(inputLabels);

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
  console.log(currentobject)

  showSaveProgress();
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
    showLastSaved
  }, 4000);
}

function showLastSaved(param) {
  savingProgress.innerHTML='Last Updated at '+param
}

// console.log(formarray);





responseSwitch.addEventListener('click', editAllowingResponses);