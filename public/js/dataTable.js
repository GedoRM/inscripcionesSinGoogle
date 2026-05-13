$("#oScroll").DataTable({
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        if (aData[2] == "Activo") {
            $("#estatus", nRow).css({
                "text-align": "center",
                "font-weight": "800",
                color: "rgb(0,255,0)",
                padding: "19px",
                display: "block",
            });
        } else if (aData[2] == "Por iniciar") {
            $("#estatus", nRow).css({
                "text-align": "center",
                "font-weight": "800",
                color: "rgb(250,200,0)",
                padding: "19px",
                display: "block",
            });
        } else if (aData[2] == "Suspendido") {
            $("#estatus", nRow).css({
                "text-align": "center",
                "font-weight": "800",
                color: "rgb(250,150,0)",
                padding: "19px",
                display: "block",
            });
        } else if (aData[2] == "Baja") {
            $("#estatus", nRow).css({
                "text-align": "center",
                "font-weight": "800",
                color: "rgb(255,0,0)",
                padding: "19px",
                display: "block",
            });
        }
    },
    scrollCollapse: true,

    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "No se encontraron elementos",
        info: "Mostrando página _PAGE_ de _PAGES_ de _MAX_ registros totales",
        infoEmpty: "No hay registros disponibles",
        infoFiltered: "(filtrado de _MAX_ registros totales)",
        processing: "Procesando...",
        loading: "Cargando...",
        search: "Buscar",
        paginate: {
            first: "Primero",
            last: "Ultimo",
            next: "Siguiente",
            previous: "Anterior",
        },
        aria: {
            sortAscending: ": activate to sort column ascending",
            sortDescending: ": activate to sort column descending",
        },
    },
});

$("#wScroll").DataTable({
    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        if (aData[2] == "Activo") {
            $("#estatus", nRow).css({
                "text-align": "center",
                "font-weight": "800",
                color: "rgb(0,255,0)",
                padding: "19px",
                display: "block",
            });
        } else if (aData[2] == "Por iniciar") {
            $("#estatus", nRow).css({
                "text-align": "center",
                "font-weight": "800",
                color: "rgb(250,200,0)",
                padding: "19px",
                display: "block",
            });
        } else if (aData[2] == "Suspendido") {
            $("#estatus", nRow).css({
                "text-align": "center",
                "font-weight": "800",
                color: "rgb(250,150,0)",
                padding: "19px",
                display: "block",
            });
        } else if (aData[2] == "Baja") {
            $("#estatus", nRow).css({
                "text-align": "center",
                "font-weight": "800",
                color: "rgb(255,0,0)",
                padding: "19px",
                display: "block",
            });
        }
    },

    scrollX: true,
    fixedColumns: {
        leftColumns: 0,
        rightColumns: 1,
    },

    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "No se encontraron elementos",
        info: "Mostrando página _PAGE_ de _PAGES_",
        infoEmpty: "No hay registros disponibles",
        infoFiltered: "(filtrado de _MAX_ registros totales)",
        processing: "Procesando...",
        loading: "Cargando...",
        search: "Buscar",
        paginate: {
            first: "Primero",
            last: "Ultimo",
            next: "Siguiente",
            previous: "Anterior",
        },
        aria: {
            sortAscending: ": activate to sort column ascending",
            sortDescending: ": activate to sort column descending",
        },
    },
});

$("#listaAlumnos").DataTable({
  fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      if (aData[3] == "Activo") {
          $("#estatus", nRow).css({
              "text-align": "center",
              "font-weight": "800",
              color: "rgb(0,255,0)",
              padding: "19px",
              display: "block",
          });
      } else if (aData[3] == "Por iniciar") {
          $("#estatus", nRow).css({
              "text-align": "center",
              "font-weight": "800",
              color: "rgb(250,200,0)",
              padding: "19px",
              display: "block",
          });
      } else if (aData[3] == "Suspendido") {
          $("#estatus", nRow).css({
              "text-align": "center",
              "font-weight": "800",
              color: "rgb(250,150,0)",
              padding: "19px",
              display: "block",
          });
      } else if (aData[3] == "Baja") {
          $("#estatus", nRow).css({
              "text-align": "center",
              "font-weight": "800",
              color: "rgb(255,0,0)",
              padding: "19px",
              display: "block",
          });
      }
  },

  scrollX: true,
  fixedColumns: {
      leftColumns: 0,
      rightColumns: 1,
  },

  language: {
      lengthMenu: "Mostrar _MENU_ registros por página",
      zeroRecords: "No se encontraron elementos",
      info: "Mostrando página _PAGE_ de _PAGES_",
      infoEmpty: "No hay registros disponibles",
      infoFiltered: "(filtrado de _MAX_ registros totales)",
      processing: "Procesando...",
      loading: "Cargando...",
      search: "Buscar",
      paginate: {
          first: "Primero",
          last: "Ultimo",
          next: "Siguiente",
          previous: "Anterior",
      },
      aria: {
          sortAscending: ": activate to sort column ascending",
          sortDescending: ": activate to sort column descending",
      },
  },
});
