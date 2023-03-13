
$('#btn_add-company').click(function(){
    $('#overlay_add-company').css('display', 'flex');
})
$('#btn_add-department').click(function(){
  $('#overlay_add-department').css('display', 'flex');
})
$('#btn_add-position').click(function(){
  $('#overlay_add-position').css('display', 'flex');
})

// $('#select_table').change(function(){
//   var data = $(this).val()
//     console.log(data);
// })

function getselected(){
  $('.dept').empty()
    $('.dept_norec').empty()
  var data = $('#select_table').val()
        $.ajax({
        url: "php/DepartmentModel.php",
        type: "POST",
        data: "append="+data,
        success:function(response){
            var res = JSON.parse(response);

            if(res != 0){
              res.forEach(department =>{
                $('.dept').append(
                    '<tr>'+
                    '<td>'+department.department_name+'</td>'+
                    '<td>'+department.department_description +'</td>'+
                    // '<td>'+ +'</td>'+
                    '</tr>'
                )
              })
            }else{
              $(".dept_norec").text("No Records Found!");

            }

            
        }
      })
}
getselected();

function getposition(){
  $('.position').empty()
    $('.pos_norec').empty()
  var data = $('#append_position').val()
        $.ajax({
        url: "php/PositionModel.php",
        type: "POST",
        data: "display="+data,
        success:function(response){
            var res = JSON.parse(response);

            if(res != 0){
              res.forEach(position =>{
                $('.position').append(
                    '<tr>'+
                    '<td>'+position.position_name+'</td>'+
                    '<td>'+position.position_description +'</td>'+
                    // '<td>'+ +'</td>'+
                    '</tr>'
                )
              })
            }else{
              $(".pos_norec").text("No Records Found!");

            }        
        }
      })
}

getposition();

