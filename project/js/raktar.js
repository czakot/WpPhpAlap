function get_list(){
    const filter = $('#filter_name').val();
    $.ajax({
        type: "POST",
        url: "includes/ajax/raktarlista.php",
        dataType: 'json',
        data: {
            'filter' : filter
        },
        success: function (data) {
            if (data.success){
                $('#raktarlista').html(data.htmllist);
            }
        },
        error: function(error){
            console.log(error.responseText);
        }
    });
}

function closePopup(){
    $('#popup-form').hide(200);
}

function save(){
    const azonosito = $('#popup_azonosito').val();
    const name = $('#popup_name').val();
    const id = $('#popup_id').val();

    $.ajax({
        type: "POST",
        url: "includes/ajax/raktarmentes.php",
        dataType: 'json',
        data: {
            'azonosito' : azonosito,
            'name' : name,
            'id' : id
        },
        success: function (data) {
            if (data.success){
                get_list();
                $('#popup_azonosito').val('');
                $('#popup_name').val('');
                $('#popup_id').val(0);
            }
        },
        error: function(error){
            console.log(error.responseText);
        }
    });
}

function modify(modifyId){
    $.ajax({
        type: "POST",
        url: "includes/ajax/raktaradat.php",
        dataType: 'json',
        data: {
            'id' : modifyId
        },
        success: function (data) {
            if (data.success){
                $('#popup_azonosito').val(data.azonosito);
                $('#popup_name').val(data.name);
                $('#popup_id').val(modifyId);
                $('#popup-form').show(200);
            }
        },
        error: function(error){
            console.log(error.responseText);
        }
    });
}

function deleteItem(deleteId){
    $.ajax({
        type: "POST",
        url: "includes/ajax/raktartorles.php",
        dataType: 'json',
        data: {
            'id' : deleteId
        },
        success: function (data) {
            if (data.success){
                closePopup();
                get_list();
            }
        },
        error: function(error){
            console.log(error.responseText);
        }
    });
}

function newItem(){
    $('#popup-form').show(200);
}

$(document).ready(function(){
    get_list();
});