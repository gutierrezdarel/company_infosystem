
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




// $('#append_position').on('change', function(){
//     var filter = $(this).val()

//     $.ajax({
//       url: "php/PositionModel.php",
//       type: "POST",
//       data: "display="+filter,
//       success:function(response){
//         console.log(response)
//       }
//     })
// })


// var Appendbtn = false;
// function append(id){
//   var dept = id;
    
//   $.ajax({
//       url:"php/act_company.php",
//       type: "POST",
//       data: "append="+dept,
//       success:function(response){
//         var res = JSON.parse(response);

//         if(Appendbtn == false){  
//           $('.append-position-'+id).empty()
//           res.forEach(position =>{
//             $('.append-position-'+position.department_id).append(
//               '<p>'+ position.position_name +'</p>'+
//               '<div>')    
//               $('.append-position-'+id).css('display','block')  
//         })  
//         Appendbtn = true
//         }else{
//         $('.append-position-'+id).css('display','none')  
//           Appendbtn = false
//         }
//       }
//     })
// }

// $('#select_company').on('change', function(){

//    var selectCompany =  $('#select_company').val()

//    $.ajx({
//     url:"php/act_company.php",
//     type: "POST",
//     data: "selected="+selectCompany,
//     success:function (response){
//       console.log(response);
//     }

//    })

// })