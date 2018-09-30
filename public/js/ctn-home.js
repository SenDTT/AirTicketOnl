//days
document.querySelector('#toDate').valueAsDate = new Date();
document.querySelector('#toReturnDate').valueAsDate = new Date();
document.querySelector('#toDate').min = new Date();
document.querySelector('#toReturnDate').min = new Date();


$('#checkbox').click(function (e) {
    var checkbox = $('#checkbox:checked').length;
    if(checkbox == 1){
        $('#idReturnDate').show();
    }else{
        $('#idReturnDate').hide();
    }
});
