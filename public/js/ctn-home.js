//days
document.querySelector('#toDate').valueAsDate = new Date();
document.querySelector('#toReturnDate').valueAsDate = new Date();
document.querySelector('#toDate').min = new Date();
document.querySelector('#toReturnDate').min = new Date();
//checkBox
function myFunc(){
    var checkbox = document.getElementById('checkbox');
    var div = document.getElementById('idReturnDate');
    if(checkbox.checked == true){
        div.style.display = "block";
    }else{
        div.style.display = "none";
    }
}
