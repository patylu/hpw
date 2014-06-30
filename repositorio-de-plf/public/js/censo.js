var Aplicacion = (
  function() {
    var _crearFormulario = function(div_formulario) {
      var formulario = document.createElement('form');
      formulario.onsubmit = function() { return false; };

      /* BotÃ³n XML */
      var boton_xml = document.createElement('button');
      boton_xml.type = 'submit';
      boton_xml.id = 'boton_xml';
      boton_xml.textContent = 'Censo 2010';
      boton_xml.recurso = '/xml';
      boton_xml.addEventListener('click', _descargar, false);

      /* Twitter Bootstrap */
      boton_xml.className = "btn btn-primary";

      formulario.appendChild(boton_xml);
      div_form.appendChild(formulario);
    }
    var _crearTabla = function(div_resultado, documento_xml) {
      /* EliminaciÃ³n de <h1> y <table> */
      if (div_resultado.firstChild || div_resultado.lastChild) {
        div_resultado.removeChild(div_resultado.firstChild);
        div_resultado.removeChild(div_resultado.lastChild);
      }

      /* <h1> */
      var titulo = document.createElement("h1");
      titulo.textContent = "Resultado";
      div_resultado.appendChild(titulo);

      /* <table> */
      var tabla = document.createElement("table"); 

      /* Twitter Bootstrap */
      tabla.className = "table table-striped table-bordered table-hover table-condensed";

      /* <thead> */
      var campos = ['#', 'Indicador', 'Entidad', 'Municipio', 'Descripcion', 'Tema 1', 'Tema 2', 'Tema 3','Nota','Anio'];
      var tabla_thead = document.createElement("thead");
      var tabla_tr = document.createElement("tr");
      for (var i = 0; i < campos.length; i++ ) {
        var tabla_th = document.createElement("th");
        tabla_th.textContent = campos[i];
        tabla_tr.appendChild(tabla_th);
      }
      tabla_thead.appendChild(tabla_tr);
      tabla.appendChild(tabla_thead);
    
      /* <tbody> */
      var tabla_tbody = document.createElement("tbody");
      var xml_nodos = documento_xml.firstChild.childNodes;
      for (var i=0, contador = 0; i < xml_nodos.length; i++) {
        if (xml_nodos[i].nodeType !== 1) {
          continue;
        }
        var tabla_tr = document.createElement("tr");

        /* contador */
        var tabla_contador = document.createElement("td");
        tabla_contador.textContent = ++contador;
        tabla_tr.appendChild(tabla_contador);

        /* id del libro */
        var tabla_id = document.createElement("td");
        var book_atributos = xml_nodos[i].attributes;
        for (var a=0; a < book_atributos.length; a++) {
          if (book_atributos[a].nodeName === "id") {
            tabla_id.textContent = book_atributos[a].nodeValue;
          }
        }
        tabla_tr.appendChild(tabla_id);

        /* datos del libro */
        var nodo_elemento = xml_nodos[i].childNodes;
        for (var j=0; j < nodo_elemento.length; j++) {
          var tabla_td = document.createElement("td");
          if (nodo_elemento[j].nodeType === 1) {
            tabla_td.textContent = nodo_elemento[j].textContent;
            tabla_tr.appendChild(tabla_td);
          }
        }
        tabla_tbody.appendChild(tabla_tr);
      }
      tabla.appendChild(tabla_tbody);
      div_resultado.appendChild(tabla);
    }
    var _mostrarMensaje = function(div_resultado, mensaje) {
      /* EliminaciÃ³n de <h1> y <table> */
      if (div_resultado.firstChild || div_resultado.lastChild) {
        div_resultado.removeChild(div_resultado.firstChild);
        div_resultado.removeChild(div_resultado.lastChild);
      }

      var titulo = document.createElement("h1");
      titulo.textContent = "Resultado";
      div_resultado.appendChild(titulo);

      var panel_error = document.createElement('div');
      panel_error.className = "panel panel-danger"; 

      var panel_error_heading = document.createElement('div');
      panel_error_heading.className = "panel-heading";
      panel_error.appendChild(panel_error_heading);

      var panel_error_body = document.createElement('div');
      panel_error_body.className = "panel-body";
      panel_error_body.textContent = mensaje;

      panel_error.appendChild(panel_error_body);
      div_resultado.appendChild(panel_error);
    }
    var _descargar = function(evento) {
      var div_resultado = document.getElementById('div_resultado');
      var url = "http://ramirezlopezalvaro.sun.fire";
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = _procesarCambioDeEstado(div_resultado, xhr);
      xhr.open('GET', url + this.recurso);
      xhr.send();
    }
    var _procesarCambioDeEstado = function(div_resultado, obj_XMLHttpRequest) {
      return function() {
        if (obj_XMLHttpRequest.readyState === 4) {
          if (obj_XMLHttpRequest.status === 200) {
            _crearTabla(div_resultado, obj_XMLHttpRequest.responseXML);
            /* Para desactivar el botÃ³n */
            // var boton_xml = document.getElementById('boton_xml');
             //boton_xml.disabled = true;
             //boton_xml.className = "btn btn-default";
          } else {
            var mensaje = "Error: " + obj_XMLHttpRequest.status + " " + obj_XMLHttpRequest.statusText;
            _mostrarMensaje(div_resultado, mensaje);
          }
        }
      };
    }
    var _iniciar = function() {
      var div_form = document.getElementById('div_form');
      _crearFormulario(div_form);
    }
    return {
      "main": _iniciar
    };
  }
)();
