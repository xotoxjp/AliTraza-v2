$(document).ready(function(){
    tablaAnalisis = $("#tablaAnalisis").DataTable({
       "columnDefs":[{
            "targets": -1,
            "data":null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditAnalisis'>Editar</button><button class='btn btn-danger btnBorrarAnalisis'>Rechazar</button></div></div>"  
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
    
    //botón EDITAR    
    $(document).on("click", ".btnEditAnalisis", function(){
        fila = $(this).closest("tr");    
        id = parseInt(fila.find('td:eq(0)').text());
        presupuesto = fila.find('td:eq(1)').text();
        muestranum = fila.find('td:eq(2)').text();
        nomenclador = fila.find('td:eq(3)').text();
        valor = fila.find('td:eq(4)').text();
        resultado = fila.find('td:eq(5)').text();
        
        $("#analisisid").val(id);
        $("#nomenclador").val(nomenclador);
        $("#muestranum").val(muestranum);
        $("#presupuesto").val(presupuesto);
        $("#valor").val(valor);


        opcion = 2; //editar
        
        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Análisis");            
        $("#modalCRUDAnalisis").modal("show");  
        
    });

    //botón BORRAR
    $(document).on("click", ".btnBorrarAnalisis", function(){    
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3; //borrar
        var respuesta = confirm("¿Está seguro de Rechazar el registro: "+id+"?");
        if(respuesta){
            $.ajax({
                url: "bd/crudAnalisis.php",
                type: "POST",
                dataType: "json",
                data: {opcion:opcion, id:id},
                success: function(){
                    tablaAnalisis.row(fila.parents('tr')).remove().draw();
                }
            });
        }   
    });
    

    //botón AGREGAR
    $("#formAnalisis").submit(function(e){
        e.preventDefault();
        id=$.trim($("#analisisid").val());
        nomenclador = $.trim($("#nomenclador").val());
        muestranum = $.trim($("#muestranum").val());
        presupuesto = $.trim($("#presupuesto").val()); 
        valor = $.trim($("#valor").val()); 
        resultado;

        $.ajax({
            url: "bd/crudAnalisis.php",
            type: "POST",
            dataType: "json",
            data: {id:id,presupuesto:presupuesto,nomenclador:nomenclador,muestra:muestranum,valor:valor,resultado:resultado,opcion:opcion},
            success: function(data){
                id = data[0].id;
                presupuesto = data[0].presupuesto;
                muestra = data[0].muestra;
                valor = data[0].valor;
                resultado = data[0].resultado;
                if(opcion == 1){tablaAnalisis.row.add([id,presupuesto,muestranum,nomenclador,valor,resultado]).draw();}
                else{tablaAnalisis.row(fila).data([id,presupuesto,muestranum,nomenclador,valor,resultado]).draw();}            
            }        
        });
        $("#modalCRUDAnalisis").modal("hide"); 
    });


});