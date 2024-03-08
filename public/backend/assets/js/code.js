$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Esta Seguro?',
                    text: "Que desea Eliminar este registro?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Eliminar!',
                        'El registro ha sido eliminado.',
                        'success'
                      )
                    }
                  }) 


    });

  });



$(function(){
    $(document).on('click','#ApproveBtn',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Esta Seguro?',
                    text: "Que desea Aprobar esta compra?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Aprobar!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Aprobada!',
                        'La compra ha sido aprobada.',
                        'success'
                      )
                    }
                  }) 


    });

  });

