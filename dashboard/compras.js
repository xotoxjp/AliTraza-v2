$(document).ready(function() {
    $("#btnCancel").click(function() {
        $("#formcompras")[0].reset()
    });

    $("#btnGuardar").click(function(e) {
      e.preventDefault();
        
      var fechaCompra = $("#fechaCompra").val(); 
      var presupuesto = $("#presupuesto").val();
      var productor = $("#productor").val();
      var cantidad = $("#cantidad").val();
         
      var dataString = 'fechaCompra='+fechaCompra+'&presupuesto='+presupuesto+'&productor='+productor+'&cantidad='+cantidad;
        
      $.ajax({
        type:'POST',
        data: dataString,
        url:'bd/guardarCompras.php',
        success:function(data) {
          alert("Se agregaron "+cantidad+" nuestras al presupuesto número "+presupuesto+" exitosamente!");
          $("#formcompras")[0].reset();
        }
      });
    });


    tablaPresupuestos=$("#tablaPresupuestos").DataTable({
      "columnDefs":[{
          "targets": -1,
          "data":null,
          "defaultContent":"<div class='text-center'><div class='btn-group'><button class='btn btn-success btnConfirmarPres'>Confirmar</button><button class='btn btn-danger btnBorrarPres'>Desestimar</button></div></div>"  
      }],
       
      "language": {
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados",
          "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sSearch": "Buscar:",
          "oPaginate": {
              "sFirst": "Primero",
              "sLast":"Último",
              "sNext":"Siguiente",
              "sPrevious": "Anterior"
          },
          "sProcessing":"Procesando...",
      }
    });

    var fila; //capturar la fila para editar o borrar el registro

  
      //botón BORRAR
      $(document).on("click", ".btnBorrarPres", function(){    
          fila = $(this);
          id = parseInt($(this).closest("tr").find('td:eq(0)').text());
          opcion = 3 //borrar
          var respuesta = confirm("¿Está seguro de desestimar el registro: "+id+"?");
          if(respuesta){
              $.ajax({
                  url: "bd/crudPresu.php",
                  type: "POST",
                  dataType: "json",
                  data: {opcion:opcion, id:id},
                  success: function(){
                    tablaPresupuestos.row(fila.parents('tr')).remove().draw();
                  }
              });
          }   
      });

      //boton Confirmar
      $(document).on("click", ".btnConfirmarPres", function(){
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 1; //confirmar
        var respuesta = confirm("¿Está seguro de confirmar el registro: "+id+"?");
        if(respuesta){
            $.ajax({
                url: "bd/crudPresu.php",
                type: "POST",
                dataType: "json",
                data: {opcion:opcion, id:id},
                success: function(){
                  tablaPresupuestos.row(fila.parents('tr')).remove().draw();
                }
            });
        }   
    });


});