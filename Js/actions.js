
$('#btn_add-company').click(function(){
    $('#overlay_add-company').css('display', 'flex')
})
$('.btn-close-demp').click(function(){
  $('#overlay_delete-employee').fadeOut();
})
$('#btn-close').click(function(){
  $('#overlay_add-company').fadeOut();
})
$('#btn_add-department').click(function(){
  $('#overlay_add-department').css('display', 'flex');
})
$('#btn-close-dept').click(function(){
  $('#overlay_add-department').fadeOut();
})
$('#btn_add-position').click(function(){
  $('#overlay_add-position').css('display', 'flex');
})
$('#btn-close_pos').click(function(){
  $('#overlay_add-position').fadeOut();
})
$('#btn_add-employee').click(function(){
  $('#overlay_add-employee').css('display', 'flex');
})
$('#btn-close_emp').click(function(){
  $('#overlay_add-employee').fadeOut();
})
$('#btn-close-ucomp').click(function(){
  $('#overlay_update-company').fadeOut();
})
$('#btn-close-udept').click(function(){
  $('#overlay_update-department').fadeOut();
})
$('.btn-close-ddept').click(function(){ 
  $('#overlay_delete-department').fadeOut();
  localStorage.clear()
})
$('.btn-close-ddept2').click(function(){
  $('#overlay_delete2-department').fadeOut();
  localStorage.clear()
})
$('#btn-close-comp').click(function(){
  $('#overlay_add-company').fadeOut();
})
$('.btn-close-dcomp').click(function(){
  $('#overlay_delete-company').fadeOut();
  localStorage.clear()
})
$('.btn-close-dcomp2').click(function(){
  $('#overlay_delete-company2').fadeOut();
  localStorage.clear()
})
$('#btn-close_upos').click(function(){
  $('#overlay_update-position').fadeOut();
})
$('.btn-close-dpos').click(function(){
  $('#overlay_delete-position').fadeOut();
  localStorage.clear()
})
$('.btn-close-dpos2').click(function(){
  $('#overlay_delete2-position').fadeOut();
})
$('#btn-close_uemp').click(function(){
  $('#overlay_update-employee').fadeOut();
})
$('#btn-close-upload').click(function(){
  $('.upload-overlay').fadeOut()
})
$('.upload-btn').click(function(){
  $('.upload-overlay').css('display', 'flex')
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
                    '<td id="ucomp_name-'+department.id+'" data-id ="'+department.company_id+'">'+department.company_name+'</td>'+
                    '<td id="udept_name-'+department.id+'">'+department.department_name+'</td>'+
                    '<td id="udept_des-'+department.id+'">'+department.department_description +'</td>'+
                    '<td>'+'<button class="btn_table" onclick ="edit_dept('+department.id +')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#417505" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></button>' 
                          +'<button class="btn_table" onclick ="delete_dept('+department.id +')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>'
                    +'</td>'+
                    '</tr>'
                )
              })
            }else{
              $(".dept_norec").text("No records found");

            }   
        }
      })
}
getselected();

function delete_dept(id){
    
    var dept_id = $('#dept_id').val(id)
    var data_deptid  = [];

        $.ajax({
        url: 'php/PositionModel.php',
        type: 'GET',
        data: 'dept-json',
        success: function(dept_data){
                var res_deptdata = JSON.parse(dept_data)
        

            res_deptdata.forEach(deptdata =>{
                  
              data_deptid.push(deptdata.department_id)
              localStorage.setItem('data-dept',data_deptid)

            })    

            
            var get_deptdata =  localStorage.getItem('data-dept');
              var arr_deptdata = get_deptdata.split(",")

            for(var i = 0; i < arr_deptdata.length; i++){
                if(arr_deptdata[i] === dept_id.val()){
                  
                  $('#overlay_delete2-department').css('display', 'flex');
                  return true;
                }  
            }
            $('#overlay_delete-department').css('display', 'flex');  
            return false;
        }  
      })
}

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
                    '<td id="select_dept-id-'+position.id+'" dept-id ="'+position.department_id+'">'+position.department_name+'</td>'+
                    '<td id="upos_name-'+position.id+'">'+position.position_name+'</td>'+
                    '<td id="upos_des-'+position.id+'">'+position.position_description +'</td>'+
                    '<td>'+'<button class="btn_table" onclick ="edit_pos('+position.id +')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#417505" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></button>' 
                          +'<button class="btn_table" onclick ="delete_pos('+position.id +')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>'
                    +'</td>'+
                    '</tr>'
                )         
              })   
            }else{
              $(".pos_norec").text("No records found");
            }      
        }
      })   
}
getposition();

