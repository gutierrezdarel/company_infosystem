
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
$('#btn-close-ucomp').click(function(){
  $('#overlay_update-company').css('display', 'none');
})
$('#btn-close-udept').click(function(){
  $('#overlay_update-department').css('display', 'none');
})
$('#btn-close-comp').click(function(){
  $('#overlay_add-company').css('display', 'none');
})
$('#btn-close_upos').click(function(){
  $('#overlay_update-position').css('display', 'none');
})
$('#btn-close_uemp').click(function(){
  $('#overlay_update-employee').css('display', 'none')
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
                    // '<p type="text" id="ucomp_name-'+department.id+'" data-id ="'+department.company_id+'">'+department.company_name+'</p>'+
                    '<td class="hide" id="ucomp_name-'+department.id+'" data-id ="'+department.company_id+'">'+department.company_name+'</td>'+
                    '<td id="udept_name-'+department.id+'">'+department.department_name+'</td>'+
                    '<td id="udept_des-'+department.id+'">'+department.department_description +'</td>'+
                    '<td>'+'<button class="btn_table" onclick ="edit_dept('+department.id +')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#417505" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></button>' +'</td>'+
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

function edit_dept(id){
  $('#udept_id').val(id)
  $('#overlay_update-department').css('display', 'flex')
  $('#update_comp_id').val($('#ucomp_name-'+id ).attr("data-id"))
    $('#Update_deptname').val($('#udept_name-'+id).html())
    $('#Update_deptdes').val($('#udept_des-'+id).html())
    // console.log(test.val())
}


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
                    '<td class="hide" id="select_dept-id-'+position.id+'" dept-id ="'+position.department_id+'">'+position.department_name+'</td>'+
                    '<td id="upos_name-'+position.id+'">'+position.position_name+'</td>'+
                    '<td id="upos_des-'+position.id+'">'+position.position_description +'</td>'+
                    '<td>'+'<button class="btn_table" onclick ="edit_pos('+position.id +')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#417505" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></button>' +'</td>'+
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

function edit_pos(id){
  
  $('#overlay_update-position').css('display', 'flex');

  $('#upos_id').val(id)
  $('#dept_id').val($('#select_dept-id-'+id ).attr("dept-id"))
  $('#update_posname').val($('#upos_name-'+id).html());
  $('#update_posdes').val($('#upos_des-'+id).html());

}


function emp_act(action){
      $('.display_empdept').empty().append('<option disabled selected value="">Department</option>')
      $('.display_emppos').empty().append('<option disabled selected value="">Position</option>')
  var data = {
      action:action,
      comp:$('#addemp_company').val(),
      ucomp:$('#uemp_company').val()
  };

      $.ajax({
      url:"php/EmployeeModel.php",
      type: "POST",
      data: data,
      success:function(response){
        var comp_res = JSON.parse(response)
       
        comp_res.forEach(company =>{
          $('.display_empdept').append(
            $('<option>',{
              value: company.id,
              text: company.department_name
          }));
        })    
      }
    })
    // console.log(data)
}

// emp_act(action);

  // $('#addemp_company').on('change',function(){
  //     var comp = $(this).val()
  //     $('#display_empdept').empty().append('<option disabled selected>Department</option>')
  //     $('#display_emppos').empty().append('<option disabled selected>Position</option>')

  //     $.ajax({
  //       url:"php/EmployeeModel.php",
  //       type: "POST",
  //       data: "comp="+comp,
  //       success:function(response){
  //         var comp_res = JSON.parse(response)
        
  //         comp_res.forEach(company =>{
  //           $('#display_empdept').append(
  //             $('<option>',{
  //               value: company.id,
  //               text: company.department_name
  //           }));
  //         })
          
  //       }
  //     })
  // })


function dept_act(act){
  $('.display_emppos').empty().append('<option disabled selected value="">Position</option>')
    var data2 = {
      act:act,
      dept:$('.adisplay_empdept').val(),
      udept:$('.udisplay_empdept').val()
      
    }
    $.ajax({
            url:"php/EmployeeModel.php",
            type: "POST",
            data: data2,
              success:function(response){
                var dept_res = JSON.parse(response)
      
                dept_res.forEach(dept =>{
                  $('.display_emppos').append(
                    $('<option>',{
                      value: dept.id,
                      text: dept.position_name
                  }));
                })
                // console.log(response)
            }
          })
}



// $('#display_empdept').on('change',function(){
//     var dept = $(this).val()
//     $('#display_emppos').empty().append('<option disabled selected>Position</option>')
//     $.ajax({
//       url:"php/EmployeeModel.php",
//       type: "POST",
//       data: "dept="+dept,
//         success:function(response){
//           var dept_res = JSON.parse(response)

//           dept_res.forEach(dept =>{
//             $('#display_emppos').append(
//               $('<option>',{
//                 value: dept.id,
//                 text: dept.position_name
//             }));
//           })
//       }
//     })
  
// })


$('#Birthday').on('change', function(){
  var birthday = new Date($('#Birthday').val())

  var age = Math.floor((new Date() - birthday)/ (365.25 * 24 * 60 * 60 * 1000));

  $('#age').val(age)
})


function edit_comp(id){
    $('#overlay_update-company').css('display','flex')
    $('#comp_id').val(id)
    $('#update_comp-name').val($('#comp_name-'+id).html())
    $('#update_comp-des').val($('#comp_des-'+id).html())
}

function edit_emp(id){
    $('#update_id').val(id)
    $('#overlay_update-employee').css('display', 'flex')
    $('#update_fname').val($('#emp_fname-'+id).html())
    $('#update_lname').val($('#emp_lname-'+id).html())
    $('#update_address').val($('#emp_loc-'+id).html())
    $('#update_contact').val($('#emp_contact-'+id).html())
    $('#update_gender').val($('#emp_gender-'+id).html())
    $('#update_status').val($('#emp_stats-'+id).html())
    $('#update_birthday').val($('#emp_bday-'+id).html())
    $('#update_age').val($('#emp_age-'+id).html())
    $('#comp_name').html($('#emp_compname-'+id).html()) 
    $('#dept_name').html($('#emp_deptname-'+id).html())
    $('#pos_name').html($('#emp_posname-'+id).html())
    
    

}


$('#update_birthday').on('change', function(){

  var update_birthday = new Date($('#update_birthday').val())

  var update_age = Math.floor((new Date() - update_birthday)/ (365.25 * 24 * 60 * 60 * 1000));

  $('#update_age').val(update_age)

})

