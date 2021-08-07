function get_list(){
    event.preventDefault();
    const filter = $('#filter_name').val();

    $.ajax({
        type: "POST",
        url: "includes/ajax/konyvlista.php",
        dataType: 'json',
        data: {
            'filter' : filter
        },
        success: function (data) {
            if (data.success){
                $('#list').html(data.htmllist);
            }
        },
        error: function(error){
            console.log(error.responseText);
        }
    });
}

function closePopup(){
    event.preventDefault();
    $('#popup-form').hide(200);
    $('#genres').html('');
    $('#authors').html('');
    $('#popup_id').val('0');
    $('#popup_name').val('');
    $('#popup_lead').val('');
}

function save(){
    event.preventDefault();

    const id = $('#popup_id').val();
    const name = $('#popup_name').val();
    const lead = $('#popup_lead').val();

    const genreArr = [];
    $('.genre_id').each(function(){
        if($(this).val() > 0){
            genreArr.push($(this).val());
        }
    });
    const authorArr = [];
    $('.author_id').each(function(){
        if($(this).val() > 0){
            authorArr.push($(this).val());
        }
    });
    $.ajax({
        type: "POST",
        url: "includes/ajax/konyvmentes.php",
        dataType: 'json',
        data: {
            'id' : id,
            'name' : name,
            'lead' : lead,
            'genreArr' : genreArr,
            'authorArr' : authorArr
        },
        success: function (data) {
            if (data.success){
                get_list();
                $('#genres').html();
                $('#authors').html();
                $('#popup_id').val('0');
                $('#popup_name').val('');
                $('#popup_lead').val('');
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
        url: "includes/ajax/konyvadat.php",
        dataType: 'json',
        data: {
            'id' : modifyId
        },
        success: function (data) {
            if (data.success){
                $('#popup_id').val(data.modifyId);
                $('#popup_name').val(data.name);
                $('#popup_lead').val(data.lead);
                if(data.genres.length > 0){
                    for(i=0;i<data.genres.length;i++){
                        add_genre_row(data.genres[i]);
                    }
                }
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
        url: "includes/ajax/konyvtorles.php",
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

function add_genre_row(id){
    $('#genres').append(genres);
    if(id > 0){
        $('.genre_id option[value=\''+id+'\']').last().prop('selected',true);
    }
}

function add_author_row(id){
    $.ajax({
        type: "POST",
        url: "includes/ajax/szerzolista.php",
        dataType: 'json',
        data: {},
        success: function (data) {
            if (data.success){
                $('#authors').append(data.authorlist);
                $('.author_id option[value=\''+id+'\']').last().prop('selected',true);
            }
        },
        error: function(error){
            console.log(error.responseText);
        }
    });
}