$(document).ready(function(){
    tablaDefAnalisis = $("#tablaDefAnalisis").DataTable({
       "columnDefs":[{
            "targets": -1,
            "data":null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditDefAnalisis'>Editar</button><button class='btn btn-danger btnBorrarDefAnalisis'>Borrar</button></div></div>"  
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
    
    $("#btnNuevaDefAnalisis").click(function(){
        $("#formTipoAnalisis").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nueva Definición de Análisis");            
        $("#modalCRUDTipoAnalisis").modal("show");        
        id=null;
        opcion = 1; //alta
    });

    
    var fila; //capturar la fila para editar o borrar el registro
    
    //botón EDITAR    
    $(document).on("click", ".btnEditDefAnalisis", function(){
        fila = $(this).closest("tr");    
        id = parseInt(fila.find('td:eq(0)').text());
        nomenclador = fila.find('td:eq(1)').text();
        detalle = fila.find('td:eq(2)').text();
        unidad = fila.find('td:eq(3)').text();
        limite_inferior = fila.find('td:eq(4)').text();
        limite_superior = fila.find('td:eq(5)').text();
        aplica_rechazo = fila.find('td:eq(6)').text();
        
        $("#analisisdefid").val(id);
        $("#nomenclador").val(nomenclador);
        $("#detalle").val(detalle);
        $("#unidad").val(unidad);
        $("#limite_inferior").val(limite_inferior);
        $("#limite_superior").val(limite_superior);
        $("#aplica_rechazo").val(aplica_rechazo);
        opcion = 2; //editar
        
        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Definición");            
        $("#modalCRUDTipoAnalisis").modal("show");         
    });

    //botón BORRAR
    $(document).on("click", ".btnBorrarDefAnalisis", function(){    
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3; //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
        if(respuesta){
            $.ajax({
                url: "bd/crudDefAnalisis.php",
                type: "POST",
                dataType: "json",
                data: {opcion:opcion, id:id},
                success: function(){
                    tablaDefAnalisis.row(fila.parents('tr')).remove().draw();
                }
            });
        }   
    });
    

    //botón AGREGAR
    $("#formTipoAnalisis").submit(function(e){
        e.preventDefault();
        id=$.trim($("#analisisdefid").val());        
        nomenclador = $.trim($("#nomenclador").val());
        detalle = $.trim($("#detalle").val());
        unidad = $.trim($("#unidad").val()); 
        limite_inferior = $.trim($("#limite_inferior").val());
        limite_superior = $.trim($("#limite_superior").val());
        aplica_rechazo = $.trim($("#aplica_rechazo").val());
        
        $.ajax({
            url: "bd/crudDefAnalisis.php",
            type: "POST",
            dataType: "json",
            data: {id:id,nomenclador:nomenclador,detalle:detalle, unidad:unidad, limite_inferior:limite_inferior, limite_superior:limite_superior,aplica_rechazo:aplica_rechazo,opcion:opcion},
            success: function(data){
                id = data[0].id;
                //nomenclador = data[0].nomenclador;
                //detalle = data[0].detalle;
                //unidad = data[0].unidad;
                //limite_inferior = data[0].limite_inferior;
                //limite_superior = data[0].limite_superior;
                //aplica_rechazo = data[0].aplica_rechazo;
                if(opcion == 1){tablaDefAnalisis.row.add([id,nomenclador,detalle,unidad,limite_inferior,limite_superior,aplica_rechazo]).draw();}
                else{tablaDefAnalisis.row(fila).data([id,nomenclador,detalle,unidad,limite_inferior,limite_superior,aplica_rechazo]).draw();}            
            }        
        });
        $("#modalCRUDTipoAnalisis").modal("hide"); 
    });


});