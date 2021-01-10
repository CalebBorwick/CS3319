window.onload=function(){
    prepareListener1();//calls listener 1 for province code element
    prepareListener2();//calls listener 1 for province code element
}

function prepareListener1(){
    var ddms;
    ddms=document.getElementById("provincecode"); //finds var by id
    ddms.addEventListener("change", submit); //calls on submit on change
}
function prepareListener2(){
    var uninum;
    uninum=document.getElementById("officialname");//finds var by id
    uninum.addEventListener("change", submit); //calls submit on change
}

function submit(){
    this.form.submit();//submits the form
}


