
$('#btn_show_company').click(function(){
    $('#overlay_add-company').css('display', 'flex');
})
$('#btn_show-department').click(function(){
  $('#overlay_add-department').css('display', 'flex');
})

$('#btn_show-position').click(function(){
  $('#overlay_add-position').css('display', 'flex');
})

 var showBtn = false

function show(id){
  var comp = id;
    $.ajax({
      url:"php/act_company.php",
      type: "POST",
      data: "show="+comp,
      success:function(response){
        var res = JSON.parse(response);

        if(showBtn == false){
              
          $('.append-department-'+id).empty()
          res.forEach(department =>{
            
            $('.append-department-'+department.company_id).append(
               '<div class="appen-content">'+
              '<p>'+ department.department_name +'</p>'+
              '<div class="append-button">'+
              '<button><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#417505" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></button> <button><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>'+
              '</div>'+
              '<div>')    
              $('.append-department-'+id).css('display','flex') .addClass('dept')  
        })  
        showBtn = true
        }else{
        $('.append-department-'+id).css('display','none')
          showBtn = false
        }
      
      }
    })
}

var Appendbtn = false;
function append(id){
  var dept = id;
    
  $.ajax({
      url:"php/act_company.php",
      type: "POST",
      data: "append="+dept,
      success:function(response){
        var res = JSON.parse(response);

        if(Appendbtn == false){  
          $('.append-position-'+id).empty()
          res.forEach(position =>{
            $('.append-position-'+position.department_id).append(
              '<p>'+ position.position_name +'</p>'+
              '<div>')    
              $('.append-position-'+id).css('display','block')  
        })  
        Appendbtn = true
        }else{
        $('.append-position-'+id).css('display','none')  
          Appendbtn = false
        }
        // console.log(response)
      }
    })
}