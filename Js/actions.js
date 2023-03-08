function AddDept(id){
    $('#add_dept-modal').css('display','flex');
    $('#company_id').val(id);
}

$('#select_dept').on('change', function(){
  if($('#select_dept') != null){
    alert('hey');
  } 
})