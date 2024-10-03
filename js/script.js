$("#registro").click(function(){
   var dato = $("#genre").val();
   var route = "http://localhost:8000/genero";
   var token = $("#token").val();
   
   $.ajax({
      url: route,
      headers: {'X-CSRF-TOKEN': token},
      type:'POST',
      datatype: 'json',
      data:{genre:dato}
   });
});

