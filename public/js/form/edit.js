

console.log(formarray);
// console.log('dfd')

// console.log(document.getElementsByTagName('h1')[0]);

var title=document.getElementsByTagName('h1')[0];
var description=document.getElementsByTagName('h5')[0];



function getvalue() {
    // console.log('gfg');
    // console.log(this.innerHTML)
    // console.log(this.nodeName);
    var type=this.nodeName;
    console.log(type);

    if (type == 'H1' || type=='h1'){
        editItem('form_name', this.innerHTML);
    }  else 
    // return;

    // editItem(this.innerHTML)
}


title.addEventListener('keyup', getvalue);
description.addEventListener('keyup', getvalue);






function removeItem(param) {

}

function addItem(params) {
    
}

function editItem(param, value) {
    // formarray[param]=value;
    console.log('dfd')
    console.log(formarray[param]);
}

function save(params) {
    
}