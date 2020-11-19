var title=document.getElementsByTagName('h1')[0];
var description=document.getElementsByTagName('h5')[0];



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
    console.log(formarray.form_array);
    var newobject={}

    // if (condition) {
      
    // } else {
      
    // }
    appendHtml();
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


function appendHtml(params) {

    let inputs=document.getElementsByClassName('field_container').length-1

    var para = document.createElement("div");

    para.classList.add('field_container')



    var label=document.createElement("label");

    var node = document.createTextNode("This is new.");
    var input =document.createElement("input");

    // adding classes,placeholders and contenteditable
    label.contentEditable=true;
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
