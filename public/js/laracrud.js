   // contact update
   $('#edit-form').on('submit',function(event) {
    event.preventDefault();
    
    $.ajax({
        type:"POST",
        url:'update',
        data: {
            contact_id: $('#contact_id2').val(),
            name: $('#name2').val(),
            email: $('#email2').val(),
            phone: $('#phone2').val(),
            _token: $('#csrftoken2').val(),
        },
        dataType: "html",
        success: function(response) {
        $('#success').html(response);
        }
    })
    $('#reset2').trigger('click');
});



function edit(e) {
    var iie= (e.value);
    $.ajax({
        type:"POST",
        url:'edit',
        data: {
            id: iie,
            _token: $('#csrftoken2').val(),
        },
        dataType: "html",
        success: function(response) {
        $('#edit-form').html(response);
        // console.log(response);
            
        }
    })
   }




//contact live delete
function del(d) {
    var iid= (d.value);
    // alert(iid);

    $.ajax({
        type:"POST",
        url:'delete',
        data: {
            id: iid,
            _token: $('#csrftoken').val(),
        },
        dataType: "html",
        success: function(response) {
        $('#success').html(response);
            
        }
    })
   }



// contact live view
//when body loads in body tag in onload event call this function
function users() {
    $.ajax({
        type:"get",
        url:'viewContact',
        dataType: "html",
        success: function(response) {
            $('#success').html(response);
        }
    })
}




    // contact insert
    $('#form-submit').on('submit',function(event) {
        event.preventDefault();

        $.ajax({
            type:"POST",
            url:'storeContact',
            // url:'{{ URL::to("/storeContact") }}',
            data: {
                name: $('#name').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                _token: $('#csrftoken').val(),
            },
            dataType: "html",
            success: function(response) {
            $('#success').html(response);
            }
        })
        $('#reset').trigger('click');
    });


    
 


    
    
    
    
    
   


