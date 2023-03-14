
$('#btn_add-company').click(function(){
    $('#overlay_add-company').css('display', 'flex');
})
$('#btn-close').click(function(){
  $('#overlay_add-company').css('display', 'none');
})

$('#btn_add-department').click(function(){
  $('#overlay_add-department').css('display', 'flex');
})
$('#btn-close-dept').click(function(){
  $('#overlay_add-department').css('display', 'none');
})
$('#btn_add-position').click(function(){
  $('#overlay_add-position').css('display', 'flex');
})
$('#btn-close_pos').click(function(){
  $('#overlay_add-position').css('display', 'none');
})
$('#btn_add-employee').click(function(){
  $('#overlay_add-employee').css('display', 'flex');
})
$('#btn-close_emp').click(function(){
  $('#overlay_add-employee').css('display', 'none');
})

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


$('#addemp_company').on('change',function(){
    var comp = $(this).val()
    $('#display_empdept').empty().append('<option disabled selected>Department</option>')
    $('#display_emppos').empty().append('<option disabled selected>Position</option>')

    $.ajax({
      url:"php/EmployeeModel.php",
      type: "POST",
      data: "comp="+comp,
      success:function(response){
        var comp_res = JSON.parse(response)
       
        comp_res.forEach(company =>{
          $('#display_empdept').append(
            $('<option>',{
              value: company.id,
              text: company.department_name
          }));
        })
        
      }
    })
})


$('#display_empdept').on('change',function(){
    var dept = $(this).val()
    $('#display_emppos').empty().append('<option disabled selected>Position</option>')
    $.ajax({
      url:"php/EmployeeModel.php",
      type: "POST",
      data: "dept="+dept,
        success:function(response){
          var dept_res = JSON.parse(response)

          dept_res.forEach(dept =>{
            $('#display_emppos').append(
              $('<option>',{
                value: dept.id,
                text: dept.position_name
            }));
          })
      
      }
    })
  
})