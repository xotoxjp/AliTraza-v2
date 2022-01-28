$(document).ready(function(){

    tablaUsuarios = $("#tablaUsuarios").DataTable({
        "columnDefs":[{
            "targets": -1,
            "data":null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditarUser'>Editar</button><button class='btn btn-danger btnBorrarUser'>Borrar</button></div></div>"  
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

    $("#btnNuevoUs").click(function(){
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Usuario");            
        $("#modalCRUD").modal("show");        
        id=null;
        opcion = 2; //modificacion
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditarUser", function(){
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        usuario = fila.find('td:eq(1)').text();
        password = fila.find('td:eq(2)').text();
        acceso = fila.find('td:eq(3)').text();
        
        $("#id").val(id);
        $("#usuario").val(usuario);
        $("#password").val(password);
        $("#acceso").val(acceso);
        opcion = 2; //editar
        
        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Usuario");   
        $("#user").val(usuario);         
        $("#modalCRUD").modal("show");  
        
    });

    //botón BORRAR
    $(document).on("click", ".btnBorrarUser", function(){    
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
        if(respuesta){
            $.ajax({
                url: "bd/crudUser.php",
                type: "POST",
                dataType: "json",
                data: {opcion:opcion, id:id},
                success: function(){
                    tablaPersonas.row(fila.parents('tr')).remove().draw();
                }
            });
        }   
    });

    $("#formUsuarios").submit(function(e){
        e.preventDefault();    
        nombre = $.trim($("#user").val());
        acceso = $.trim($("#acceso").val()); 
        $.ajax({
            url: "bd/crudUser.php",
            type: "POST",
            dataType: "json",
            data: {nombre:nombre, acceso:acceso, opcion:opcion},
            success: function(data){  
                //console.log(data);
                id = data[0].id;            
                nombre = data[0].usuario;
                password = data[0].password;
                acceso = data[0].tipo;
                if(opcion == 1){tablaUsuarios.row.add([id,nombre,password,acceso]).draw();}
                else{tablaUsuarios.row(fila).data([id,nombre,password,acceso]).draw();}            
            }        
        });
        $("#modalCRUD").modal("hide"); 
    });

});