function delete_pos(id){
    
    $('.delete_text').empty()
    $('.delete_text2').empty()
    var pos_id = $('#pos_id').val(id)
    var data_posid = [];
        $.ajax({
        url: 'php/EmployeeModel.php',
        type: 'GET',
        data: 'json',
        success: function(data){
                var res_data = JSON.parse(data)
          

            res_data.forEach(data =>{
                data_posid.push(data.position_id)
              localStorage.setItem('data-pos',data_posid)
            })    
          
            var get_data =  localStorage.getItem('data-pos');
              var arr_data = get_data.split(",")
            for(var i = 0; i < arr_data.length; i++){
              if(arr_data[i] === pos_id.val()){
                $('#overlay_delete2-position').css('display','flex')
                return true;
              }  
          }
                $('#overlay_delete-position').css('display', 'flex')
                return false;
           
        }  
      })
}

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
}



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
            }
          })
}

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

function delete_emp(id){
    // console.log('hey')
    $('#overlay_delete-employee').css('display', 'flex');
    $('#emp_id').val(id)

}

function delete_comp(id){
         

      var comp_id = $('#dcomp_id').val(id)

          var data_compid = [];
      $.ajax({
      url: 'php/DepartmentModel.php',
      type: 'GET',
      data: 'comp-json',
      success: function(comp_data){
          var res_compdata = JSON.parse(comp_data)

            res_compdata.forEach(compdata =>{
                data_compid.push(compdata.company_id)
                localStorage.setItem('compdata', data_compid)
            })
            var get_compid =  localStorage.getItem('compdata');
            var arr_compid = get_compid.split(",")
            
            for(var i = 0; i < arr_compid.length; i++ ){
                  if(arr_compid[i] === comp_id.val()){
                      $('#overlay_delete-company2').css('display','flex')
                      return true;
                  }
            }
            $('#overlay_delete-company').css('display' ,'flex')
            return false;
          } 
     })
}

$('#contact').on('keyup', function(){
 var isvalid =  $('#contact').val()

    if(isvalid  == ""){
      $('.contact').css('border','1px solid #9e9e9e')
      $('.cont_validation').removeAttr('disabled')
      $('.cont_validation').css('opacity','1')
      
    }else if(isvalid.length === 11){
      $('.contact').css('border','1px solid rgb(135, 206, 250)')
      $('.cont_validation').removeAttr('disabled')
      $('.cont_validation').css('opacity','1')
      
    }else{
      $('.contact').css('border','1px solid red')
      $('.cont_validation').attr('disabled','disabled')
      $('.cont_validation').css('opacity','0.7')
    }
})

$('#update_contact').on('keyup', function(){
  var uisvalid =  $('#update_contact').val()

  if(uisvalid  == ""){
    $('#update_contact').css('border','1px solid #9e9e9e')
    $('#Uemp').removeAttr('disabled')
    $('#Uemp').css('opacity','1')
    
  }else if(uisvalid.length === 11){
    $('#update_contact').css('border','1px solid rgb(135, 206, 250)')
    $('#Uemp').removeAttr('disabled')
    $('#Uemp').css('opacity','1')
    
  }else{
    $('#update_contact').css('border','1px solid red')
    $('#Uemp').attr('disabled','disabled')
    $('#Uemp').css('opacity','0.7')
  }
})


// $('#filter_name').on('keyup' , function(){
  
// })


function filter(){
  $('.filt').empty();
  $('.emp_norec').empty();
  var name = $('#filter').val()
 
   $.ajax({
       url:'php/EmployeeModel.php',
       type:'GET',
       data: 'filter_name='+name,
       success:function(filtered){
         var res_filtered = JSON.parse(filtered)
 
          if(res_filtered == ""){
            $('.emp_norec').text('No records found')
          }

           res_filtered.forEach(datafiltered =>{
             $('.filt').append('<tr>'+ 
             '<td id="emp_fname-'+ datafiltered.id+ '">'+datafiltered.fname +'</td>'+
             '<td id="emp_lname-'+ datafiltered.id+ '">'+datafiltered.lname +'</td>'+ 
             '<td id="emp_gender-'+ datafiltered.id+ '">'+datafiltered.gender +'</td>'+ 
             '<td id="emp_loc-'+ datafiltered.id+ '">'+datafiltered.loc +'</td>'+ 
             '<td id="emp_contact-'+ datafiltered.id+ '">'+datafiltered.contact +'</td>'+ 
             '<td id="emp_bday-'+ datafiltered.id+ '">'+datafiltered.birthday +'</td>'+ 
             '<td id="emp_age-'+ datafiltered.id+ '">'+datafiltered.age +'</td>'+
             '<td id="emp_compname-'+ datafiltered.id+ '">'+datafiltered.company_name +'</td>'+ 
             '<td id="emp_deptname-'+ datafiltered.id+ '">'+datafiltered.department_name +'</td>'+
             '<td id="emp_posname-'+ datafiltered.id+ '">'+datafiltered.position_name +'</td>'+
             '<td id="emp_stats-'+ datafiltered.id+ '">'+datafiltered.stats +'</td>'+
             '<td>'+'<button class="btn_table" onclick ="edit_emp('+datafiltered.id +')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#417505" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></button>' 
                   +'<button class="btn_table" onclick ="delete_emp('+datafiltered.id +')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>'
             +'</td>'+    
             '</tr>')
           })
         
       } 
   })
}
filter();