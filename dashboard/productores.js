$(document).ready(function(){
    tablaProductores = $("#tablaProductores").DataTable({
       "columnDefs":[{
            "targets": -1,
            "data":null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditarProductor'>Editar</button><button class='btn btn-danger btnBorrarProductor'>Borrar</button></div></div>"  
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
    
    $("#btnNuevoProductor").click(function(){
        $("#formProductor").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Productor");            
        $("#modalCRUDProd").modal("show");        
        id=null;
        opcion = 1; //alta
    });    
    
    var fila; //capturar la fila para editar o borrar el registro
    
    //botón EDITAR    
    $(document).on("click", ".btnEditarProductor", function(){
        fila = $(this).closest("tr");    
        id = parseInt(fila.find('td:eq(0)').text());
        razonsocial = fila.find('td:eq(1)').text();
        direccion = fila.find('td:eq(2)').text();
        localidad = fila.find('td:eq(3)').text();
        provincia = fila.find('td:eq(4)').text();
        pais = fila.find('td:eq(5)').text();
        condicion = fila.find('td:eq(6)').text();
        cuit = fila.find('td:eq(7)').text();
        telefono = fila.find('td:eq(8)').text();
        celular = fila.find('td:eq(9)').text();
        mail = fila.find('td:eq(10)').text();
        contacto = fila.find('td:eq(11)').text();
        
        $("#prodid").val(id);
        $("#razonsocial").val(razonsocial);
        $("#direccion").val(direccion);
        $("#localidad").val(localidad);
        $("#provincia").val(provincia);
        $("#pais").val(pais);
        $("#condicion").val(condicion);
        $("#cuit").val(cuit);
        $("#telefono").val(telefono);
        $("#celular").val(celular);
        $("#mail").val(mail);
        $("#contacto").val(contacto);
        opcion = 2; //editar
        
        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Productor");            
        $("#modalCRUDProd").modal("show");  
        
    });

    //botón BORRAR
    $(document).on("click", ".btnBorrarProductor", function(){    
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3; //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
        if(respuesta){
            $.ajax({
                url: "bd/crudProductor.php",
                type: "POST",
                dataType: "json",
                data: {opcion:opcion, id:id},
                success: function(){
                    //console.log(fila.parents('tr'));
                    tablaProductores.row(fila.parents('tr')).remove().draw();
                }
            });
        }   
    });
    
    $("#formProductor").submit(function(e){
        e.preventDefault();
        id=$.trim($("#prodid").val());        
        razonsocial = $.trim($("#razonsocial").val());
        direccion = $.trim($("#direccion").val());
        localidad = $.trim($("#localidad").val()); 
        provincia = $.trim($("#provincia").val());
        pais = $.trim($("#pais").val());
        condicion = $.trim($("#condicion").val()); 
        cuit = $.trim($("#cuit").val());
        telefono = $.trim($("#telefono").val());
        celular = $.trim($("#celular").val()); 
        mail = $.trim($("#mail").val());
        contacto = $.trim($("#contacto").val());
        
        $.ajax({
            url: "bd/crudProductor.php",
            type: "POST",
            dataType: "json",
            async: false,
            data: {id:id,razonsocial:razonsocial, direccion:direccion, localidad:localidad, provincia:provincia,pais:pais,condicion:condicion,
                cuit:cuit,telefono:telefono,celular:celular,mail:mail,contacto:contacto,opcion:opcion},
            success: function(data){ 
                id = data[0].prod_id;
                razonsocial = data[0].razon_social;
                direccion = data[0].direccion;
                localidad = data[0].localidad;
                provincia = data[0].provincia;
                pais = data[0].pais;
                condicion = data[0].cond_iva;
                cuit = data[0].nro_cuit;
                telefono = data[0].tel;
                celular = data[0].cel;
                mail = data[0].email;
                contacto = data[0].contacto;
                if(opcion == 1){tablaProductores.row.add([id,razonsocial,direccion,localidad,provincia,pais,condicion,cuit,telefono,celular,mail,contacto]).draw();}
                else{tablaProductores.row(fila).data([id,razonsocial,direccion,localidad,provincia,pais,condicion,cuit,telefono,celular,mail,contacto]).draw();}            
            }        
        });
        $("#modalCRUDProd").modal("hide"); 
    });

});